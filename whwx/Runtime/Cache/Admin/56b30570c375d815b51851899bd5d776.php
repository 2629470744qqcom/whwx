<?php if (!defined('THINK_PATH')) exit();?>
<style> img{width:200px;margin-right:10px;}</style>
<div class="modal-header">
    <button data-dismiss="modal" class="close" type="button">×</button>
    <h4 class="modal-title">查看信息</h4>
</div>
<div class="modal-body" id="html">
	<div>
		<b>业主姓名：</b><?php echo ($info["name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;
		<b>联系方式：</b><?php echo ($info["phone"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;
		<b>提交时间：</b><?php echo (date('Y-m-d H:i:s', $info["submit_time"])); ?>&nbsp;&nbsp;&nbsp;&nbsp;
		<b>预约类型：</b><?php echo ($info["tname"]); ?>
		<br>
		<b>预约内容：</b><?php echo ($info["desc"]); ?>
		<br>
		<hr>
	</div>
	<div>
		<b>供应商：</b><?php echo ($info["title"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;
		<b>联系方式：</b><?php echo ($info["tel"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;
		<b>地址: </b><?php echo ($info["address"]); ?>
		<hr>
	</div>
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div>
			<b>发送人：<?php echo ($list["oname"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;
			联系方式：<?php echo ($list["otel"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;
			时间：<?php echo (date('Y-m-d H:i:s', $list["times"])); ?></b>
			<br><?php echo ($list["content"]); ?><br>
		    <hr>
	    </div><?php endforeach; endif; else: echo "" ;endif; ?>
	<?php if(!empty($info["comment"])): ?><div>
			<b>评分：<?php echo ($info["comment"]["score"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;
			评价时间：<?php echo (date('Y-m-d H:i:s', $info["comment"]["times"])); ?></b>
			<br><b>评论内容：</b><?php echo ($info["comment"]["desc"]); ?><br><hr>
		</div><?php endif; ?>
	<?php if(($info["status"]) < "2"): ?><div><textarea rows="3" class="form-control" id="content" placeholder="请输入回复内容"></textarea></div><?php endif; ?>
	<input name='id' value='<?php echo ($info["id"]); ?>' type='hidden' id='id' />
</div>
<div class="modal-footer">
    <button data-dismiss="modal" class=" btn btn-default" type="button">关闭</button>
    <?php if(($info["status"]) < "2"): ?><button class="btn btn-primary save" type="button">提交</button><?php endif; ?>
</div>