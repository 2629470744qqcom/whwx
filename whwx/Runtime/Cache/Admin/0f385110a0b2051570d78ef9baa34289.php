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
	        <link rel="stylesheet" type="text/css" href="/Public/Admin/css/morris.min.css">
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">星管家智慧社区<small> 管理中心</small></h1>
    </div>
</div>
<div class="row">
    <a href="<?php echo U('Repair/index');?>">
        <div class="col-md-3">
            <div class="panel panel-primary text-center no-boder bg-color-green">
                <div class="panel-body">
                    <i class="fa fa-bar-chart-o fa-5x"></i>
                    <h3><?php echo ($count["repair"]); ?></h3>
                </div>
                <div class="panel-footer back-footer-green">在线报修</div>
            </div>
        </div>
    </a>
    <a href="<?php echo U('RentalService/index');?>">
        <div class="col-md-3">
            <div class="panel panel-primary text-center no-boder bg-color-blue">
                <div class="panel-body"><i class="fa fa-shopping-cart fa-5x"></i><h3><?php echo ($count["rental"]); ?></h3></div>
                <div class="panel-footer back-footer-blue">租售服务</div>
            </div>
        </div>
    </a>
    <a href="<?php echo U('Wxmsg/index');?>">
        <div class="col-md-3">
            <div class="panel panel-primary text-center no-boder bg-color-red">
                <div class="panel-body"><i class="fa fa fa-comments fa-5x"></i><h3><?php echo ($count["wxmsg"]); ?></h3></div>
                <div class="panel-footer back-footer-red">粉丝消息</div>
            </div>
        </div>
    </a>
    <a href="<?php echo U('Owner/index');?>">
        <div class="col-md-3">
            <div class="panel panel-primary text-center no-boder bg-color-brown">
                <div class="panel-body"><i class="fa fa-users fa-5x"></i><h3><?php echo ($count["owner"]); ?></h3></div>
                <div class="panel-footer back-footer-brown">小区业主</div>
            </div>
        </div>
    </a>
</div>
<div class="row">
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">最近7天在线报修统计</div>
            <div class="panel-body"><div id="morris-bar-chart"></div></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">最近7天服务评价统计</div>
            <div class="panel-body"><div id="morris-donut-chart"></div></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">投诉建议</div>
            <div class="panel-body">
                <div class="list-group">
                <?php if(is_array($complaintList)): $i = 0; $__LIST__ = $complaintList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$complaintList): $mod = ($i % 2 );++$i;?><a class="list-group-item">
                    <i class="fa fa-fw fa-comment"></i> <?php echo ($complaintList["desc"]); ?> [<?php echo (date('Y-m-d H:i:s', $complaintList["times"])); ?>]</a><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="text-right"><a href="<?php echo U('Complaint/index', array('status' => 0));?>">查看更多 <i class="fa fa-arrow-circle-right"></i></a></div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">预约服务</div> 
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>业主姓名</th>
                                <th>手机号</th>
                                <th>预约内容</th>
                                <th>预约时间</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($bookingList)): $i = 0; $__LIST__ = $bookingList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bookingList): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($bookingList["name"]); ?></td>
                                    <td><?php echo ($bookingList["phone"]); ?></td>
                                    <td><?php echo ($bookingList["desc"]); ?></td>
                                    <td><?php echo (date('Y-m-d H:i:s', $bookingList["day"])); ?></td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-right"><a href="<?php echo U('Booking/index', array('status' => 1));?>">查看更多 <i class="fa fa-arrow-circle-right"></i></a></div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">特惠团订单</div> 
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>产品名称</th>
                                <th>下单时间</th>
                                <th>数量</th>
                                <th>总价</th>
                                <th>状态</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($ordersList)): $i = 0; $__LIST__ = $ordersList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ordersList): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($ordersList["name"]); ?></td>
                                    <td><?php echo (date("Y-m-d H:i:s", $ordersList["single_time"])); ?></td>
                                    <td><?php echo ($ordersList["total"]); ?></td>
                                    <td><?php echo ($ordersList["order_amount"]); ?></td>
                                    <td>
                                        <?php switch($ordersList["status"]): case "0": ?>未支付<?php break;?>
                                            <?php case "1": ?>已取消<?php break;?>
                                            <?php case "2": ?>已支付<?php break;?>
                                            <?php case "3": ?>已发货<?php break;?>
                                            <?php case "4": ?>已收货<?php break;?>
                                            <?php case "5": ?>已完成<?php break;?>
                                            <?php case "6": ?>已删除<?php break; endswitch;?>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-right"><a href="<?php echo U('GroupOrders/index', array('status' => 2));?>">查看更多 <i class="fa fa-arrow-circle-right"></i></a></div>
            </div>
        </div>
    </div>
</div>
<footer style="text-align:center;">技术支持：<a href="http://www.weilt.net/" target="_blank">微老头</a></footer>
<script type="text/javascript" src="/Public/Admin/js/raphael.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/morris.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    // 当天日期
    function show(day){
       var mydate = new Date();
       var str = "" + mydate.getFullYear() + "年";
       str += (mydate.getMonth()+1) + "月";
       str += mydate.getDate() +day+ "日";
       return str;
      }
    //柱状图
    Morris.Bar({
        element: 'morris-bar-chart',
        data: [<?php if(is_array($repair)): $i = 0; $__LIST__ = $repair;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list1): $mod = ($i % 2 );++$i;?>{y: <?php echo ($list1["times"]); ?>, a: <?php echo ($list1["creat_num"]); ?>, b: <?php echo ($list1["handle_num"]); ?>, c: <?php echo ($list1["complate_num"]); ?>},<?php endforeach; endif; else: echo "" ;endif; ?>],
        xkey: 'y',
        ykeys: ['a', 'b', 'c'],
        labels: ['报修数', '处理数', '完成数'],
        hideHover: 'auto',
        resize: true
    });
    //饼状图
    var num1 = <?php echo ((isset($score["num1"]) && ($score["num1"] !== ""))?($score["num1"]):0); ?>, num2 = <?php echo ((isset($score["num2"]) && ($score["num2"] !== ""))?($score["num2"]):0); ?>, num3 = <?php echo ((isset($score["num3"]) && ($score["num3"] !== ""))?($score["num3"]):0); ?>, num4 = <?php echo ((isset($score["num4"]) && ($score["num4"] !== ""))?($score["num4"]):0); ?>, num5 = <?php echo ((isset($score["num5"]) && ($score["num5"] !== ""))?($score["num5"]):0); ?>;
    Morris.Donut({
        element: 'morris-donut-chart',
        data: [
            {label: "非常满意", value: num5},
            {label: "满意", value: num4},
            {label: "一般", value: num3},
            {label: "不满意", value: num2},
            {label: "非常不满意", value: num1},
        ],
        resize: true
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