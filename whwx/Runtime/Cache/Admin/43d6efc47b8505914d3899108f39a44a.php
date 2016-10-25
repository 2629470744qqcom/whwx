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
<div class="row"> <h3 class="page-header">报修管理</h3></div>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-body">
            	<label><a class="btn btn-primary" href='<?php echo U("Repair/add");?>'>添加报修</a></label>
                <label><a class="btn btn-primary export">数据导出</a></label>
				<form action='<?php echo U("Repair/index");?>' class="form-inline text-right m-b-5" style="float:right;">
	                <select name='name' class="form-control mr20 w150">
                        <option value=''>报修类型</option>
                        <option value='室内区域报修' <?php if(($_GET['name']) == "室内区域报修"): ?>selected<?php endif; ?>>室内区域报修</option>
                        <option value='公共区域报修' <?php if(($_GET['name']) == "公共区域报修"): ?>selected<?php endif; ?>>公共区域报修</option>
                        <option value='房屋质量报修' <?php if(($_GET['name']) == "房屋质量报修"): ?>selected<?php endif; ?>>房屋质量报修</option>
                        <option value='其他报修' <?php if(($_GET['name']) == "其他报修"): ?>selected<?php endif; ?>>其他报修</option>
                        <option value='后台报修' <?php if(($_GET['name']) == "后台报修"): ?>selected<?php endif; ?>>后台报修</option>
                    </select>
                    <select name='cate' id='cate' class="form-control mr20 w100 cate">
                        <option value='0' <?php if(($_GET['cate']) < "1"): ?>selected<?php endif; ?>>负责人身份</option>
                        <option value='1' <?php if(($_GET['cate']) == "1"): ?>selected<?php endif; ?>>维修员</option>
                        <option value='2' <?php if(($_GET['cate']) == "2"): ?>selected<?php endif; ?>>客服</option>
                    </select>
                    <select name='cate_id' id='cate_id' class="form-control mr20 w100 cate_id">
    					<option value='0' <?php if(($_GET['c ate']) < "1"): ?>selected<?php endif; ?>>负责人</option>
                	</select>
	                <input type="text" name='owner' value='<?php echo ($_GET['owner']); ?>' class="form-control w100 mr20" placeholder="业主姓名">
                    <input type="text" name='phone' value='<?php echo ($_GET['phone']); ?>' class="form-control w100 mr20" placeholder="联系方式">
                    <select name='aid' class="form-control w100 mr20">
                        <option value='0'>所在小区</option>
                        <?php if(is_array($areaList)): $i = 0; $__LIST__ = $areaList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$areaList1): $mod = ($i % 2 );++$i;?><option value='<?php echo ($areaList1["id"]); ?>' <?php if(($_GET['aid']) == $areaList1["id"]): ?>selected<?php endif; ?> ><?php echo ($areaList1["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    报修时间：<input type="text" name='start_time' value='<?php echo ($_GET['start_time']); ?>' placeholder="开始时间" class="form-control mr20 w100 datepicker" >
                    <input type="text" name='end_time' value='<?php echo ($_GET['end_time']); ?>' placeholder="结束时间" class="form-control mr20 w100 datepicker" >
                    状态：<select name='status' class="form-control mr20">
                        <option value='-1'>全部</option>
                        <option value='3' <?php if(($_GET['status']) == "3"): ?>selected<?php endif; ?> >已提交</option>
                        <!--<option value='4' <?php if(($_GET['status']) == "4"): ?>selected<?php endif; ?> >已下发</option>
                        <option value='5' <?php if(($_GET['status']) == "5"): ?>selected<?php endif; ?> >已接单</option>-->
                        <option value='6' <?php if(($_GET['status']) == "6"): ?>selected<?php endif; ?> >维修中</option>
                        <option value='2' <?php if(($_GET['status']) == "2"): ?>selected<?php endif; ?> >纠错中</option>
                        <option value='1' <?php if(($_GET['status']) == "1"): ?>selected<?php endif; ?> >预警中</option>
                        <option value='0' <?php if(($_GET['status']) == "0"): ?>selected<?php endif; ?> >已删除</option>
                        <option value='7' <?php if(($_GET['status']) == "7"): ?>selected<?php endif; ?> >维修完成</option>
                        <!--<option value='8' <?php if(($_GET['status']) == "8"): ?>selected<?php endif; ?> >未评论</option>-->
                        <option value='10' <?php if(($_GET['status']) == "10"): ?>selected<?php endif; ?> >已关闭</option>
                        <option value='9' <?php if(($_GET['status']) == "9"): ?>selected<?php endif; ?> >评价完成</option>
                    </select>
                    <button class="btn btn-primary" type="submit">搜索</button>
				</form>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width='60'>序号</th>
                                <th>业主</th>
                                <th>联系方式</th>
                                <th>所在小区</th>
                                <th>报修类型</th>
                                <th>报修时间</th>
                                <th>负责人</th>
                                <th width='75'>状态</th>
                                <th width='220'>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                          	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr class="odd gradeX">
                                    <td><?php echo ($i); ?></td>
                                    <td><?php echo ($list["owner"]); ?></td>
                                    <td><?php echo ($list["phone"]); ?></td>
                                    <td><?php echo ($list["area"]); ?></td>
                                    <td><?php echo ($list["name"]); ?></td>
                                    <td><?php echo (date('Y-m-d H:i:s', $list["creat_time"])); ?></td>
                                    <th><?php echo ((isset($list["catename"]) && ($list["catename"] !== ""))?($list["catename"]):'未分配'); ?></th>
                                    <td class="center">
                                    	<?php if(($list["del"]) == "1"): ?>删除状态
                                    	<?php else: ?>
	                                        <?php switch($list["status"]): case "1": ?>预警中<?php break;?>
	                      						<?php case "2": ?>纠错中<?php break;?>
	                      						<?php case "3": ?>已提交<?php break;?>
	                      						<?php case "4": ?>已提交<?php break;?>
	                      						<?php case "5": ?>维修中<?php break;?>
	                      						<?php case "6": ?>维修中<?php break;?>
	                      						<?php case "7": ?>维修完成<?php break;?>
	                      						<?php case "8": ?>维修完成<?php break;?>
	                      						<?php case "9": ?>评价完成<?php break;?>
	                      						<?php case "10": ?>已关闭<?php break; endswitch; endif; ?>
                                    </td>
                                    <td class="center">
                                       	<button class="btn-sm btn btn-default look" data-id='<?php echo ($list["id"]); ?>'>查看</button>
                                       	<?php if(($list["status"] > 0) and ($list["status"] < 4)): ?><button id="allot<?php echo ($list["id"]); ?>" data-id="<?php echo ($list["id"]); ?>" class="btn-sm btn btn-default allot">分配</button><?php endif; ?>
                                        <?php if(($list["status"] == 8)and ($list["type"] == 4)): ?><button id="allot<?php echo ($list["id"]); ?>" data-id="<?php echo ($list["id"]); ?>" class="btn-sm btn btn-default complate">完成</button><?php endif; ?>
                                    	<?php if(($list["status"]) == "2"): ?><button data-id='<?php echo ($list["id"]); ?>' class='btn btn-default btn-sm closed' type='button'>关闭</button><?php endif; ?>
                                        <?php if(($list["del"]) != "1"): ?><button data-url='<?php echo U("Repair/del?id=".$list["id"]);?>' class="btn-sm btn btn-default delBtn" type="button">删除</button><?php endif; ?>
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
        <div class="modal-content" id='html'></div>
    </div>
</div>
<div id="myModal2" class="modal fade in" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">报修分配</h4>
            </div>
            <div class="modal-body" id="allot"></div>
            <div class="modal-footer">
                <button data-dismiss="modal" class=" btn btn-default" type="button">关闭</button>
                <button class="btn btn-primary submit2" data-id="" type="button">提交</button>
            </div>
        </div>
    </div>
</div>
<div id="myModal3" class="modal fade in" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">数据导出</h4>
            </div>
            <div class="modal-body">
              <form action="<?php echo U('Repair/export');?>" role="form" id="myform" class="form-horizontal" data-callback="export_data">
                <div class="form-group">
                    <label class="col-sm-4 control-label">文件名：<span class="c-red">*</span></label>
                    <div class="col-sm-4">
                      <input class="form-control required" name="name" maxlength='10'>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">选择小区：<span class="c-red">*</span></label>
                    <div class="col-sm-4">
                      <select class="form-control" name="aid" id ="area">
                        <option value="0">全部</option>
                        <?php if(is_array($areaList)): $i = 0; $__LIST__ = $areaList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$areaList2): $mod = ($i % 2 );++$i;?><option value='<?php echo ($areaList2["id"]); ?>'><?php echo ($areaList2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-sm-4 control-label">负责人身份：<span class="c-red">*</span></label>
                    <div class="col-sm-4">
                    	<select class="form-control cate" name="cate">
	                        <option value='0' <?php if(($_GET['cate']) < "1"): ?>selected<?php endif; ?>>请选择身份</option>
                     		<option value='1' <?php if(($_GET['cate']) == "1"): ?>selected<?php endif; ?>>维修员</option>
                      		<option value='2' <?php if(($_GET['cate']) == "2"): ?>selected<?php endif; ?>>客服</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-sm-4 control-label">负责人：<span class="c-red">*</span></label>
                    <div class="col-sm-4">
                    	<select name='cate_id' id='cate_id' class="form-control mr20 cate_id">
        					<option value='0' <?php if(($_GET['cate']) < "1"): ?>selected<?php endif; ?>>请选择身份</option>
                    	</select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">选择状态：<span class="c-red">*</span></label>
                    <div class="col-sm-4">
                      <select class="form-control" name="status">
                        <option value="-1">全部</option>
                        <option value='3'>已提交</option>
                        <!--<option value='4'>已下发</option>
                        <option value='5'>已接单</option>-->
                        <option value='6'>维修中</option>
                        <option value='2'>纠错中</option>
                        <option value='1'>预警中</option>
                        <option value='7'>维修完成</option>
                        <!-- <option value='8'>未评论</option>-->
                        <option value='10'>已关闭</option
                        <option value='9'>评价完成</option>
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
<div id="myModal4" class="modal fade in" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content form-horizontal">
        	<div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">完成后台报修</h4>
            </div>
            <div class="modal-body">
            	<div class="form-group">
                    <label class="col-sm-4 control-label">反馈：<span class="c-red">*</span></label>
                    <div class="col-sm-4">
                      <textarea class="form-control" name="feedback" maxlength='100'></textarea>
                    </div>
                    <input name='rid' type='hidden'/>
                </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class=" btn btn-default" type="button">关闭</button>
                <button class="btn btn-primary feedback" class="button">提交</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src='<?php echo COM;?>js/daterangepicker.min.js'></script>
<script type="text/javascript">
	$('.look').click(function(){
  		waiting();
  		$.get('<?php echo U("Repair/detail");?>', {id : $(this).data('id')}, function(data){
  			  complete();$('#html').html(data);
		  });
		  $('#myModal').modal('show');
	});
	$('body').on('click', '.submit', function(){
  		var id = $('#id').val(), content = $('textarea').val(); 
  		if(content){waiting();
  		    $.post('<?php echo U("Repair/detail");?>', {id: id, content: content}, function(data){
  		        complete();
  		        if(data.status > 0){
  		        	  showInfo('反馈成功');
  		        	  $('#myModal').modal('hide');
  		        }else{
  		        	  showInfo('反馈失败，请稍后再试');
  		        }
  		    });
  		}else{
  			  showInfo('请输入反馈内容');
  		}
	});
	$('.allot').click(function(){
  		var html = '';waiting();
  		$('.submit2').data('id', $(this).data('id'));
  		$.post('<?php echo U("Repair/getRepairMan");?>', {id : $(this).data('id')}, function(data){
    			complete();
    			var list = data.list;
    			html += data.type == 2 ? '<h4>客服专员</h4><div><label class="radio-inline"><input type="radio" checked value="-1" id="type01" name="type">专属客服</label>' : '<h4>维修员</h4><div><label class="radio-inline"><input type="radio" checked value="-2" id="type0" name="type">自由抢单</label>';
    			if(data.type != 2){
      				for(var i = 0; i < list.length; i++){
      					html += '<label class="radio-inline"><input type="radio" value="'+list[i]['id']+'" id="type'+list[i]['name']+'" name="type">'+list[i]['name']+'</label>';
      				}
    			}
    			html += '</div>';
    			$('#allot').html(html);
    	});
    	$('#myModal2').modal('show');
  	});
	$('.submit2').click(function(){
  		var id = $(this).data('id');
  		var type = $('input[name="type"]:checked').val();
  		if(type){
  			waiting();
	  		$.post('<?php echo U("Repair/allot");?>', {id : id, type : type}, function(data){
	  			complete();
    			showInfo(data.info);
    			if(data.status == 1){
    				setTimeout('location.reload();', 1600);
    			}
		    });
  		}else{
  			showInfo('请选择分配人员');
  		}
	});
	//关闭纠错的报修
	$('.closed').click(function(){
		if(confirm('你确定关闭该报修？')){
			waiting();
			$.post('<?php echo U("Repair/close");?>', {id : $(this).data('id')}, function(data){
				complete();showInfo(data.info);
				if(data.status == 1){
					setTimeout('location.reload();', 1600);
				}
			});
		}
	});
	//完成后台提交的报修
	$('.complate').click(function(){
		$('input[name="rid"]').val($(this).data('id'));
		$('#myModal4').modal('show');
	});
	//提交反馈
	$('.feedback').click(function(){
		var feedback = $('textarea[name="feedback"]').val(), flag = true;
		if(feedback){
			if(flag){
				waiting();flag = false;
				$.post('<?php echo U("Repair/feedback");?>', {rid : $('input[name="rid"]').val(), feedback : feedback}, function(data){
					flag = true;complete();showInfo(data.info);
					if(data.status == 1){
						$('#myModal4').modal('hide');
					}
				});
			}
		}else{
			showInfo('请填写反馈内容');
		}
	})
	//根据身份获取维修工/客服
	$('.cate').change(function(){
        var cate = $(this).val();
        // var area = $
        getCateName(cate, 0);
    });
	var cate = "<?php echo ($_GET['cate']); ?>", cate_id = "<?php echo ($_GET['cate_id']); ?>";
	getCateName(cate, cate_id);
	
  //导出数据，时间选择插件
  $('input.datepicker').datetimepicker({format : "yyyy-mm-dd", minView : 2, autoclose : true});
  //导出数据，选择小区和时间等
  $('.export').click(function(){$('#myModal3').modal('show');});
  //导出数据，提交表单
  $('.export_submit').click(function(){$('#myform').submit();});
  //导出回调函数
  function export_data(data){
    $('#myModal3').modal('hide');
    location.href = data.url;
  }
  //根据身份获取负责人
	function getCateName(cate, cate_id){
		var html = '';
    	var aid =$("select#area").val();
		if(cate > 0){
	          waiting();
	          $.get('<?php echo U("Repair/getCateName");?>', {cate : cate,aid :aid}, function(data){
	              complete();var list = data.list;
	              if(data.status != 1){
	            	  showInfo(data.info);
	              }
	              if(list){
	                  html += '<option value="0" >负责人</option>';
	                  for(var i = 0; i< list.length; i++){
	                  	if(list[i]['id'] == cate_id){
		                      	html += '<option value="'+list[i]['id']+'" selected >'+list[i]['name']+'</option>';
	                  	}else{
	                  		html += '<option value="'+list[i]['id']+'" >'+list[i]['name']+'</option>';
	                  	}
	            	}
              	}else{
                 	 html = '<option value="0" >没有获取到负责人</option>';
              	}
              	$('.cate_id').html(html);
          	});
      	}else{
    	  	html = '<option value="0" >负责人身份</option>';
    	  	$('.cate_id').html(html);
      	}
	}
	$("#area").change(function(){
		$("select[name='cate']").val(0);
		$('select[name="cate_id"]').html("<option value='0'>负责人身份</option>");
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