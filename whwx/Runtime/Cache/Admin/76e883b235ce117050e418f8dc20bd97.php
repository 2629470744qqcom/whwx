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
<div class="row"> <h3 class="page-header">业主管理</h3></div>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-body">
          		<label><a class="btn btn-primary" href="<?php echo U('Owner/add');?>">添加业主</a></label>
				<form action='<?php echo U("Owner/index");?>' class="form-inline text-right fr m-b-5" >
					<div class="form-group">
					    <select class="form-control" id="aid" name="aid">
						    <option value="0" >请选择小区</option>
					        <?php if(is_array($areaList)): $i = 0; $__LIST__ = $areaList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$area): $mod = ($i % 2 );++$i;?><option value='<?php echo ($area["id"]); ?>' <?php if(($_GET['aid']) == $area["id"]): ?>selected<?php endif; ?>><?php echo ($area["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>           
					</div>
					<div class="form-group">
					    <select class="form-control" id="bid" name="bid">
							<option value="0" >请选择楼栋</option>
						</select>           
					</div>
					<div class="form-group">
					    <select class="form-control" id="uid" name="uid">
							<option value="0" >请选择单元</option>
						</select>           
					</div>
					业主姓名：<input type="text" name='name' value='<?php echo ($_GET['name']); ?>' class="form-control mr20 w150" >
					手机号码：<input type="text" name='phone' value='<?php echo ($_GET['phone']); ?>' class="form-control mr20 w150" >
					注册时间：<input type="text" name='start_time' value='<?php echo ($_GET['start_time']); ?>' placeholder="起始时间" class="form-control mr20 w100 datepicker" >
	                <input type="text" name='end_time' value='<?php echo ($_GET['end_time']); ?>' placeholder="结束时间" class="form-control mr20 w100 datepicker" >
                  	状态：<select name='status' class="form-control mr20 w150" >
                            <option value='-1'>全部</option>
                            <option value='2' <?php if(($_GET['status']) == "2"): ?>selected<?php endif; ?> >已删除
                            </option>
                            <option value='1' <?php if(($_GET['status']) == "1"): ?>selected<?php endif; ?> >已审核
                            </option>
                            <option value='0' <?php if(($_GET['status']) == "0"): ?>selected<?php endif; ?> >未审核
                            </option>
                        </select>
		        	<button class="btn btn-primary" type="submit">搜索</button>
		        	<a href="<?php echo U('Owner/export', $_GET);?>"><button class="btn btn-primary" type="button">导出结果</button></a>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th width="60">序号</th>
                                <th>业主姓名</th>
                                <th>电话号码</th>
                                <th>身份</th>
                                <th>房间</th>
                                <th>积分</th>
                                <th>注册时间</th>
                                <th width="75">状态</th>
                                <th width="230">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr class="odd gradeX">
	                                <td><?php echo $_GET['p'] > 1 ? (($_GET['p'] - 1) * 12 + $i) : $i;?></td>
	                                <td><?php echo ($list["name"]); if(($list["fid"]) <= "0"): ?>&nbsp;&nbsp;【WXBD#1#<?php echo ($list["phone"]); ?>#<?php echo ($list["id"]); ?>】<?php endif; ?></td>
	                                <td><?php echo ($list["phone"]); ?></td>
	                                <td><?php if(($list["pid"]) == "0"): ?>业主<?php else: ?>亲友/租客<?php endif; ?></td>
	                                <td><?php echo ($list["area"]); echo ($list["block"]); echo ($list["unit"]); echo ($list["room"]); ?></td>
	                                <td><?php echo ($list["point"]); ?></td>
	                                <td><?php if(!empty($list["reg_time"])): echo (date('Y-m-d H:i', $list["reg_time"])); else: ?>未知<?php endif; ?></td>
	                                <td class="center">
	                                 	<?php switch($list["status"]): case "0": ?><button class=" btn btn-default btn-sm" type="button" >未审核</button><?php break;?>
											<?php case "1": ?><button class="btn btn-primary btn-sm" type="button" >已审核</button><?php break;?>
											<?php case "2": ?><button class="btn btn-danger btn-sm" type="button" >已删除</button><?php break; endswitch;?>
	                                </td>
	                                <td class="center">
	                                	<?php if(($list["status"]) < "2"): if(($list["status"]) == "0"): if(($list["pid"]) <= "0"): ?><button data-id='<?php echo ($list["id"]); ?>' class="btn btn-sm btn-default check" type="button">审核</button><?php endif; endif; ?>
	                                 	<a href='<?php echo U("Owner/getPoint?oid=".$list["id"]);?>'><button class="btn btn-sm btn-default" data-id="<?php echo ($list["id"]); ?>" type='button'>积分</button></a>
	                                 	<a href='<?php echo U("Owner/edit?id=".$list["id"]);?>'><button class="btn btn-sm btn-default" data-id="<?php echo ($list["id"]); ?>">修改</button></a>
	                                  	<button data-url='<?php echo U("Owner/del?id=".$list["id"]);?>' class="btn btn-sm btn-default delBtn" type="button">删除</button><?php endif; ?>
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
        <div class="modal-content">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">详情页面</h4>
            </div>
            <div class="modal-body" style='height:250px;'></div>
            <div class="modal-footer">
                <button class="btn btn-danger adopt" data-type='0' type="button">审核不通过</button>
                <button class="btn btn-primary adopt" data-type='1' type="button">审核通过</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src='<?php echo COM;?>js/daterangepicker.min.js'></script>
<script type="text/javascript" >
	$('input.datepicker').datetimepicker({format : "yyyy-mm-dd", minView : 2, autoclose : true});
	$(function(){
		var obj, id;
		$('.check').click(function(){
			id = $(this).data('id'), obj = $(this), html='';waiting();
			$.post('<?php echo U("Owner/detail");?>', {id : id}, function(data){complete();
				if(data.status != 1){
					showInfo(data.info);
				}else{
					html  = '<p class="col-sm-4">姓名：'+data['info']['name']+'</p>';
					html += '<p class="col-sm-4">手机号：'+data['info']['phone']+'</p>';
					html += '<p class="col-sm-4">小区：'+data['info']['area']+'</p>';
					html += '<p class="col-sm-4">楼栋：'+data['info']['block']+'</p>';
					html += '<p class="col-sm-4">单元：'+data['info']['unit']+'</p>';
					html += '<p class="col-sm-4">房号：'+data['info']['room']+'</p>';
					html += '<p class="col-sm-12"><b>业主姓名：'+data['info']['owner']+'</b></p>';
					html += '<p class="col-sm-12"><b>业主电话：'+data['info']['ownerphone']+'</b></p>';
					$('.modal-body').html(html);
					$('#myModal').modal('show');
				}
			});
		});
		$('.adopt').click(function(){
			waiting();var type = $(this).data('type');
			$.post('<?php echo U("Owner/check");?>', {id : id ,type : type }, function(data){
				complete();showInfo(data.info);
				if(data.status == 1){
					if(type == 1){
						obj.parents('tr').children('td:eq(6)').find('button').removeClass('btn-default').addClass('btn-primary').html('已审核');
					}else{
						obj.parents('tr').children('td:eq(6)').find('button').removeClass('btn-default').addClass('btn-danger').html('已删除');
					}
					obj.remove();
					$('#myModal').modal('hide');
				}
			});
		});
		var aid1 = '<?php echo ($_GET["aid"]); ?>', bid1 = '<?php echo ($_GET["bid"]); ?>', uid1 = '<?php echo ($_GET["uid"]); ?>', rid1 = '<?php echo ($_GET["rid"]); ?>';
		if(aid1 > 0){
			waiting();
			$.get('<?php echo U("Block/getBlockByAid");?>', {aid : aid1}, function(data){
				var html = '';complete();
				if(data){
					html += '<option value="0" >请选择楼栋</option>';
					for(var i = 0; i< data.length; i++){
						if(bid1 == data[i]['id']){
							html += '<option selected value="'+data[i]['id']+'" >'+data[i]['name']+'</option>';
						}else{
							html += '<option value="'+data[i]['id']+'" >'+data[i]['name']+'</option>';
						}
					}
				}else{
					html = '<option value="0" >该小区还没有楼栋</option>';
				}
				$('#bid').html(html);
			});
			if(bid1 > 0){
				waiting();
				$.get('<?php echo U("Unit/getUnitByBid");?>', {bid : bid1}, function(data){
					var html = '';complete();
					if(data){
						html += '<option value="0" >请选择单元</option>';
						for(var i = 0; i< data.length; i++){
							if(uid1 == data[i]['id']){
								html += '<option selected value="'+data[i]['id']+'" >'+data[i]['name']+'</option>';
							}else{
								html += '<option value="'+data[i]['id']+'" >'+data[i]['name']+'</option>';
							}
						}
					}else{
						html = '<option value="0" >该楼栋还没有单元</option>';
					}
					$('#uid').html(html);
				});
			}
		}
		$('#aid').change(function(){
			var aid = $(this).val(), html='';
			if(aid > 0){
				waiting();
				$.get('<?php echo U("Block/getBlockByAid");?>', {aid : aid}, function(data){
					complete();
					if(data){
						html += '<option value="0" >请选择楼栋</option>';
						for(var i = 0; i< data.length; i++){
							html += '<option value="'+data[i]['id']+'" >'+data[i]['name']+'</option>';
						}
					}else{
						html = '<option value="0" >该小区还没有楼栋</option>';
					}
					$('#bid').html(html);
				});
			}
		});
		$('#bid').change(function(){
			var bid = $(this).val(), html='';
			if(bid > 0){
				waiting();
				$.get('<?php echo U("Unit/getUnitByBid");?>', {bid : bid}, function(data){
					complete();
					if(data){
						html += '<option value="0" >请选择单元</option>';
						for(var i = 0; i< data.length; i++){
							html += '<option value="'+data[i]['id']+'" >'+data[i]['name']+'</option>';
						}
					}else{
						html = '<option value="0" >该楼栋还没有单元</option>';
					}
					$('#uid').html(html);
				});
			}
		});
	});
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