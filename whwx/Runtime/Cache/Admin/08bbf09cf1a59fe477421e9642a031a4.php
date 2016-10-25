<?php if (!defined('THINK_PATH')) exit();?>
<style> img{width:200px;margin-right:10px;}</style>
<div class="modal-header">
    <button data-dismiss="modal" class="close" type="button">×</button>
    <h4 class="modal-title">查看信息</h4>
</div>
<div class="modal-body" id="html">
<div>
    <b>订单号：</b><?php echo (sprintf('%08s',$info["id"])); ?>&nbsp;&nbsp;&nbsp;
    <b>下单时间：</b><?php echo (date('Y-m-d H:i:s', $info["single_time"])); ?>&nbsp;&nbsp;&nbsp;
    <b>订单状态：</b> 
    <?php switch($info["status"]): case "0": ?>未支付<?php break;?>
        <?php case "1": ?>已取消<?php break;?>
        <?php case "2": ?>已支付<?php break;?>
        <?php case "3": ?>已发货<?php break;?>
        <?php case "4": ?>已收货<?php break;?>
        <?php case "5": ?>已完成<?php break;?>
        <?php case "6": ?>已删除<?php break; endswitch;?>
</div>
<hr>
<div>
    <b>业主姓名：</b><?php echo ($info["name"]); ?>&nbsp;&nbsp;&nbsp;
    <b>手机号：</b><?php echo ($info["phone"]); ?>&nbsp;&nbsp;&nbsp;
    <b>地址：</b><?php echo ($info["addr"]); ?><span>（请已物流地址为准）</span>
</div>
<hr>
<div>
    <b>产品名称：</b><?php echo ($info["title"]); ?>&nbsp;&nbsp;&nbsp;
    <b>单价：</b></b><?php echo ($info["prix"]); ?>&nbsp;&nbsp;&nbsp;
    <b>总价：</b><?php echo ($info["order_amount"]); ?>&nbsp;&nbsp;&nbsp;
    <b>数量：</b><?php echo ($info["total"]); ?>
</div>
<hr>
<div>
    <b>支付方式：</b>
    <?php switch($info["pay_type"]): case "0": ?>未支付<?php break;?>
        <?php case "1": ?>微信付款<?php break;?>
        <?php case "2": ?>货到付款<?php break;?>
        <?php case "3": ?>积分付款<?php break; endswitch;?>&nbsp;&nbsp;&nbsp;
    <b>支付时间：</b><?php echo (date('Y-m-d H:i:s', $info["pay_time"])); ?> &nbsp;&nbsp;&nbsp;
    <?php if(($info["pay_type"]) == "3"): ?><b>支付积分：</b><?php else: ?><b>支付金额：</b><?php endif; echo ($info["pay_amount"]); ?>          
</div>
<hr>
    <?php if(($info["status"]) >= "3"): ?><div>
            <b>支付单号：</b><?php if(($info["pay_type"] == 3) or($info["pay_type"] == 0)): ?>无<?php else: echo ((isset($info["pay_order"]) && ($info["pay_order"] !== ""))?($info["pay_order"]):'无'); endif; ?>&nbsp;&nbsp;&nbsp;<b>物流公司：</b><?php echo ($info["ems"]["ems_name"]); ?><b>&nbsp;&nbsp;&nbsp;物流单号：</b><?php echo ($info["ems"]["ems_num"]); ?>&nbsp;&nbsp;&nbsp;
            <b>物流地址：</b><?php echo ($info["ems"]["address"]); ?>
            <hr>
        </div><?php endif; ?>
    <?php if(($info["status"]) >= "5"): ?><div>
            <b>业主评分：</b><?php echo ($info["comment"]["score"]); ?>分&nbsp;&nbsp;&nbsp;<b>评价时间：</b><?php echo (date('Y-m-d H:i:s', $info["comment"]["times"])); ?>
            <br><b>评论内容：</b><?php echo ($info["comment"]["desc"]); ?><br><hr>
        </div><?php endif; ?>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div>
            <b>发送人：<?php echo ($list["oname"]); ?>&nbsp;&nbsp;&nbsp;联系方式：<?php echo ($list["otel"]); ?>&nbsp;&nbsp;&nbsp;时间：<?php echo (date('Y-m-d H:i:s', $list["times"])); ?></b>
            <br><?php echo ($list["content"]); ?><br>
            <hr>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
    <?php if(($info["status"]) < "5"): if(($info["status"]) != "1"): ?><div><textarea rows="3" class="form-control" id="content" data-pid='<?php echo ($info["pid"]); ?>' placeholder="请输入备注信息，仅管理员可见"></textarea></div><?php endif; endif; ?>
    <input name='id' value='<?php echo ($info["id"]); ?>' type='hidden' id='id' />
</div>
<div class="modal-footer">
    <button data-dismiss="modal" class=" btn btn-default" type="button">关闭</button>
    <?php if(($info["status"]) < "5"): if(($info["status"]) != "1"): ?><button class="btn btn-primary submit save" type="button">提交</button><?php endif; endif; ?>
</div>
<script>
    $(function(){
      $(".save").click(function(){
            var obj=$('textarea');
            var content =obj.val();
            var id=$("input[name='id']").val();
            $.post('<?php echo U("GroupOrders/detail");?>',{content:content,id:id},function(data){
                   showInfo(data.info);
                    $('#myModallook').modal('hide');
            });
      });
    }); 
</script>