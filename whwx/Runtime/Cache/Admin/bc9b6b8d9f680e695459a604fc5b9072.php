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
	        <div class="row"> <h3 class="page-header">客服专员</h3></div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
            	<label><a class="btn btn-primary" href="<?php echo U('Service/add');?>">添加客服</a></label>
                <form action='<?php echo U("Service/index");?>' class="form-inline text-right m-b-5 fr">
          客服名称：<input type="text" name='name' value='<?php echo ($_GET['name']); ?>' class="form-control mr20 w150">
          手机号码：<input type="text" name='phone' value='<?php echo ($_GET['phone']); ?>' class="form-control mr20 w150">
          选择小区：<select name='aid' class="form-control mr20 w150">
                        <option value='-1'>请选择小区</option>
                        <?php if(is_array($areaList)): $i = 0; $__LIST__ = $areaList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$area): $mod = ($i % 2 );++$i;?><option value='<?php echo ($area["id"]); ?>' <?php if(($_GET['aid']) == $area["id"]): ?>selected<?php endif; ?> ><?php echo ($area["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
              状态：<select name='status' class="form-control mr20 w150">
                        <option value='-2'>全部</option>
                        <option value='-1' <?php if(($_GET['status']) == "-1"): ?>selected<?php endif; ?> >已删除</option>
                        <option value='0' <?php if(($_GET['status']) == "0"): ?>selected<?php endif; ?> >禁用</option>
                        <option value='1' <?php if(($_GET['status']) == "1"): ?>selected<?php endif; ?> >启用</option>
                        <option value='2' <?php if(($_GET['status']) == "2"): ?>selected<?php endif; ?> >未审核</option>
                    </select>
                    <button class="btn btn-primary" type="submit">搜索</button>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="60">序号</th>
                                <th>客服名称</th>
                                <th>联系方式</th>
                                <th>负责小区</th>
                                <th width="75">状态</th>
                                <th width="120">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($i); ?></td>
                                    <td><?php echo ($list["name"]); if(($list["fid"]) <= "0"): ?>&nbsp;&nbsp;【WXBD#4#<?php echo ($list["phone"]); ?>#<?php echo ($list["id"]); ?>】<?php endif; ?></td>
                                    <td><?php echo ($list["phone"]); ?></td>
                                    <td><?php echo ($list["area"]); ?></td>
                                    <td class="center">
                                    	<?php switch($list["status"]): case "-1": ?><button class='btn btn-danger btn-sm' type="button">已删除</button><?php break;?>	
                                    		<?php case "0": ?><button class='btn btn-default btn-sm setStatus' type="button" data-url='<?php echo U("Service/setStatus?id=".$list["id"]);?>' data-status="<?php echo ($list["status"]); ?>">禁用</button><?php break;?>
                                    		<?php case "1": ?><button class='btn btn-primary btn-sm setStatus' type="button" data-url='<?php echo U("Service/setStatus?id=".$list["id"]);?>' data-status="<?php echo ($list["status"]); ?>">启用</button><?php break;?>
                                    		<?php case "2": ?><button class='btn btn-primary btn-sm vette' data-id='<?php echo ($list["id"]); ?>'  data-url='<?php echo U("Service/setStatus?id=".$list["id"]);?>'  data-aid='<?php echo ($list["aid"]); ?>' type="button">未审核</button><?php break; endswitch;?>
                                    </td>
                                    <td>
                                        <?php if(($list["status"]) >= "0"): ?><a class="btn-sm btn btn-default" href='<?php echo U("Service/edit?id=".$list["id"]);?>'>修改</a>
                                            <button data-url='<?php echo U("Service/del?id=".$list["id"]);?>' class="btn-sm btn btn-default delBtn" type="button">删除</button><?php endif; ?>
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
    <div class="modal-dialog">
        <div class="modal-content">
	        <form action="<?php echo U('Service/vette');?>" id="myform" class="form-horizontal">
	            <div class="modal-header">
	                <button data-dismiss="modal" class="close" type="button">×</button>
	                <h4 class="modal-title">客服审核</h4>
	            </div>
	            <div class="modal-body">
				    <div class="form-group">
						<label class="col-sm-3 control-label">审核状态：</label>
						<div class="col-sm-9">
				            <label class="radio-inline">
				                <input type="radio" value="1" id="status1" onchange="change()" name="status">审核通过
				            </label>
				            <label class="radio-inline">
				                <input type="radio" value="0"  id="status2" onchange="change()" name="status">审核不通过
				            </label>
			            </div>
		        	</div>
		        	<div class="form-group bid" style='display:none;'>
				        <label class="col-sm-3 control-label">选择楼栋号：</label>
				        <div class="col-sm-9" id="bid"></div>
				    </div>
	            </div>
	            <div class="modal-footer">
	                <button data-dismiss="modal" class=" btn btn-default" type="button">关闭</button>
	                <input type="hidden" name="id" />
	                <button class="btn btn-primary save" type="button">保存</button>
	            </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(function(){
		var obj;
		$('.vette').click(function(){
			var aid = $(this).data('aid'), id = $(this).data('id'), block2, html2 = '';waiting();obj = $(this);
			$('#myModal input[name="id"]').val(id);
			$.get('<?php echo U("Block/getBlockByAid");?>', {aid : aid}, function(data){
				$.get('<?php echo U("Service/getServiceBlockByAid");?>', {aid : aid, id:id}, function(data2){
					complete();
					block2 = data2;
					if(data){
						for(var i = 0; i< data.length; i++){
							if(block2.indexOf(','+data[i]['id']+',') >= 0){
								html2 += '<label class="checkbox-inline"><input type="checkbox" disabled="true" value="'+data[i]['id']+'" name="bid[]" >'+data[i]['name']+'</label>';
							}else{
								html2 += '<label class="checkbox-inline"><input type="checkbox" value="'+data[i]['id']+'" name="bid[]" >'+data[i]['name']+'</label>';
							}
						}
					}else{
						html2 = '该小区还没有楼栋';
					}
					$('#bid').html(html2);
				});
			});
			$('#myModal').modal('show');
			$('.bid').hide();
		});
		$('.save').click(function(){
			var val = $('input:radio[name="status"]:checked').val();
		    if(val == null){
		    	showInfo('请选择审核状态');
		    }else{
		    	waiting();
		    	$.post("<?php echo U('Service/vette');?>", $('#myModal #myform').serialize(),function(data){
		    		complete();
		    		showInfo(data.info);
		    		if(data.status == 1){
		    			obj.data('status', val);
		    			if(val == 1){
			    			obj.parents('tr').children('td:eq(4)').find('button').html('启用').removeClass('vette').addClass('setStatus');
		    			}else{
		    				obj.parents('tr').children('td:eq(4)').find('button').html('禁用').removeClass('btn-primary').addClass('btn-default').addClass('setStatus').removeClass('vette');
		    			}
		    			obj.unbind();  
		    			$('#myModal').modal('hide');
		    		}
		    	});
		    }
		});
	});
	function change(){
		var status = $('input[name="status"]:checked ').val();
		if(status == 1){
			$('.bid').show();
		}else{
			$('.bid').hide();
		}
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