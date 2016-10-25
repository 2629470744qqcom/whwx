<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>芜湖伟星物业管理平台</title>
<link href="<?php echo CSS;?>bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo CSS;?>font-awesome.css" rel="stylesheet" />
<link href="<?php echo CSS;?>admin.min.css" rel="stylesheet" />
<link href="<?php echo COM;?>css/common.min.css" rel="stylesheet" />
<script src="<?php echo JQ;?>"></script>
<script src="<?php echo COM;?>js/common.min.js"></script>
<script src="<?php echo JS;?>bootstrap.min.js"></script>
<script src="<?php echo JS;?>admin.min.js"></script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo U('Admin/Index/index');?>">星管家智慧社区管理平台</a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
        	<li class="dropdown">
                <a aria-expanded="false" href="#" data-toggle="dropdown" class="dropdown-toggle">
                    <i class="fa fa-bell fa-fw"></i>
                    <?php if(!empty($warnList)): ?><div style="margin-left:4px;float:right;height:6px;width:6px;background-color:red;border-radius:3px;"></div><?php endif; ?>
                     	预警消息<i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <?php if(is_array($warnList)): $i = 0; $__LIST__ = $warnList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$warnList): $mod = ($i % 2 );++$i;?><li>
                        	<?php switch($warnList["type"]): case "1": ?><a href="<?php echo U('Repair/index?type=1');?>"><i class="fa fa-comment fa-fw"></i> <?php echo ($warnList["name"]); ?></a><?php break;?>
                        		<?php case "2": ?><a href="<?php echo U('Booking/index?type=2');?>"><i class="fa fa-comment fa-fw"></i> <?php echo ($warnList["name"]); ?></a><?php break;?>
                        		<?php case "3": ?><a href="<?php echo U('Complaint/index?type=3');?>"><i class="fa fa-comment fa-fw"></i> <?php echo ($warnList["name"]); ?></a><?php break; endswitch;?>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    <!-- <div class="text-right" style="margin-right:10px"><a href="<?php echo U('Warn/index');?>">查看更多 <i class="fa fa-arrow-circle-right"></i></a></div> -->
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-user fa-fw"></i> <?php echo (session('aname')); ?> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="<?php echo U('Public/editPwd');?>"><i class="fa fa-gear fa-fw"></i> 修改密码</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo U('Public/logout');?>"><i class="fa fa-sign-out fa-fw"></i> 退出登录</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
            	<li><a href="<?php echo U('Index/index');?>">后台首页</a></li>
                <?php if(is_array($menuList)): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menuList): $mod = ($i % 2 );++$i;?><!--获取左侧菜单，参考AdminController.class.php扩展-->
                    <li>
                        <a href="#"><?php echo ($menuList["title"]); ?><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <?php if(is_array($menuList["sub"])): $i = 0; $__LIST__ = $menuList["sub"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?><li class="menu1_<?php echo (str_replace('/', '_', $sub["name"])); ?> menu2_<?php echo substr($sub['name'], 0, strcspn($sub['name'], '/'))?>"> <a href="<?php echo U($sub['name']);?>"><?php echo ($sub["title"]); ?></a> </li><!--??????--><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>
            <footer class="footer_bottom">技术支持:&nbsp;&nbsp;<a href="http://www.weilt.net/" target="_blank">微老头</a></footer>
        </div>
    </nav>
    <div id="page-wrapper">
		<div id="page-inner">
	        <link href="<?php echo COM;?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
<div class="row"> <h3 class="page-header">投诉建议</h3></div>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-body">
                <label><a class="btn btn-primary" href="<?php echo U('Complaint/addComplaint');?>">添加投诉建议</a></label>
                <label><a class="btn btn-primary export">数据导出</a></label>
				<form action='<?php echo U("Complaint/index");?>' class="form-inline text-right m-b-5" style="float:right;">
				负责人：	<select name='sid' id='sid' class="form-control mr20 cate_id" style="width: 150px;">
        					<option value='0' >请选择负责人</option>
        					<?php if(is_array($serviceList)): $i = 0; $__LIST__ = $serviceList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$service): $mod = ($i % 2 );++$i;?><option value='<?php echo ($service["id"]); ?>' <?php if(($_GET['sid']) == $service["id"]): ?>selected<?php endif; ?> ><?php echo ($service["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    	</select>
                所在小区：<select name='aid' class="form-control mr20" style="width: 150px;">
                        <option value='0'>全部</option>
                        <?php if(is_array($areaList)): $i = 0; $__LIST__ = $areaList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$areaList1): $mod = ($i % 2 );++$i;?><option value='<?php echo ($areaList1["id"]); ?>' <?php if(($_GET['aid']) == $areaList1["id"]): ?>selected<?php endif; ?> ><?php echo ($areaList1["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                状态：<select name='status' class="form-control mr20" style="width: 150px;">
                        <option value='-1'>全部</option>
                        <option value='0' <?php if(($_GET['status']) == "0"): ?>selected<?php endif; ?> >未处理</option>
                        <option value='1' <?php if(($_GET['status']) == "1"): ?>selected<?php endif; ?> >已处理</option>
                        <option value='2' <?php if(($_GET['status']) == "2"): ?>selected<?php endif; ?> >已完成</option>
                    </select>
                    <button class="btn btn-primary" type="submit">搜索</button>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="60">序号</th>
                                <th>业主姓名</th>
                                <th>业主手机</th>
                                <th>所在小区</th>
                                <th>房号</th>
                                <th>投诉/建议内容</th>
                                <th>投诉/建议时间</th>
                                <th>反馈时间</th>
                                <th>负责人</th>
                                <th width="75">状态</th>
                                <th width="130">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($i); ?></td>
                                    <td><?php echo ($list["oname"]); ?></td>
                                    <td><?php echo ($list["phone"]); ?></td>
                                    <td><?php echo ($list["area"]); ?></td>
                                    <td><?php echo ($list["addr"]); ?></td>
                                    <td><?php echo (msubstr($list["desc"],0,36)); ?></td>
                                    <td><?php echo (date('Y-m-d H:i:s', $list["times"])); ?></td>
                                    <td><?php if(($list["deal_time"]) > "0"): echo (date('Y-m-d H:i:s', $list["deal_time"])); else: ?>未处理<?php endif; ?></td>
                                    <td><?php echo ((isset($list["name"]) && ($list["name"] !== ""))?($list["name"]):'暂无'); ?></td>
                                    <td class="center">
                                    	<?php switch($list["status"]): case "0": ?><button class='btn btn-default btn-sm' type="button" >未处理</button><?php break;?>
                                    		<?php case "1": ?><button class='btn btn-primary btn-sm' type="button" >已处理</button><?php break;?>
                                    		<?php case "2": ?><button class='btn btn-primary btn-sm' type="button" >已完成</button><?php break; endswitch;?>
                                    </td>
                                    <td class="center">
                                     	<button class="btn-sm btn btn-default look" data-id='<?php echo ($list["id"]); ?>' type="button">查看</button>
                                     	<?php if(($list["status"]) == "0"): ?><button class="btn-sm btn btn-default deal deal<?php echo ($list["id"]); ?>" data-id='<?php echo ($list["id"]); ?>' data-fid='<?php echo ($list["fid"]); ?>' data-name='<?php echo ($list["oname"]); ?>' data-phone='<?php echo ($list["phone"]); ?>' type="button">处理</button><?php endif; ?>
<!--                                    <button data-url='<?php echo U("Complaint/del?id=".$list["id"]);?>' class="btn-sm btn btn-default delBtn" type="button">删除</button> -->
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <?php echo ($page); ?>
            </div>
        </div>
    </div>
</div>

<div id="myModal2" class="modal fade" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content detail"></div>
    </div>
</div>
<div id="myModal3" class="modal fade in" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <form action="<?php echo U('Complaint/export');?>" role="form" id="myform" class="form-horizontal" data-callback="export_data">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">数据导出</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-sm-4 control-label">文件名：<span class="c-red">*</span></label>
                    <div class="col-sm-4">
                      <input class="form-control required" name="name" maxlength='10'>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">选择小区：<span class="c-red">*</span></label>
                    <div class="col-sm-4">
                      <select class="form-control" name="aid">
                        <option value="0">全部</option>
                        <?php if(is_array($areaList)): $i = 0; $__LIST__ = $areaList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$areaList2): $mod = ($i % 2 );++$i;?><option value='<?php echo ($areaList2["id"]); ?>'><?php echo ($areaList2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">选择状态：<span class="c-red">*</span></label>
                    <div class="col-sm-4">
                      <select class="form-control" name="status">
                        <option value="-1">全部</option>
                        <option value='0'>未处理</option>
                        <option value='1'>已处理</option>
                        <option value='2'>已完成</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">选择时间：<span class="c-red">*</span></label>
                    <div class="col-sm-2"><input class="form-control datepicker required" placeholder="开始时间" name="start_time"></div>
                    <div class="col-sm-2"><input class="form-control datepicker required" placeholder="结束时间" name="end_time"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class=" btn btn-default" type="button">关闭</button>
                <button class="btn btn-primary export_submit" type="button">导出</button>
            </div>
        </form>
        </div>
    </div>
</div>
<div tabindex="-1" id="myModal" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
        	<form action='<?php echo U("Complaint/edit");?>' id='myform' class="form-inline" method='post'>
	        	<div class="modal-header">
                	<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                	<h4 id="myModalLabel" class="modal-title">提交处理信息</h4>
           		</div>
                <div class="modal-body">
                	<textarea rows="5" class="form-control required" style="width:100%;" name="feedback" maxlength='500'></textarea>
	            </div>
	            <div class="modal-footer">
	                <button data-dismiss="modal" class=" btn btn-default" type="button">关闭</button>
                    <input type="hidden" name="id" />
                    <input type="hidden" name="fid" />
                    <input type="hidden" name="name" />
	                <input type="hidden" name="phone" />
	                <button class="btn btn-primary save" type="button">保存</button>
	            </div>
	       </form>
        </div>
    </div>
</div>
<script type="text/javascript" src='<?php echo COM;?>js/daterangepicker.min.js'></script>
<script>
$(function(){
	//处理
	$('.deal').click(function(){
        $('#myModal input[name="id"]').val($(this).data('id'));
        $('#myModal input[name="fid"]').val($(this).data('fid'));
        $('#myModal input[name="name"]').val($(this).data('name'));
		$('#myModal input[name="phone"]').val($(this).data('phone'));
		$('#myModal').modal('show');
	});
	//查看
	$('.look').click(function(){
		waiting();
		$.get('<?php echo U("Complaint/detail");?>', {id:$(this).data('id')}, function(data){
			complete();
			$('.detail').html(data);
		});
		$('#myModal2').modal('show');
	});
	//管理员回复
	$('body').on('click', '.submit', function(){
  		var id = $('#id').val(), content = $('#content').val();
  		if(content){waiting();
  		    $.post('<?php echo U("Complaint/detail");?>', {id: id, content: content}, function(data){
  		        complete();
  		        if(data.status > 0){
  		        	  showInfo('反馈成功');
  		        	  $('#myModal2').modal('hide');
  		        }else{
  		        	  showInfo('反馈失败，请稍后再试');
  		        }
  		    });
  		}else{
  			  showInfo('请输入反馈内容');
  		}
	});
    //导出数据，时间选择插件
    $('input.datepicker').datetimepicker({format : "yyyy-mm-dd", minView : 2, autoclose : true});
    //导出数据，选择小区和时间等
    $('.export').click(function(){$('#myModal3').modal('show');});
    //导出数据，提交表单
    $('.export_submit').click(function(){$('#myModal3 #myform').submit();});
    $('.save').click(function(){
    	var feedback = $('textarea[name="feedback"]').val();
    	var id=$('#myModal input[name="id"]').val();
    	if(feedback){
    		waiting();
    		$.post('<?php echo U("Complaint/edit");?>', $('#myModal #myform').serialize(), function(data){
  		        complete();
  		        if(data.status > 0){
  		        	showInfo('反馈成功');
  		        	$('#myModal').modal('hide');
  		        	$('.deal'+id).parents('tr').find('td').eq(7).find('button').removeClass('btn-default').addClass('btn-primary').html('已处理');
  		        	$('.deal'+id).remove();
  		        }else{
  		        	  showInfo('反馈失败，请稍后再试');
  		        }
  		    });
    	}else{
    		showInfo('请输入反馈信息');
    	}
    });
});
//导出回调函数
function export_data(data){
    $('#myModal3').modal('hide');
    location.href = data.url;
}
</script>
		</div>
	</div>
</div>
<style>
    footer.footer_bottom{
       color:#fff;text-align:center;width:200px;font-size:14px;margin-top:20px;
    }
</style>
<script type="text/javascript">
    var obj = $('.menu1_<?php echo CONTROLLER_NAME;?>_<?php echo ACTION_NAME;?>');
    if(obj.length > 0){
    	obj.addClass('active').parents('li').addClass('active');
    }else{
    	$('.menu2_<?php echo CONTROLLER_NAME;?>').addClass('active').parents('li').addClass('active');
    }
</script>
</body>
</html>