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
	        <div class="row"> <h3 class="page-header">租售管理</h3></div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <label><a class="btn btn-primary" href="<?php echo U('RentalService/add');?>">添加</a></label>
                <form action='<?php echo U("RentalService/index");?>' class="form-inline text-right fr m-b-5" >
                 <div class="form-group">
                    <select class="form-control" id="aid" name="aid">
                        <option value="0" >请选择小区</option>
                        <?php if(is_array($areaList)): $i = 0; $__LIST__ = $areaList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$area): $mod = ($i % 2 );++$i;?><option value='<?php echo ($area["id"]); ?>' <?php if(($_GET['aid']) == $area["id"]): ?>selected<?php endif; ?>><?php echo ($area["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>           
                </div>
              标题：<input type="text" name='title' value='<?php echo ($_GET['title']); ?>' class="form-control mr20 w150" >
              类型：<select name='type' class="form-control mr20 w150" >
                        <option value='-1'>全部</option>
                        <option value='1' <?php if(($_GET['type']) == "1"): ?>selected<?php endif; ?> >出租房屋 </option>
                        <option value='2' <?php if(($_GET['type']) == "2"): ?>selected<?php endif; ?> >出售房屋 </option>
                        <option value='3' <?php if(($_GET['type']) == "3"): ?>selected<?php endif; ?> >出租车位 </option>
                        <option value='4' <?php if(($_GET['type']) == "4"): ?>selected<?php endif; ?> >出售车位 </option>
                        <option value='5' <?php if(($_GET['type']) == "5"): ?>selected<?php endif; ?> >出租单间 </option>
                    </select>
              状态：<select name='status' class="form-control mr20 w150" >
                        <option value='-1'>全部</option>
                        <option value='0' <?php if(($_GET['status']) == "0"): ?>selected<?php endif; ?> >删除 </option>
                        <option value='1' <?php if(($_GET['status']) == "1"): ?>selected<?php endif; ?> >正常 </option>
                    </select>
                    <button class="btn btn-primary" type="submit">搜索</button>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="60">序号</th>
                                <th>业主</th>
                                <th>小区</th>
                                <th>标题</th>
                                <th>发布时间</th> 
                                <th>类型</th>
                                <th>价格</th>
                                <th>面积</th>
                                <th width="75">状态</th>
                                <th width="180">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($i); ?></td>
                                    <td><?php echo ($list["name"]); ?></td>
                                    <td><?php echo ($list["area"]); ?></td>
                                    <td><?php echo ($list["title"]); ?></td>
                                    <td><?php echo (date("Y-m-d H:i", $list["times"])); ?></td> 
                                    <td>
                                        <?php switch($list["type"]): case "1": ?>出租房屋<?php break;?>
                                            <?php case "2": ?>出售房屋<?php break;?> 
                                            <?php case "3": ?>出租车位<?php break;?> 
                                            <?php case "4": ?>出售车位<?php break;?>  
                                            <?php case "5": ?>出租单间<?php break; endswitch;?>                   
                                    </td>
                                    <td><?php echo ($list["price"]); ?>元</td>
                                    <td><?php echo ($list["size"]); ?>平</td> 
                                    <td>
                                        <?php switch($list["status"]): case "0": ?><button class=" btn btn-default btn-sm setStatus" type="button" data-url='<?php echo U("RentalService/setStatus?id=".$list["id"]);?>' data-status="<?php echo ($list["status"]); ?>">删除</button><?php break;?>
                                            <?php case "1": ?><button class="btn btn-primary btn-sm setStatus" type="button" data-url='<?php echo U("RentalService/setStatus?id=".$list["id"]);?>' data-status="<?php echo ($list["status"]); ?>">正常</button><?php break; endswitch;?>
                                    </td>
                                    <td>
                                       <button class="btn btn-default btn-sm replayMsg" data-sid="<?php echo ($list["sid"]); ?>" data-id="<?php echo ($list["id"]); ?>">查看</button>
                                        <a class=" btn btn-sm btn-default" id="order_button" data-id='<?php echo ($list["id"]); ?>' href="<?php echo U("RentalService/intention?id=".$list['id']);?>">意向</a>
                                        <?php if(($list["oid"]) == "0"): ?><a class=" btn btn-sm btn-default" href="<?php echo U('RentalService/edit?id='.$list['id']);?>">修改</a><?php endif; ?>
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
        <div class="modal-content" id="html"></div>
    </div>
</div>
<script type="text/javascript">
    //查看详情及回复
    $('.replayMsg').click(function(){
            waiting();
            $.get('<?php echo U("RentalService/Indexdetail");?>', {id : $(this).data('id')}, function(data){
                complete();
                if(data.status == 0){
                    showInfo(data.info);
                }else{
                    $('#html').html(data);
                    $('#myModal').modal('show');
                }
            })
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