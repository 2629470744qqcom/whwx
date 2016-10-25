<?php if (!defined('THINK_PATH')) exit();?>
<div class="modal-header">
    <button data-dismiss="modal" class="close" type="button">×</button>
    <h4 class="modal-title">查看信息</h4>
</div>
<div class="modal-body" id="html">
    <div>
        <b>业主姓名：</b><?php echo ($info["owner"]); ?>&nbsp;&nbsp;&nbsp;
        <b>联系方式：</b><?php echo ($info["tel"]); ?>&nbsp;&nbsp;&nbsp;
        <b>发布时间：</b><?php echo (date('Y-m-d H:i:s', $info["times"])); ?>
        <br>
        <?php if(($info["style"] == 1) or ($info["style"] == 2) or ($info["style"] == 5)): ?><b>房屋户型：
                <?php echo ($info["room"]); ?>室&nbsp;&nbsp;&nbsp;
                <?php echo ($info["hall"]); ?>厅&nbsp;&nbsp;&nbsp;
                <?php echo ($info["toilet"]); ?>卫&nbsp;&nbsp;&nbsp;
            </b>
            <b>第<?php echo ($info["floor_several"]); ?>层</b>&nbsp;&nbsp;&nbsp;
            <b>共<?php echo ($info["floor_all"]); ?>层 </b>&nbsp;&nbsp;&nbsp;
            <b>面积：</b><?php echo ($info["size"]); ?>(M<sup>2</sup>)&nbsp;&nbsp;&nbsp;
            <b>房号：<?php echo ($info["house"]); ?>室</b><?php endif; ?>
        <br>
        <b>类型：</b>
        <?php switch($info["style"]): case "1": ?>出租房屋<?php break;?>
            <?php case "2": ?>出售房屋<?php break;?> 
            <?php case "3": ?>出租车位<?php break;?> 
            <?php case "4": ?>出售车位<?php break;?>  
            <?php case "5": ?>出租单间<?php break; endswitch;?> 
        <br>
        <br><b>标题：</b><?php echo ($info["title"]); ?><br>
        <br><b>小区：</b><?php echo ($info["area"]); ?><br>
        <br><b>价格：</b><?php echo ($info["price"]); ?>元<br>
        <br><b>详细地址：</b><?php echo ($info["address"]); ?><br>
        <br><b>描述：</b><?php echo ($info["content"]); ?><br>
        <?php if(!empty($info["pics"])): if(is_array($info["pics"])): $i = 0; $__LIST__ = $info["pics"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pic): $mod = ($i % 2 );++$i;?><a href="<?php echo ($pic); ?>" target="_blank"><img src='<?php echo ($pic); ?>?imageView2/2/h/160'/></a><?php endforeach; endif; else: echo "" ;endif; endif; ?>
        <hr>
    </div>
</div>
<div class="modal-footer">
    <button data-dismiss="modal" class=" btn btn-default" type="button">关闭</button>
</div>