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
<div class="row"> <h3 class="page-header">订单管理</h3></div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action='<?php echo U("TourOrders/index");?>' class="form-inline text-right fr m-b-5" >
                        <input type="text" name='name' value='<?php echo ($_GET['name']); ?>' class="form-control mr20 w150" placeholder="线路名称">
                        <input type="text" name='dates' value='<?php echo ($_GET['dates']); ?>' placeholder="出行时间" class="form-control mr20 w100 datepicker">
                        <input type="text" name='start_time' value='<?php echo ($_GET['start_time']); ?>' placeholder="下单开始时间" class="form-control mr20 w100 datepicker">
                        <input type="text" name='end_time' value='<?php echo ($_GET['end_time']); ?>' placeholder="下单结束时间" class="form-control mr20 w100 datepicker" >
                        <select name='mid' class="form-control w150 mr20">
                            <option value='0'>旅行社</option>
                            <?php if(is_array($merchantList)): $i = 0; $__LIST__ = $merchantList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$merchantList): $mod = ($i % 2 );++$i;?><option value='<?php echo ($merchantList["id"]); ?>' <?php if(($_GET['mid']) == $merchantList["id"]): ?>selected<?php endif; ?> ><?php echo ($merchantList["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <select name='aid' class="form-control w150 mr20">
                            <option value='0'>所在小区</option>
                            <?php if(is_array($areaList)): $i = 0; $__LIST__ = $areaList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$areaList1): $mod = ($i % 2 );++$i;?><option value='<?php echo ($areaList1["id"]); ?>' <?php if(($_GET['aid']) == $areaList1["id"]): ?>selected<?php endif; ?> ><?php echo ($areaList1["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <select name='pay_type' class="form-control mr20 w100" >
                              <option value=''>支付方式</option>
                              <option value='weipay' <?php if(($_GET['pay_type']) == "weipay"): ?>selected<?php endif; ?> >微信支付 </option>
                              <option value='offline' <?php if(($_GET['pay_type']) == "offline"): ?>selected<?php endif; ?> >线下支付 </option>
                        </select>
                        <select name='status' class="form-control mr20 w100" >
                              <option value='-1'>状态</option>
                              <option value='1' <?php if(($_GET['status']) == "1"): ?>selected<?php endif; ?> >已下单 </option>
                              <option value='2' <?php if(($_GET['status']) == "2"): ?>selected<?php endif; ?> >已支付 </option>
                              <option value='3' <?php if(($_GET['status']) == "3"): ?>selected<?php endif; ?> >已发团 </option>
                              <option value='4' <?php if(($_GET['status']) == "4"): ?>selected<?php endif; ?> >已完成 </option>
                              <option value='5' <?php if(($_GET['status']) == "5"): ?>selected<?php endif; ?> >已取消 </option>
                              <option value='6' <?php if(($_GET['status']) == "6"): ?>selected<?php endif; ?> >已删除 </option>
                        </select>
                        <button class="btn btn-primary" type="submit">搜索</button>
                        <a href="<?php echo U('TourOrders/export', $_GET);?>"><button class="btn btn-primary" type="button">导出结果</button></a>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>订单号</th>
                                    <th width="60">小区</th>
                                    <th width="320">线路信息</th>
                                    <th>订单金额</th>
                                    <th>支付信息</th>
                                    <th>联系人</th>
                                    <th>出游人信息</th>
                                    <th>时间节点</th>
                                    <th width="120">评论信息</th>
                                    <th width="75">状态</th>
                                    <th width="80">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                                        <td><?php echo ($list["id"]); ?></td>
                                        <td><?php echo ($list["area"]); ?></td>
                                        <td><b>线路：</b><?php echo ($list["pname"]); ?><br /><b>日期：</b><?php echo ($list["dates"]); ?><br /><b>人数：</b><?php echo ($list["pnum"]); ?>人</td>
                                        <td>单价：<?php echo ($list["pprice"]); ?><br />数量：<?php echo ($list["pnum"]); ?><br />总价：<?php echo ($list["money"]); ?></td>
                                        <td>
											支付方式：<?php switch($list["pay_type"]): case "weipay": ?>微信<?php break;?>
                                                <?php case "offline": ?>线下<?php break;?>
                                                <?php default: ?>未付<?php endswitch;?><br />
											支付金额：<?php if(($list["status"]) == "2"): echo ($list["money"]); else: ?>0<?php endif; ?><br />
											回执单号：<?php echo ((isset($list["pay_id"]) && ($list["pay_id"] !== ""))?($list["pay_id"]):"无"); ?>
                                        </td>
                                        <td><?php echo ($list["user"]["0"]["name"]); ?><br /><?php echo ($list["phone"]); ?></td>
                                        <td>
                                            <?php if(is_array($list["user"])): $i = 0; $__LIST__ = $list["user"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i; echo ($user["name"]); ?> <?php echo ($user["idcard"]); ?><br /><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </td>
                                        <td>下单：<?php echo (date('Y-m-d H:i', (isset($list["times"]) && ($list["times"] !== ""))?($list["times"]):'无')); ?><br />支付：<?php echo (date('Y-m-d H:i', (isset($list["pay_time"]) && ($list["pay_time"] !== ""))?($list["pay_time"]):'无')); ?><br />发团：<?php echo (date('Y-m-d H:i', (isset($list["use_time"]) && ($list["use_time"] !== ""))?($list["use_time"]):'无')); ?><br />评论：<?php echo (date('Y-m-d H:i', (isset($list["comment_time"]) && ($list["comment_time"] !== ""))?($list["comment_time"]):'无')); ?></td>
                                        <td><?php if(!empty($list["comment"])): echo ((isset($list["comment_score"]) && ($list["comment_score"] !== ""))?($list["comment_score"]):5); ?>分 <?php echo ((isset($list["comment"]) && ($list["comment"] !== ""))?($list["comment"]):'无'); else: ?>无<?php endif; ?></td>
                                        <td>
                                            <?php switch($list["status"]): case "1": ?>已下单<?php break;?>
                                                <?php case "2": ?>已支付<?php break;?>
                                                <?php case "3": ?>已发团<?php break;?>
                                                <?php case "4": ?>已完成<?php break;?>
                                                <?php case "5": ?>已取消<?php break;?>
                                                <?php case "6": ?>已删除<?php break; endswitch;?>
                                        </td>
                                        <td>
                                            <?php if(($list["status"]) == "1"): ?><button class="btn-sm btn btn-default actBtn" type="button" data-type='4' data-id='<?php echo ($list["id"]); ?>'>支付</button><?php endif; ?>
                                            <?php if(($list["status"]) == "2"): ?><button class="btn-sm btn btn-default actBtn" type="button" data-type='1' data-id='<?php echo ($list["id"]); ?>'>发团</button><?php endif; ?>
                                            <?php if(($list["status"]) == "3"): ?><button class="btn-sm btn btn-default actBtn" type="button" data-type='2' data-id='<?php echo ($list["id"]); ?>'>完成</button><?php endif; ?>
                                            <?php if(($list["status"]) == "4"): ?><button class="btn-sm btn btn-default actBtn" type="button" data-type='3' data-id='<?php echo ($list["id"]); ?>'>删除</button><?php endif; ?>
                                            <?php if(($list["comment_score"]) > "0"): ?><br/><br/><button class="btn-sm btn btn-default actBtn" type="button" data-type='5' data-status='<?php echo ($list["comment_status"]); ?>' data-id='<?php echo ($list["id"]); ?>'><?php if(($list["comment_status"]) == "1"): ?>隐藏<?php else: ?>显示<?php endif; ?>评论</button><?php endif; ?>
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
    $('input.datepicker').datetimepicker({format : "yyyy-mm-dd", minView : 2, autoclose : true});
    $('.actBtn').click(function(){
        if(confirm('确定执行此操作？')){
        	var obj = $(this), id = obj.data('id'), type = obj.data('type'), status = obj.data('status');
        	waiting();
        	$.get('<?php echo U("TourOrders/ajax");?>', {id: id, type: type, status: status}, function(data){
        		complete(); showInfo(data.info);
        		if(data.status == 1){
                    if(type == 5){
                        obj.html(status == 1 ? '显示评论' : '隐藏评论').data('status', status == 1 ? 0 : 1);
                    }else{
            			obj.parent().prev().html('已' + obj.html());
            			obj.remove();
                    }
        		}
        	});
        }
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