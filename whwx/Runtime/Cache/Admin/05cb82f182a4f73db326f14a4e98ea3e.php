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
	        <div class="row"> <h3 class="page-header">消息管理</h3></div>
<div class="form-horizontal" style="display:none;">
    <div class="form-group">
        <div class="col-sm-12"><div  class="link_text"><a href="">有<span>0</span>条未读消息,点击查看</a></div></div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action='<?php echo U("Wxmsg/index");?>' class="form-inline text-right m-b-5 fr">
				  粉丝昵称：<input type="text" name='nickname' value='<?php echo ($_GET['nickname']); ?>' class="form-control mr20 w150"><!--$Think系统变量，等价于$_GET['nickname']-->
				  消息内容：<input type="text" name='content' value='<?php echo ($_GET['content']); ?>' class="form-control mr20 w150">
				  消息类型：<select name='type' class="form-control mr20 w150">
						<option value='-1'>全部</option>
						<option value='0' <?php if(($_GET['type']) == "0"): ?>selected<?php endif; ?> >普通消息</option><!--比较标签-->
						<option value='1' <?php if(($_GET['type']) == "1"): ?>selected<?php endif; ?> >关键字消息</option>
						<option value='2' <?php if(($_GET['type']) == "2"): ?>selected<?php endif; ?> >星标消息</option>
                    </select>
                    <button class="btn btn-primary" type="submit">搜索</button>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="60">序号</th>
                                <th>粉丝名称</th>
                                <th>业主姓名</th>
                                <th>业主手机</th>
                                <th>业主地址</th>
                                <th>接收时间</th>
                                <th>消息内容</th>
                                <th>回复状态</th>
                                <th width="150">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list1): $mod = ($i % 2 );++$i;?><tr>
									<td><?php echo ($i); ?></td>
                                    <td><?php echo ((isset($list1["nickname"]) && ($list1["nickname"] !== ""))?($list1["nickname"]):"粉丝"); ?></td>
                                    <td><?php echo ((isset($list1["ownerInfo"]["name"]) && ($list1["ownerInfo"]["name"] !== ""))?($list1["ownerInfo"]["name"]):"无"); ?></td>
                                    <td><?php echo ((isset($list1["ownerInfo"]["phone"]) && ($list1["ownerInfo"]["phone"] !== ""))?($list1["ownerInfo"]["phone"]):"无"); ?></td>
                                    <td><?php echo ((isset($list1["ownerInfo"]["aname"]) && ($list1["ownerInfo"]["aname"] !== ""))?($list1["ownerInfo"]["aname"]):"无"); ?> <?php echo ($list1["ownerInfo"]["addr"]); ?></td>
                                    <td><?php echo (date('Y-m-d H:i', $list1["times"])); ?></td>
                                    <td>
                                    	<?php switch($list1["type"]): case "3": ?><a href="<?php echo ($list1["content"]); ?>" target="_blank"><img src="<?php echo ($list1["content"]); ?>?imageView2/0/h/80/interlace/1/q/100" /></a><?php break;?>
                                    		<?php case "4": ?><a href="<?php echo ($list1["content"]); ?>" target="_blank">语音消息，点击下载</a><?php break;?>
                                    		<?php case "5": ?><a href="<?php echo ($list1["content"]); ?>" target="_blank">视频消息，点击下载</a><?php break;?>
                                    		<?php case "6": ?><a href="<?php echo ($list1["content"]); ?>" target="_blank">小视频消息，点击下载</a><?php break;?>
                                    		<?php default: echo ($list1["content"]); endswitch;?>
									</td>
                                    <td id="replayStatus<?php echo ($list1["id"]); ?>"><?php if(($list1["status"]) == "1"): ?>已回复<?php else: ?><b>未回复</b><?php endif; ?></td>
									<td>
										<button class="btn-sm btn btn-default replayMsg" data-fid="<?php echo ($list1["fid"]); ?>" data-id="<?php echo ($list1["id"]); ?>">查看/回复</button>
                                        <button data-star="<?php echo ($list1["star"]); ?>" data-url='<?php echo U("Wxmsg/setStar?id=".$list1["id"]);?>' class="btn-sm btn <?php if(($list1["star"]) == "1"): ?>btn-primary<?php else: ?>btn-default<?php endif; ?> setStar" type="button">星标</button>
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
                <h4 class="modal-title" style="font-size:20px"><?php echo ((isset($list["nickname"]) && ($list["nickname"] !== ""))?($list["nickname"]):"粉丝"); ?></h4>
            </div>
            <div class="modal-body" style="padding-top: 0px;">加载中 。。。</div>
            <div class="modal-footer">
                <button data-dismiss="modal" class=" btn btn-default" type="button">关闭</button>
                <button class="btn btn-primary submitReplay" type="button">回复</button>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="fid" value="0">
<input type="hidden" id="id" value="0">
<input type="hidden" id="max_id" value="<?php echo ($list[0]['id']); ?>">
<script type="text/javascript">
//查看评论详情及回复
$('.replayMsg').click(function(){
    var id = $(this).data('id'), fid = $(this).data('fid');
    $('#id').val(id); $('#fid').val(fid); waiting();
    $.get('<?php echo U("Wxmsg/showMsgInfo");?>', {fid: fid}, function(data){
    	complete();
    	if(data.status == 0){
    		showInfo(data.info);
    	}else{
			$('#myModal').modal('show');
	    	var html = '', content = '';
	    	$(data).each(function(i, v){
	            if(v.type!=2){
	                $(".modal-title").html(v.nickname);
	                switch(v.type){
	                	case '3': content = '<a href="' + v.content + '" target="_blank"><img src="' + v.content + '?imageView2/0/h/80/interlace/1/q/100"/></a>'; break;
	                	case '4': content = '<a href="' + v.content + '" target="_blank">音频文件，点击下载</a>'; break;
	                	case '5': content = '<a href="' + v.content + '" target="_blank">视频文件，点击下载</a>'; break;
	                	case '6': content = '<a href="' + v.content + '" target="_blank">小视频文件，点击下载</a>'; break;
	                	default: content = v.content;
	                }
	        		html += '<div style="font-size:16px;margin-top: 10px;">' + content + '<p style="font-size:12px;color:#999;padding-top:2px;">' + v.times + '</p><hr style="margin-bottom:0;margin-top: 0;"></div>';
	            }else{
	                html += '<div style="text-align:right; font-size:16px;margin-top: 10px;">' + v.content + '<p style="font-size:12px;color:#999;padding-top:2px;">' + v.times + '</p><hr style="margin-bottom:0;margin-top: 0;"></div>';
	            }
	        });
	        html += '<div><textarea rows="3" class="form-control" placeholder="请输入回复内容"></textarea></div>';
	        $('.modal-body').html(html);
    	}
    });
});
//提交回复信息
$('.submitReplay').click(function(){
	var id = $('#id').val(), fid = $('#fid').val(); waiting();
    $.post('<?php echo U("Wxmsg/showMsgInfo");?>', {mid: id, fid: fid, content: $('textarea').val()}, function(data){
        complete(); showInfo(data.info);
        if (data.status == 1) {
        	$('#replayStatus' + id).html('已回复');
            $('#myModal').modal('hide');
        };
    });
});
//设置星标消息
$('.setStar').click(function(){
	var obj = $(this), star = obj.data('star'); waiting();
	$.get(obj.data('url'), {star: star}, function(data){
		complete(); showInfo(data.info);
		if(data.status == 1){
            if(star == 1){
                obj.data('star', 0).removeClass('btn-primary').addClass('btn-default');
            }else{
			    obj.data('star', 1).removeClass('btn-default').addClass('btn-primary');
            }
		}
	});
});

setInterval(function(){
    $.get(window.location.href, {id: $('#max_id').val()}, function(data){
        data > 0 && $('.form-horizontal').show().find('span').html(data);
    });
}, 10000);
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