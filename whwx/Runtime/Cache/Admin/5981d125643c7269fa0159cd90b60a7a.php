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
<div class="row"> 
	<h3 class="page-header">优惠活动&nbsp;&nbsp;<small><?php if(($info["id"]) > "0"): ?>修改<?php else: ?>添加<?php endif; ?>活动</small></h3>
</div>
<div class="row">
	<div class="panel panel-default">
		<div class="panel-body">
			<form role="form" id="myform" method="post"  class="form-horizontal">
			    <div class="form-group">
			        <label class="col-sm-3 control-label">活动标题：<span class="c-red">*</span></label>
			        <div class="col-sm-4">
			        	<input class="form-control required" name="title" value="<?php echo ($info["title"]); ?>" maxlength='50'>
			        </div>
			        <small>不超过五十个字</small>
			    </div>
			    <div class="form-group">
			    	<label class="col-sm-3 control-label">活动图片：<span class="c-red">*</span></label>
			    	<div class="col-sm-4 imgreq">
			       		<div class="uploadify-div">
				       		<?php if(!empty($info["pic"])): ?><li><img src="<?php echo ($info["pic"]); ?>"><input type="hidden"  value="<?php echo ($info["pic"]); ?>" name="pic"></li><?php endif; ?>
					    </div>
	                   	<button type="button" class='upload' id='upload1' data-name="pic">选择图片</button>
                	</div>
			    </div>
				<div class="form-group">
			        <label class="col-sm-3 control-label">活动时间：</label>
			        <div class="col-sm-4">
			        	<input type="text" id="start_time" name="start_time" value="<?php if(empty($info["start_time"])): echo date('Y-m-d H:i'); else: echo (date('Y-m-d H:i', $info["start_time"])); endif; ?>" class="wid_24  pointer datepicker form-control" style='width:40%;float:left;' readonly />
			        	<span style='float:left;'>&nbsp;&nbsp;至&nbsp;&nbsp;</span>
			        	<input type="text" id="end_time" name="end_time" value="<?php if(empty($info["end_time"])): echo date('Y-m-d H:i', time() + 3600 * 24 * 3); else: echo (date('Y-m-d H:i', $info["end_time"])); endif; ?>" class="wid_24  pointer datepicker form-control" style='width:40%;' readonly />
			        </div>
			    </div>
			    <div class="form-group">
			        <label class="col-sm-3 control-label">小区：<span class="c-red">*</span></label>
			        <div class="col-sm-4">
			        	<select class="form-control" id="aid" name="aid">
			        		<option value="0" >全部小区</option>
			        		<?php if(is_array($areaList)): $i = 0; $__LIST__ = $areaList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$area): $mod = ($i % 2 );++$i;?><option value="<?php echo ($area["id"]); ?>"<?php if(($area["id"]) == $info["aid"]): ?>selected<?php endif; ?> ><?php echo ($area["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>           
			        </div>
			    </div>
			    <div class="form-group">
			        <label class="col-sm-3 control-label">排序：</label>
			        <div class="col-sm-4">
			        	<input class="form-control digits" name="sort" value="<?php echo ((isset($info["sort"]) && ($info["sort"] !== ""))?($info["sort"]):100); ?>">
			        </div>
			        <small>请输入正整数</small>
			    </div>
			    <div class="form-group">
					<label  class="col-sm-3 control-label">状态：</label>
					<div class="col-sm-4">
			            <label class="radio-inline">
			                <input type="radio" value="1" id="status1" name="status" <?php if(($info["status"]) != "0"): ?>checked<?php endif; ?>>启用
			            </label>
			            <label class="radio-inline">
			                <input type="radio" value="0"  id="status2" name="status" <?php if(($info["status"]) == "0"): ?>checked<?php endif; ?>>禁用
			            </label>
		            </div>
		        </div>
		       	<div class="form-group">
		           <label class="col-sm-3 control-label">活动信息：</label>
		           <div class="col-sm-4">
		           		<textarea rows="3" class="form-control keditor" name="desc"><?php echo ($info["desc"]); ?></textarea>
		           </div>
		        </div>
		        <?php if(($info["id"]) > "0"): ?><input type='hidden' name='id' id="id" value='<?php echo ($info["id"]); ?>'><?php endif; ?>
		        <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
				        <button class="btn btn-primary" type="submit">提交</button>
				       	<a href="<?php echo U('MerchantActive/index');?>"><button class=" btn btn-default" type="button">返回</button></a>
		       		</div>
		       	</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript" src='<?php echo COM;?>js/daterangepicker.min.js'></script>
<script>
	$(document).ready(function() {
		$('input.datepicker').datetimepicker({format : "yyyy-mm-dd hh:ii", minView : 0, autoclose : true});
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