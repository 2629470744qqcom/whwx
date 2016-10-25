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
<div class="row"><h3 class="page-header">预约管理</h3></div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body"> 
                <label><a class="btn btn-primary export">数据导出</a></label>
                <form action='<?php echo U("Booking/index");?>' class="form-inline text-right fr m-b-5">
              业主：<input type="text" name='owner' value='<?php echo ($_GET['owner']); ?>' class="form-control mr20 w150" > 
                    <div class="form-group">
                        <select class="form-control" id="aid" name="aid">
                            <option value="0" >全部小区</option>
                            <?php if(is_array($areaList)): $i = 0; $__LIST__ = $areaList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$area): $mod = ($i % 2 );++$i;?><option value="<?php echo ($area["id"]); ?>"<?php if(($area["id"]) == $_GET["aid"]): ?>selected<?php endif; ?> ><?php echo ($area["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>           
                    </div>
                    <!-- 类型 -->
                    <div class="form-group">
                        <select class="form-control" id="typeid" name="typeid">
                            <option value="0" >全部类型</option>
                            <?php if(is_array($typeList)): $i = 0; $__LIST__ = $typeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?><option value="<?php echo ($type["id"]); ?>"<?php if(($type["id"]) == $_GET["typeid"]): ?>selected<?php endif; ?> ><?php echo ($type["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>           
                    </div>
                    <!-- 供应商 -->
                    <div class="form-group">
                        <select class="form-control" id="supplier" name="supplierid">
                            <option value="0" >全部供应商</option>
                            <?php if(is_array($supplierList)): $i = 0; $__LIST__ = $supplierList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$supplier): $mod = ($i % 2 );++$i;?><option value="<?php echo ($supplier["id"]); ?>"<?php if(($supplier["id"]) == $_GET["supplierid"]): ?>selected<?php endif; ?> ><?php echo ($supplier["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>           
                    </div>
              状态：<select name='status' class="form-control mr20 w150">
                        <option value='-1'>全部</option>
                        <option value='1' <?php if(($_GET['status']) == "1"): ?>selected<?php endif; ?> >未完成 </option>
                        <option value='3' <?php if(($_GET['status']) == "3"): ?>selected<?php endif; ?> >已完成 </option>
                        <option value='2' <?php if(($_GET['status']) == "2"): ?>selected<?php endif; ?> >已评论 </option>
                        <option value='4' <?php if(($_GET['status']) == "4"): ?>selected<?php endif; ?> > 已删除</option>
                    </select>
                    <button class="btn btn-primary" type="submit">搜索</button>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="60">序号</th>
                                <th>业主</th>
                                <th>联系人</th>                    
                                <th>联系方式</th>
                                <th>预约时间</th>
                                <th>提交时间</th>
                                <th>选择商家</th>
                                <th width="75">状态</th>
                                <th width="180">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($i); ?></td>
                                    <td><?php echo ($list["owner"]); ?></td>
                                    <td><?php echo ($list["name"]); ?></td>
                                    <td><?php echo ($list["phone"]); ?></td>
                                    <td><?php echo (date('Y-m-d H:i', $list["day"])); ?></td>
                                    <td><?php echo (date('Y-m-d H:i', $list["submit_time"])); ?></td>
                                    <td><?php echo ($list["title"]); ?></td>
                                    <td>
                                        <?php switch($list["status"]): case "1": ?>未完成<?php break;?>
                                            <?php case "2": ?>已评论<?php break;?>
                                            <?php case "3": ?>已完成<?php break;?>
                                            <?php case "4": ?>已删除<?php break; endswitch;?>
                                    </td>
                                    <td>
                                        <button class="btn-sm btn btn-default look" data-id='<?php echo ($list["id"]); ?>'  data-rid='<?php echo ($list["rid"]); ?>' type="button">查看</button>
                                        <?php if(($list["status"]) == "1"): ?><button class="btn-sm btn btn-default deal" data-id='<?php echo ($list["id"]); ?>'  data-rid='<?php echo ($list["rid"]); ?>' type="button">已处理</button><?php endif; ?>
                                        <?php if(($list["status"]) == "2"): ?><button data-url='<?php echo U("Booking/del");?>' data-id='<?php echo ($list["id"]); ?>' data-status='<?php echo ($list["status"]); ?>' class="btn-sm btn btn-default" id="cosle" type="button">删除</button><?php endif; ?>
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
<div id="myModal" class="modal fade in" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="html">
        </div>
    </div>
</div>
<div id="myModal3" class="modal fade in" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <form action="<?php echo U('Booking/export');?>" role="form" id="myform" class="form-horizontal" data-callback="export_data">
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
                        <option value="1">未完成</option>
                        <option value="2">已评论</option>
                        <option value="3">已完成</option>
                        <option value="4">已删除</option>
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
<script type="text/javascript" src='<?php echo COM;?>js/daterangepicker.min.js'></script>
<script type="text/javascript">
	$('body').on('click', '.save', function(){
		console.log('aaaa');
		var content = $('textarea').val();
	    var id = $("input[name='id']").val();
	    if(content){
	        waiting();
	  		$.post('<?php echo U("BookingComment/detail");?>',{content:content,id:id},function(data){
	  			complete();
				showInfo(data.info);
	        	$('#myModal').modal('hide');
	      	});
	    }else{
	    	showInfo('请输入回复的内容');
	    }
	});
    $('.look').click(function(){
        waiting();
        $.get('<?php echo U("BookingComment/detail");?>', {id :$(this).data('id')}, function(data){
          complete();$('#html').html(data);
        });
        $('#myModal').modal('show');
    });
    $('.deal').click(function(){
    	var flag = true;
    	if(flag){
    		if(confirm('你确定处理完成？')){
    			waiting();
    	        $.get('<?php echo U("Booking/deal");?>', {id :$(this).data('id')}, function(data){
    	          complete();
    	          showInfo(data.info);
    	          if(data.status == 1){
    	        	  location.reload();
    	          }
    	        });
    		}
    	}
    });
    $("#cosle").click(function(){
        $.get('<?php echo U("Booking/del");?>', {id :$(this).data('id')}, function(data){
          complete();
          showInfo(data.info);
          if(data.status == 1){
              location.reload();
          }
        });
    })
    //导出数据，时间选择插件
    $('input.datepicker').datetimepicker({format : "yyyy-mm-dd", minView : 2, autoclose : true});
    //导出数据，选择小区和时间等
    $('.export').click(function(){$('#myModal3').modal('show');});
    //导出数据，提交表单
    $('.export_submit').click(function(){$('#myModal3 #myform').submit();});
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