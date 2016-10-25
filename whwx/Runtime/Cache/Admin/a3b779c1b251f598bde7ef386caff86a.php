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
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/morris.min.css">
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">统计报表 <small>报修统计</small></h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-inline" style="margin-bottom: 6px; float: right;"> 
            <div class="form-group">
                <select class="form-control" id="aid" name="aid" data-bid="#bid">
                    <option value="0" >请选择小区</option>
                    <?php if(is_array($areaList)): $i = 0; $__LIST__ = $areaList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$areaList1): $mod = ($i % 2 );++$i;?><option value='<?php echo ($areaList1["id"]); ?>'><?php echo ($areaList1["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>           
            </div>
            <button type="button" class="btn btn-primary btn_time" data-num="7">最近7天</button>
            <button type="button" class="btn btn-default btn_time" data-num="30">最近30天</button>
            <button type="button" class="btn btn-default btn_time" data-num="6">最近6个月</button>
            <button type="button" class="btn btn-default btn_time" data-num="12">最近12个月</button>
            时间区间：<input type="text" name='start_time' placeholder="开始时间" class="form-control w100 datepicker" >
            <input type="text" name='end_time' placeholder="结束时间" class="form-control w100 datepicker" >
            <button type="button" class="btn btn-info">查看</button>
        </div>
        <h3 class="form-inline" style="margin-bottom: 6px;">报修数量统计</h3>
        <div class="panel panel-default" style='text-align:center;'>
            <div class="panel-body"><div id="morris-bar-chart1"></div></div>
        </div>
    </div>
    <div class="col-md-12">
        <h3 class="form-inline" style="margin-bottom: 6px;">服务评分统计</h3>
        <div class="panel panel-default" style='text-align:center;'>
            <div class="panel-body"><div id="morris-bar-chart2"></div></div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/Public/Admin/js/raphael.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/morris.min.js"></script>
<script type="text/javascript" src='<?php echo COM;?>js/daterangepicker.min.js'></script>
<script type="text/javascript">
$('input.datepicker').datetimepicker({format : "yyyy-mm-dd", minView : 2, autoclose : true});
//柱状图
var bar1 = Morris.Bar({
    data: [<?php if(is_array($data["dataNum"])): $i = 0; $__LIST__ = $data["dataNum"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dataNum): $mod = ($i % 2 );++$i;?>{y: <?php echo ($dataNum["y"]); ?>, a: <?php echo ($dataNum["a"]); ?>, b: <?php echo ($dataNum["b"]); ?>, c: <?php echo ($dataNum["c"]); ?>},<?php endforeach; endif; else: echo "" ;endif; ?>],
    element: 'morris-bar-chart1', xkey: 'y', ykeys: ['a', 'b', 'c'], labels: ['报修数', '处理数', '完成数'], hideHover: 'auto', parseTime:false, resize: true
});
var bar2 = Morris.Bar({
    data: [<?php if(is_array($data["dataScore"])): $i = 0; $__LIST__ = $data["dataScore"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dataScore): $mod = ($i % 2 );++$i;?>{y: <?php echo ($dataScore["y"]); ?>, a: <?php echo ($dataScore["a"]); ?>, b: <?php echo ($dataScore["b"]); ?>, c: <?php echo ($dataScore["c"]); ?>, d: <?php echo ($dataScore["d"]); ?>, e: <?php echo ($dataScore["e"]); ?>},<?php endforeach; endif; else: echo "" ;endif; ?>],
    element: 'morris-bar-chart2', xkey: 'y', ykeys: ['a', 'b', 'c', 'd', 'e'], labels: ['1分', '2分', '3分', '4分', '5分'], hideHover: 'auto', parseTime:false, resize: true
});
$('.btn_time').click(function(){
    $('.btn-primary').attr('class', 'btn btn-default btn_time');
    $(this).addClass('btn-primary');
    $('input').val('');
    getData();
});
$('.btn-info').click(function(){
    $('.btn_time').attr('class', 'btn btn-default btn_time');
    getData();
});
$('select').change(function(){
    getData();
});
//获取数据
var getData = function(){
    var start_time = $('input[name="start_time"]').val(), end_time = $('input[name="end_time"]').val(), day = $('.btn-primary').data('num'), aid = $('select').val();
    waiting();
    $.get('', {start_time: start_time, end_time: end_time, day: day, aid: aid}, function(data){
        complete(); bar1.setData(data.dataNum); bar2.setData(data.dataScore);
    });
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