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
                     	预警消息 <i class="fa fa-caret-down"></i>
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
                <?php if(is_array($menuList)): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menuList): $mod = ($i % 2 );++$i;?><li>
                        <a href="#"><?php echo ($menuList["title"]); ?><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <?php if(is_array($menuList["sub"])): $i = 0; $__LIST__ = $menuList["sub"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?><li class="menu1_<?php echo (str_replace('/', '_', $sub["name"])); ?> menu2_<?php echo substr($sub['name'], 0, strcspn($sub['name'], '/'))?>"> <a href="<?php echo U($sub['name']);?>"><?php echo ($sub["title"]); ?></a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>
            <footer class="footer_bottom">技术支持:&nbsp;&nbsp;<a href="http://www.weilt.net/" target="_blank">微老头</a></footer>
        </div>
    </nav>
    <div id="page-wrapper">
		<div id="page-inner">
	        <link href="<?php echo COM;?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
<div class="row"><h3 class="page-header">旅游收款</h3></div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action='<?php echo U("Payment/tour");?>' class="form-inline text-right fr m-b-5"> 
                 <div class="form-group">
                    <select class="form-control" id="aid" name="aid">
                        <option value="0" >请选择小区</option>
                        <?php if(is_array($areaList)): $i = 0; $__LIST__ = $areaList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$area): $mod = ($i % 2 );++$i;?><option value='<?php echo ($area["id"]); ?>' <?php if(($_GET['aid']) == $area["id"]): ?>selected<?php endif; ?>><?php echo ($area["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>           
                </div>
                <div class="form-group">
                    <select class="form-control" name="pay_type">
                        <option value="0">缴费方式</option>
                        <option value="weipay" <?php if(($_GET['pay_type']) == "weipay"): ?>selected<?php endif; ?>>微信支付</option>
                        <option value="offline" <?php if(($_GET['pay_type']) == "offline"): ?>selected<?php endif; ?>>线下缴费</option>
                    </select>           
                </div>
                缴费时间：<input type="text" name='start_time' value='<?php echo ($_GET['start_time']); ?>' placeholder="开始时间" class="form-control mr20 w100 datepicker" >
                <input type="text" name='end_time' value='<?php echo ($_GET['end_time']); ?>' placeholder="结束时间" class="form-control mr20 w100 datepicker" >
                <button class="btn btn-primary" type="submit">搜索</button>
                <label><a href="<?php echo U('Payment/tour', $_GET);?>?act=1" class="btn btn-primary">导出结果</a></label>
                </form> 
                <div class="table-responsive">
                    <?php if(($_GET['p']) < "2"): ?><table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>微信支付收款</th>
                                    <th>线下收款</th>
                                    <th>合计收款</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo (number_format($totalData["payweipay"],2)); ?> 元</td>
                                    <td><?php echo (number_format($totalData["payoffline"],2)); ?> 元</td>
                                    <td><?php echo (number_format($totalData["total"],2)); ?> 元</td>
                                </tr>
                            </tbody>
                        </table><?php endif; ?>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="60">序号</th>
                                <th>所在小区</th>
                                <th>订单号</th>
                                <th>产品名称</th>
                                <th>订单金额</th>
                                <th>支付时间</th>
                                <th>支付方式</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($i); ?></td>
                                    <td><?php echo ($list["area"]); ?></td>
                                    <td><?php echo ($list["id"]); ?></td>
                                    <td><?php echo ($list["pname"]); ?></td>
                                    <td><?php echo ($list["money"]); ?>元</td>
                                    <td><?php echo (date('Y-m-d H:i', $list["pay_time"])); ?></td> 
                                    <td>
                                        <?php switch($list["pay_type"]): case "weipay": ?>微信支付<?php break;?>
                                            <?php default: ?>线下支付<?php endswitch;?>
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
<script type="text/javascript" src='<?php echo COM;?>js/daterangepicker.min.js'></script>
<script type="text/javascript">
//导出数据，时间选择插件
$('input.datepicker').datetimepicker({format : "yyyy-mm-dd", minView : 2, autoclose : true});
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