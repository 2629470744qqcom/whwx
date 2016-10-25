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
	        <div class="row"> <h3 class="page-header">粉丝管理</h3></div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action='<?php echo U("Wxfans/index");?>' class="form-inline text-right m-b-5 fr">
        	  昵称：<input type="text" name='nickname' value='<?php echo ($_GET['nickname']); ?>' class="form-control mr20 w150">
              类型：<select name='type' class="form-control mr20 w150">
                        <option value='-1'>全部</option>
                        <option value='1' <?php if(($_GET['type']) == "1"): ?>selected<?php endif; ?> >业主</option>
                        <option value='2' <?php if(($_GET['type']) == "2"): ?>selected<?php endif; ?> >租客/亲属</option>
                        <option value='3' <?php if(($_GET['type']) == "3"): ?>selected<?php endif; ?> >维修工</option>
                        <option value='4' <?php if(($_GET['type']) == "4"): ?>selected<?php endif; ?> >客服专员</option>
                        <option value='0' <?php if(($_GET['type']) == "0"): ?>selected<?php endif; ?> >普通粉丝</option>
                    </select>
                    <button class="btn btn-primary" type="submit">搜索</button>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="60">序号</th>
                                <th>昵称</th>
                                <th>类型</th>
                                <th>性别</th>
                                <th>地区</th>
                                <th>活跃时间</th>
                                <th>关注时间</th>
                                <th>业主姓名</th>
                                <th>手机号</th>
                                <th>业主地址</th>
                                <th width="100">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($i); ?></td>
                                    <td><?php echo ($list["nickname"]); ?></td>
                                    <td>
                                        <?php switch($list["type"]): case "1": ?>业主<?php break;?>
                                            <?php case "2": ?>亲属/租客<?php break;?>
                                            <?php case "3": ?>维修工<?php break;?>
                                            <?php case "4": ?>客服专员<?php break;?>
                                            <?php default: ?>粉丝<?php endswitch;?>
                                    </td>
                                    <td>
                                        <?php switch($list["sex"]): case "1": ?>男<?php break;?>
                                            <?php case "2": ?>女<?php break;?>
                                            <?php default: ?>未知<?php endswitch;?>
                                    </td>
                                    <td><?php echo ((isset($list["country"]) && ($list["country"] !== ""))?($list["country"]):"未知"); ?> <?php echo ((isset($list["province"]) && ($list["province"] !== ""))?($list["province"]):"未知"); ?> <?php echo ((isset($list["city"]) && ($list["city"] !== ""))?($list["city"]):"未知"); ?></td>
                                    <td><?php echo (date('Y-m-d H:i', $list["active_time"])); ?></td>
                                    <td><?php echo (date('Y-m-d H:i', $list["subscribe_time"])); ?></td>
                                    <td><?php echo ((isset($list["ownerInfo"]["name"]) && ($list["ownerInfo"]["name"] !== ""))?($list["ownerInfo"]["name"]):'未知'); ?></td>
                                    <td><?php echo ((isset($list["ownerInfo"]["phone"]) && ($list["ownerInfo"]["phone"] !== ""))?($list["ownerInfo"]["phone"]):'未知'); ?></td>
                                    <td><?php echo ($list["ownerInfo"]["aname"]); echo ((isset($list["ownerInfo"]["addr"]) && ($list["ownerInfo"]["addr"] !== ""))?($list["ownerInfo"]["addr"]):'未知'); ?></td>
                                    <td><button class="btn-sm btn btn-default refreshInfo" data-id="<?php echo ($list["openid"]); ?>">刷新资料</button></td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <?php echo ($page); ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">//刷新资料js
$('.refreshInfo').click(function(){
    waiting();
    $.get('<?php echo U("Wxfans/refreshInfo");?>', {id: $(this).data('id')}, function(data){
        complete();
        if(data.status == 1){
            location.reload();
        }else{
            showInfo(data.info);
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