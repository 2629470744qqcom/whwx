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
	        <style type="text/css">.control-label{padding-top:0 !important;}</style>
<div class="row"><h3 class="page-header">投诉建议&nbsp;<small>添加</small></h3></div>

<div class="row">
	<div class="panel panel-default">
		<div class="panel-body">
			<form id="myform" class="form-horizontal">
			    <div class="form-group">
			        <label class="col-sm-3 control-label">小区：<span class="c-red">*</span></label>
			        <div class="col-sm-4">
			        	<select class="form-control aid" id="aid" name="aid" >
			        		<option value="0" >请选择小区</option>
			        		<?php if(is_array($areaList)): $i = 0; $__LIST__ = $areaList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$areaList): $mod = ($i % 2 );++$i;?><option value="<?php echo ($areaList["id"]); ?>"><?php echo ($areaList["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>           
			        </div>
			    </div>
			    <div class="form-group">
			        <label class="col-sm-3 control-label">楼栋号：<span class="c-red">*</span></label>
			        <div class="col-sm-4">
			        	<select class="form-control" id="bid" name="bid">
			        		<option value="0" >请选择楼栋号</option>
						</select>           
			        </div>
			    </div>
			    <div class="form-group">
			        <label class="col-sm-3 control-label">姓名：<span class="c-red">*</span></label>
			        <div class="col-sm-4">
			        	<input class="form-control required" name="name" maxlength='10'>
			        </div>
			    </div>
			    <div class="form-group">
			        <label class="col-sm-3 control-label">联系方式：<span class="c-red">*</span></label>
			        <div class="col-sm-4">
			        	<input class="form-control required tel" name="tel">
			        </div>
			    </div>
			    <div class="form-group">
		           <label class="col-sm-3 control-label">内容描述：<span class="c-red">*</span></label>
		           <div class="col-sm-4">
		           		<textarea rows="3" class="form-control required" name="desc" maxlength='500'></textarea>
		           </div>
		        </div>
		        <div class="form-group">
			        <label class="col-sm-3 control-label">图片：</label>
			        <div class="col-sm-4">
			       		<div class="uploadify-div"></div> 
			       		<button data-multi='true' type="button" data-callback='showImg' class="upload" id="upload">选择图片</button>
			        </div>
			    </div>
			    <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
				        <button class="btn btn-primary" type="submit">保存</button>
				       	<a href="<?php echo U('Complaint/index');?>"><button class=" btn btn-default" type="button">返回</button></a>
			       	</div>	
		       	</div>
		       	<input type="hidden" id="block" name="block" value="未知" />
			</form>
		</div>
	</div>
</div>
<script type="text/javascript" >
function showImg(data){
	data = $.parseJSON(data);
	var div = $('#upload').parent().find('.uploadify-div'), html = '<li>';
	html += "<img src='"+data.url+"' />";
	html += "<input type='hidden' name='pic[]' value='"+data.url+"' /><a class='delImgBtn'>删除</a></li>";
	div.append(html);
}
$('body').on('click', '.delImgBtn', function(){
	$(this).parents('li').remove();
});

$(function(){
	$('#aid').change(function(){
		var aid = $(this).val(), html='';
		if(aid > 0){
			waiting();
			$.get('<?php echo U("Block/getBlockByAid");?>', {aid : aid}, function(data){
				complete();
				if(data){
					html = '<option value="0">请选择楼栋</option>';
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
		$('#block').val($(this).find('option:selected').html());
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