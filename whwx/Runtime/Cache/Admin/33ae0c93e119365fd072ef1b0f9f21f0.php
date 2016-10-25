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
<div class="row"><h3 class="page-header">缴费管理</h3></div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <label><a class="btn btn-primary export">数据导出</a></label>
                <form action='<?php echo U("Payment/index");?>' class="form-inline text-right fr m-b-5"> 
                 <div class="form-group">
                    <select class="form-control" id="aid" name="aid" data-bid="#bid">
                        <option value="0" >请选择小区</option>
                        <?php if(is_array($areaList)): $i = 0; $__LIST__ = $areaList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$area): $mod = ($i % 2 );++$i;?><option value='<?php echo ($area["id"]); ?>' <?php if(($_GET['aid']) == $area["id"]): ?>selected<?php endif; ?>><?php echo ($area["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>           
                </div>
                <div class="form-group">
                    <select class="form-control" id="bid" name="bid">
                        <option value="0" >请选择账单</option>
                        <?php if(is_array($bill_list)): $i = 0; $__LIST__ = $bill_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bill_list): $mod = ($i % 2 );++$i;?><option value="<?php echo ($bill_list["id"]); ?>" <?php if(($_GET['bid']) == $bill_list['id']): ?>selected<?php endif; ?>><?php echo ($bill_list["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>           
                </div>
                <div class="form-group">
                    <select class="form-control" name="pay_cate">
                        <option value="">请选择费用类别</option>
                        <option value="porperty" <?php if(($_GET['pay_cate']) == "porperty"): ?>selected<?php endif; ?>>物业费</option>
                        <option value="energy" <?php if(($_GET['pay_cate']) == "energy"): ?>selected<?php endif; ?>>能耗费</option>
                        <option value="water" <?php if(($_GET['pay_cate']) == "water"): ?>selected<?php endif; ?>>二次供水费</option>
                        <option value="carport" <?php if(($_GET['pay_cate']) == "carport"): ?>selected<?php endif; ?>>车位费</option>
                        <option value="arrear_money" <?php if(($_GET['pay_cate']) == "arrear_money"): ?>selected<?php endif; ?>>历年欠费</option>
                        <option value="car_manger" <?php if(($_GET['pay_cate']) == "car_manger"): ?>selected<?php endif; ?>>车位管理费</option>
                    </select>           
                </div>
                <div class="form-group">
                    <select class="form-control" name="pay_type">
                        <option value="0">缴费方式</option>
                        <option value="1" <?php if(($_GET['pay_type']) == "1"): ?>selected<?php endif; ?>>微信支付</option>
                        <option value="2" <?php if(($_GET['pay_type']) == "2"): ?>selected<?php endif; ?>>线下缴费</option>
                        <option value="3" <?php if(($_GET['pay_type']) == "3"): ?>selected<?php endif; ?>>积分兑换</option>
                    </select>           
                </div>
                缴费时间：<input type="text" name='start_time' value='<?php echo ($_GET['start_time']); ?>' placeholder="开始时间" class="form-control mr20 w100 datepicker" >
                <input type="text" name='end_time' value='<?php echo ($_GET['end_time']); ?>' placeholder="结束时间" class="form-control mr20 w100 datepicker" >
    			房间号：<input type="text" name='addr' value='<?php echo ($_GET['addr']); ?>' class="form-control mr20 w100" >
                <button class="btn btn-primary" type="submit">搜索</button>
                </form> 
                <div class="table-responsive">
                    <?php if(($_GET['p']) < "2"): ?><table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>物业费收款</th>
                                    <th>能耗费收款</th>
                                    <th>二次供水费收款</th>
                                    <th>车位费收款</th>
                                    <th>车位管理费收款</th>
                                    <th>历年欠费收款</th>
                                    <th>合计收款</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo (number_format($totalData["porperty"])); ?> 元</td>
                                    <td><?php echo (number_format($totalData["energy"])); ?> 元</td>
                                    <td><?php echo (number_format($totalData["water"])); ?> 元</td>
                                    <td><?php echo (number_format($totalData["carport"])); ?> 元</td>
                                    <td><?php echo (number_format($totalData["car_manger"])); ?> 元</td>
                                    <td><?php echo (number_format($totalData["arrear_money"])); ?> 元</td>
                                    <td><?php echo (number_format($totalData["total"])); ?> 元</td>
                                </tr>
                            </tbody>
                        </table><?php endif; ?>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="60">序号</th>
                                <th>所在小区</th>
                                <th>房号</th>
                                <th>缴费姓名</th>
                                <th>手机号码</th>
                                <th>账单名</th>
                                <th>订单金额</th>
                                <th>实际缴费</th>
                                <th>缴费时间</th>
                                <th>兑换积分</th>
                                <th>兑换金额</th>
                                <th>支付方式</th>
                                <th>费用类别</th>
                                <th>备注</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($i); ?></td>
                                    <td><?php echo ($list["area"]); ?></td>
                                    <td><?php echo ($list["room"]); ?>室</td>
                                    <td><?php echo ((isset($list["owner"]["name"]) && ($list["owner"]["name"] !== ""))?($list["owner"]["name"]):'后台缴费'); ?></td>
                                    <td><?php echo ((isset($list["owner"]["phone"]) && ($list["owner"]["phone"] !== ""))?($list["owner"]["phone"]):'后台缴费'); ?></td>
                                    <td><?php echo ($list["bill"]); ?></td>
                                    <td><?php echo ($list["money"]); ?>元</td>
                                    <td><?php echo ((isset($list["real_money"]) && ($list["real_money"] !== ""))?($list["real_money"]):'0'); ?>元</td>
                                    <td><?php echo (date('Y-m-d H:i', $list["pay_time"])); ?></td> 
                                    <td><?php echo ($list["point"]); ?></td>
                                    <td><?php echo ((isset($list["change_money"]) && ($list["change_money"] !== ""))?($list["change_money"]):'0'); ?>元</td>
                                    <td>
                                        <?php switch($list["pay_type"]): case "1": ?>微信支付<?php break;?>
                                            <?php case "3": ?>积分兑换<?php break;?>
                                            <?php default: ?>线下支付<?php endswitch;?>
                                    </td>
                                    <td>
                                        <?php switch($list["pay_cate"]): case "porperty": ?>物业费<?php break;?>
                                            <?php case "energy": ?>能耗费<?php break;?>
                                            <?php case "water": ?>二次供水费<?php break;?>
                                            <?php case "carport": ?>车位费<?php break;?>
                                            <?php case "car_manger": ?>车位管理费<?php break;?>
                                            <?php case "arrear_money": ?>历年欠费<?php break;?>
                                            <?php default: ?>未知<?php endswitch;?>
                                    </td>
                                    <td><?php echo ($list["remark"]); ?></td>
                                    <td>
                                        <button data-id="<?php echo ($list["id"]); ?>" id="payment<?php echo ($list["id"]); ?>" class="btn-sm btn btn-default editRemark">备注</button>
                                        <?php if(($list["pay_type"]) == "2"): ?><button data-url='<?php echo U("Payment/delOffline?id=" . $list["id"]);?>' class="btn-sm btn btn-default delBtn" type="button" >删除</button><?php endif; ?>
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
                <h4 class="modal-title">数据导出</h4>
            </div>
            <div class="modal-body">
              <form action="<?php echo U('Payment/export');?>" role="form" id="myform" class="form-horizontal" data-callback="export_data">
                <div class="form-group">
                    <label class="col-sm-4 control-label">文件名：<span class="c-red">*</span></label>
                    <div class="col-sm-4">
                      <input class="form-control required" name="name" maxlength='10'>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">选择小区：<span class="c-red">*</span></label>
                    <div class="col-sm-4">
                      <select class="form-control" name="aid" id ="aid2" data-bid="#bid2">
                        <option value="0">全部</option>
                        <?php if(is_array($areaList)): $i = 0; $__LIST__ = $areaList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$areaList2): $mod = ($i % 2 );++$i;?><option value='<?php echo ($areaList2["id"]); ?>'><?php echo ($areaList2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">选择账单：<span class="c-red">*</span></label>
                    <div class="col-sm-4">
                      <select class="form-control" name="bid" id="bid2">
                        <option value="-1">请选择小区</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">费用类别：<span class="c-red">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="pay_cate">
                            <option value="">请选择费用类别</option>
                            <option value="porperty">物业费</option>
                            <option value="energy">能耗费</option>
                            <option value="water">二次供水费</option>
                            <option value="carport">车位费</option>
                            <option value="arrear_money">历年欠费</option>
                            <option value="car_manger">车位管理费</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">缴费方式：<span class="c-red">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="pay_type">
                            <option value="0">请选择缴费方式</option>
                            <option value="1">微信支付</option>
                            <option value="2">线下缴费</option>
                            <option value="3">积分兑换</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">选择时间：<span class="c-red">*</span></label>
                    <div class="col-sm-2"><input class="form-control datepicker required" placeholder="开始时间" name="start_time"></div>
                    <div class="col-sm-2"><input class="form-control datepicker required" placeholder="结束时间" name="end_time"></div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class=" btn btn-default" type="button">关闭</button>
                <button class="btn btn-primary export_submit" type="button">导出</button>
            </div>
        </div>
    </div>
</div>
<div id="myModal2" class="modal fade in" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">备注信息</h4>
            </div>
            <div class="modal-body">
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary saveRemark" type="button">保存</button>
                <button data-dismiss="modal" class=" btn btn-default" type="button">关闭</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src='<?php echo COM;?>js/daterangepicker.min.js'></script>
<script type="text/javascript">
//获取小区账单
$('#aid,#aid2').change(function(){
    waiting(); var obj = $(this);
    $.get('<?php echo U("Payment/getBillList");?>', {aid: obj.val()}, function(data){
        complete(); var html = '<option value="0" >请选择账单</option>';
        $.each(data, function(i, v){
            html += '<option value="' + v.id + '" >' + v.name + '</option>';
        });
        $(obj.data('bid')).html(html);
    });
});
//导出数据，时间选择插件
$('input.datepicker').datetimepicker({format : "yyyy-mm-dd", minView : 2, autoclose : true});
//导出数据，选择小区和时间等
$('.export').click(function(){$('#myModal').modal('show');});
//导出数据，提交表单
$('.export_submit').click(function(){$('#myform').submit();});
//导出回调函数
function export_data(data){
    $('#myModal3').modal('hide');
    location.href = data.url;
}
//修改备注
var payment_id = 0;
$('.editRemark').click(function(){
    $('#myModal2').modal('show');
    $('#myModal2 textarea').val($(this).parent().prev().html());
    payment_id = $(this).data('id');
});
//保存备注信息
$('.saveRemark').click(function(){
    waiting(); var remark = $('#myModal2 textarea').val();
    $.post('<?php echo U("Payment/editRemark");?>', {id: payment_id, remark: remark}, function(data){
        complete(); showInfo(data.info);
        if(data.status == 1){
            $('#payment' + payment_id).parent().prev().html(remark);
            $('#myModal2').modal('hide');
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