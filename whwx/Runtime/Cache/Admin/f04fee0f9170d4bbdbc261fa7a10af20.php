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
	        <div class="row"> <h3 class="page-header">商家分类</h3></div>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-body">
            	<label><a class="btn btn-primary addCate">添加分类</a></label>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="60">序号</th>
                                <th>名称</th>
                                <th>链接地址</th>
                                <th width="75">排序</th>
                                <th width="75">状态</th>
                                <th width="120">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
	                                <td><?php echo ($i); ?></td>
	                                <td><?php echo ($list["name"]); ?></td>
	                                <td><?php echo C('site_url');?>/Wap/Shop/lists?id=<?php echo ($list["id"]); ?></td>
	                                <td>
	                               		<input class="setSort" type="text" size="2" data-url="<?php echo U('MerchantType/setSort?id='.$list['id']);?>" value="<?php echo ($list["sort"]); ?>">
	                                </td>
	                                <td class="center">
	                                 	<button class='btn <?php if(($list["status"]) == "1"): ?>btn-primary<?php else: ?>btn-default<?php endif; ?> btn-sm setStatus' type="button" data-url='<?php echo U("MerchantType/setStatus?id=".$list["id"]);?>' data-status="<?php echo ($list["status"]); ?>"><?php if(($list["status"]) == "1"): ?>启用<?php else: ?>禁用<?php endif; ?></button>
	                                </td>
	                                <td class="center">
	                                 	<a class="btn-sm btn btn-default editBtn" data-id='<?php echo ($list["id"]); ?>' >修改</a>
	                                 	<button data-url='<?php echo U("MerchantType/del?id=".$list["id"]);?>' class="btn-sm btn btn-default delBtn" type="button">删除</button>
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
	        <form action="<?php echo U('MerchantType/add');?>" id="myform" class="form-horizontal">
	            <div class="modal-header">
	                <button data-dismiss="modal" class="close" type="button">×</button>
	                <h4 class="modal-title">添加页面</h4>
	            </div>
	            <div class="modal-body">
				    <div class="form-group">
				        <label class="col-sm-3 control-label">名称：<span class="c-red">*</span></label>
				        <div class="col-sm-6">
				         	<input class="form-control required" name="name" maxlength="10">
				        </div>
				        <small>不超过十个字</small>
				    </div>
				    <div class="form-group">
				    	<label class="col-sm-3 control-label">分类图标：</label>
				    	<div class="col-sm-6 imgreq">
				    		<div class="uploadify-div"></div>
							<button type="button" class='upload' id='upload1' data-name="pic">选择图片</button>
				    	</div>
				    </div>
				    <div class="form-group">
		               	<label class="col-sm-3 control-label">说明：</label>
		               	<div class="col-sm-6">
		               		<textarea rows="3" class="form-control" name="desc" maxlength='500'></textarea>
		               	</div>
			        </div>
	            </div>
	            <div class="modal-footer">
	                <button data-dismiss="modal" class=" btn btn-default" type="button">关闭</button>
	                <input type="hidden" name="id" />
	                <button class="btn btn-primary" type="submit">保存</button>
	            </div>
            </form>
        </div>
    </div>
</div>
<script>
$(function(){
	$('.editBtn').click(function(){
		$('#myform')[0].reset();
		var id = $(this).data('id');
		$('.modal-title').html('修改商家分类');
		waiting();
		$.get('<?php echo U("MerchantType/detail");?>', {id:id}, function(data){
			complete();
			if(data){
				$('#myform input[name="id"]').val(id);
				$('#myform input[name="name"]').val(data.name);
				$('#myform textarea[name="desc"]').html(data.desc);
				$("#myform select").find("option[value='"+data.pid+"']").attr("selected",true);
				$("#myform").attr('action', '<?php echo U("MerchantType/detail");?>');
				if(data.pic){
					if($('.uploadify-div').length > 0){
						$('.uploadify-div').html('<li><img src="'+data.pic+'?"><input name="pic" type="hidden" value="'+data.pic+'"></li>');
					}else{
						$('#myModal #upload').before('<div class="uploadify-div"><li><img src="'+data.pic+'"><input name="pic" type="hidden" value="'+data.pic+'"></li></div>');
					}
				}
			}
		});
		$('#myModal').modal('show');
	});
	$('.addCate').click(function(){
		$('#myform')[0].reset();
		$('.uploadify-div').html('');
		$('.modal-title').html('添加商家分类');
		$('#myModal').modal('show');
	})
})
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