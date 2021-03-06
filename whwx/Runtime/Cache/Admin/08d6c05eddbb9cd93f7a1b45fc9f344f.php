<?php if (!defined('THINK_PATH')) exit();?><!--该页面不需要加载layout.html，不管布局开启是否-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge"><!--备注：保证网页在IE8版本正常使用-->
<meta name="viewport" content="width=device-width, initial-scale=1"><!--备注：兼容缩放网页-->
<link rel="stylesheet" href="<?php echo CSS;?>bootstrap.min.css"> <!--//<link rel="stylesheet" href="/Public/Admin/css/bootstrap.min.css">-->
<link rel="stylesheet" href="<?php echo CSS;?>admin.min.css"><!--备注：参照Common/Controller/BaseController.class.php-->
<link rel="stylesheet" href="<?php echo COM;?>css/common.min.css"/>
<title>登录</title>
</head>
<body>
	 <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default m-t-46">
                    <div class="panel-heading"><h4 class="text-center">用 户 登 录</h4></div>
                    <div class="panel-body">
                        <form id="myform" method='post'>
	                        <div class="form-group">
	                            <input class="form-control required" placeholder="请输入账号" name="username" type="text" autofocus="autofocus"><!--autofocus属性：打开网页时光标会自动聚焦到账号输入框中-->
	                        </div>
	                        <div class="form-group">
	                            <input class="form-control required" placeholder="请输入密码" name="password" type="password">
	                        </div>
	                        <button class="btn btn-lg btn-success btn-block">登录</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo JQ;?>"></script>
    <script src="<?php echo COM;?>js/common.min.js"></script>
</body>
</html>