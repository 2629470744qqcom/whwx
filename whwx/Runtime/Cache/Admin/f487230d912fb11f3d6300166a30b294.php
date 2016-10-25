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
                	<label><a class="btn btn-primary export" >导出数据</a></label>
                    <form action='<?php echo U("GroupOrders/index");?>' class="form-inline text-right fr m-b-5" >
                产品名称：<input type="text" name='gname' value='<?php echo ($_GET['gname']); ?>' class="form-control mr20 w150" > 
                支付方式：<select name='pay_type' class="form-control mr20 w150" >
                              <option value='-1'>全部</option>
                              <option value='0' <?php if(($_GET['pay_type']) == "0"): ?>selected<?php endif; ?> >无支付 </option>
                              <option value='1' <?php if(($_GET['pay_type']) == "1"): ?>selected<?php endif; ?> >微信付款 </option>
                              <option value='2' <?php if(($_GET['pay_type']) == "2"): ?>selected<?php endif; ?> >货到付款 </option>
                              <option value='3' <?php if(($_GET['pay_type']) == "3"): ?>selected<?php endif; ?> >积分付款 </option>
                        </select>
                  状态：<select name='status' class="form-control mr20 w150" >
                              <option value='-1'>全部</option>
                              <option value='0' <?php if(($_GET['status']) == "0"): ?>selected<?php endif; ?> >未支付 </option>
                              <option value='1' <?php if(($_GET['status']) == "1"): ?>selected<?php endif; ?> >已取消 </option>
                              <option value='2' <?php if(($_GET['status']) == "2"): ?>selected<?php endif; ?> >已支付 </option>
                              <option value='3' <?php if(($_GET['status']) == "3"): ?>selected<?php endif; ?> >已发货 </option>
                              <option value='4' <?php if(($_GET['status']) == "4"): ?>selected<?php endif; ?> >已收货 </option>
                              <option value='5' <?php if(($_GET['status']) == "5"): ?>selected<?php endif; ?> >已完成 </option>
                              <option value='6' <?php if(($_GET['status']) == "6"): ?>selected<?php endif; ?> >已删除 </option>
                        </select>
                        <button class="btn btn-primary" type="submit">搜索</button>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="60">序号</th>
                                    <th>订单号</th>
                                    <th>下单时间</th>
                                    <th>产品名称</th>
                                    <th>小区</th>
                                    <th>数量</th>
                                    <th>单价</th>
                                    <th>总价</th>
                                    <th>支付方式</th>
                                    <th>支付金额</th>
                                    <th>支付时间</th>
                                    <th width="75">状态</th>
                                    <th width="200">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr class="odd gradeX">
                                        <td><?php echo ($i); ?></td>
                                        <td><?php echo (sprintf('%08s',$list["id"])); ?></td>
                                        <td><?php echo (date('Y-m-d H:i:s',$list["single_time"])); ?></td>
                                        <td><?php echo ($list["name"]); ?></td>
                                        <td><?php echo ($list["area"]); ?></td>
                                        <td><?php echo ($list["total"]); ?></td>
                                        <td><?php echo ($list["prix"]); ?></td>
                                        <td><?php echo ($list["order_amount"]); ?></td>
                                        <td>
                                            <?php switch($list["pay_type"]): case "0": ?>未支付<?php break;?>
                                                <?php case "1": ?>微信付款<?php break;?>
                                                <?php case "2": ?>货到付款<?php break;?>
                                                <?php case "3": ?>积分付款<?php break; endswitch;?>
                                        </td>
                                        <td><?php echo ($list["pay_amount"]); ?></td>
                                        <td><?php if(($list["pay_type"]) != "0"): echo (date('Y-m-d H:i:s',$list["pay_time"])); else: ?>未支付<?php endif; ?></td>
                                        <td>
                                            <?php switch($list["status"]): case "0": ?>未支付<?php break;?>
                                                <?php case "1": ?>已取消<?php break;?>
                                                <?php case "2": ?>已支付<?php break;?>
                                                <?php case "3": ?>已发货<?php break;?>
                                                <?php case "4": ?>已收货<?php break;?>
                                                <?php case "5": ?>已完成<?php break;?>
                                                <?php case "6": ?>已删除<?php break; endswitch;?>
                                        </td>
                                        <td>
                                            <button class="btn-sm btn btn-default look" data-id='<?php echo ($list["id"]); ?>' type="button">查看</button>
                                            <?php if(($list["status"]) >= "2"): ?><button class="btn-sm btn btn-default input" data-status='<?php echo ($list["status"]); ?>' type="button" data-id='<?php echo ($list["id"]); ?>'>发货</button><?php endif; ?>
                                             <?php if(($list["status"]) > "2"): ?><button class="btn-sm btn btn-default logistics" data-status='<?php echo ($list["status"]); ?>' type="button" data-id='<?php echo ($list["id"]); ?>'>物流</button><?php endif; ?>
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
      	        <form action="<?php echo U('GroupOrders/input');?>" id="myform1" class="form-horizontal">
      	            <div class="modal-header">
      	                <button data-dismiss="modal" class="close" type="button">×</button>
      	                <h4 class="modal-title">录入/修改快递</h4>
      	            </div>
      	            <div class="modal-body">
          	            <div class="form-group">
            				        <label class="col-sm-3 control-label">快递公司：<span class="c-red">*</span></label>
            				        <div class="col-sm-4">
              				        	<select class="form-control" id="ems_name" name="ems_name">
                				        		<option value="顺丰速递">顺丰速递</option>
                				        		<option value="ems">EMS</option>
                				        		<option value="申通快递">申通快递</option>
                				        		<option value="圆通快递">圆通快递</option>
                				        		<option value="中通快递">中通快递</option>
                				        		<option value="韵达快递">韵达快递</option>
                				        		<option value="百世汇通">百世汇通</option>
                				        		<option value="宅急送">宅急送</option>
                				        		<option value="天天快递">天天快递</option>
                                    			<option value="商家配送">商家配送</option>
              							</select>
            				        </div>
          				      </div>
          				      <div class="form-group" id='ems_num'>
            				        <label class="col-sm-3 control-label" id='em_num'>快递单号：<span class="c-red">*</span></label>
                            <label class="col-sm-3 control-label" id='supplier_phone' style="display:none;">手机号：<span class="c-red">*</span></label>
            				        <div class="col-sm-6">
            				         	  <input class="form-control required digits" name="ems_num">
            				        </div>
          				      </div>
      	            </div>
      	            <div class="modal-footer">
      	                <button data-dismiss="modal" class=" btn btn-default" type="button">关闭</button>
      	                <input type="hidden" name="orderid" />
      	                <button class="btn btn-primary ordersave" type="button">保存</button>
      	            </div>
                </form>
            </div>
        </div>
    </div>
    <div id="myModallook" class="modal fade in" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="html"></div>
        </div>
    </div>
	<div id="myModallogistics" class="modal fade in" style="display: none;">
	    <div class="modal-dialog modal-lg">
	        <div class="modal-content" id="htmllogistics"></div>
	    </div>
	</div>
	<div id="myModalExport" class="modal fade in" style="display: none;">
	    <div class="modal-dialog modal-lg">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button data-dismiss="modal" class="close" type="button">×</button>
	                <h4 class="modal-title">数据导出</h4>
	            </div>
	            <div class="modal-body">
		            <form action="<?php echo U('GroupOrders/export');?>" id="myform" class="form-horizontal" data-callback="export_data">
	                <div class="form-group">
	                    <label class="col-sm-4 control-label">文件名：<span class="c-red">*</span></label>
	                    <div class="col-sm-4">
	                      <input class="form-control required" name="name" maxlength='10'>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-sm-4 control-label">产品名称：<span class="c-red">*</span></label>
	                    <div class="col-sm-4">
	                      <input type="text" name='gname' value='<?php echo ($_GET['gname']); ?>' class="form-control" > 
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-sm-4 control-label">选择小区：<span class="c-red">*</span></label>
	                    <div class="col-sm-4">
	                      <select class="form-control" name="aid">
	                        <option value="0">全部</option>
	                        <?php if(is_array($areaList)): $i = 0; $__LIST__ = $areaList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$areaList2): $mod = ($i % 2 );++$i;?><option value='<?php echo ($areaList2["id"]); ?>'><?php echo ($areaList2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
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
	<script type="text/javascript" src='<?php echo COM;?>js/daterangepicker.min.js'></script>
    <script type="text/javascript">
    	$(function(){
      		$('.input').click(function(){
        		$('#myform')[0].reset();
        		$('input[name="orderid"]').val($(this).data('id'));
            	$("#ems_name").click(function(){
	            	var $options=$('option:selected',this);
	            	if($options.val()!='商家配送'){
	                	$('#em_num').show();
	                	$('#supplier_phone').hide();
	            	}else if($options.val('商家配送')){
	                	$('#em_num').hide();
	                	$('#supplier_phone').show();
	            	}
              	});
              	//alert($(this).data('status'));
	       		if($(this).data('status') >= 3){
	 				$.post('<?php echo U("GroupOrders/input");?>', {act : 1, id : $(this).data('id')}, function(data){
						$('input[name="ems_num"]').val(data.ems_num);
						$('#ems_name').val(data.ems_name);
	         		});
	       		}
	        	$('#myModal').modal('show');
      		});
          $(".look").click(function(){
              waiting();
              $.get('<?php echo U("GroupOrders/detail");?>', {id : $(this).data('id')}, function(data){
                  complete();$('#html').html(data);
              });
              $('#myModallook').modal('show');
          });
          $(".logistics").click(function(){
              waiting();
              $.get('<?php echo U("GroupOrders/logistics");?>', {id : $(this).data('id')}, function(data){
                  complete();$('#htmllogistics').html(data);
              });
              $('#myModallogistics').modal('show');
          });
          $('.ordersave').click(function(){
        	  waiting();
        	  $.post("<?php echo U('GroupOrders/input');?>", $('#myform1').serialize(), function(data){
        		  complete();showInfo(data.info);
        		 $('#myModal').modal('hide');
        	  });
          });
          //导出数据，时间选择插件
          $('input.datepicker').datetimepicker({format : "yyyy-mm-dd", minView : 2, autoclose : true});
          //导出数据，选择小区和时间等
          $('.export').click(function(){$('#myModalExport').modal('show');});
          //导出数据，提交表单
          $('.export_submit').click(function(){$('#myModalExport #myform').submit();});
    	});
    	//导出回调函数
        function export_data(data){
          $('#myModalExport').modal('hide');
          location.href = data.url;
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