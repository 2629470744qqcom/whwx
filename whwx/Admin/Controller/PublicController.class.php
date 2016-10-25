<?php
namespace Admin\Controller;
use Common\Controller\BaseController;

/**
 * 管理平台登录
 * zhangxinhe Dec 25, 2015
 * 版权所有：安徽鼎龙网络传媒有限公司
 */
class PublicController extends BaseController{
	public function _initialize(){
		parent::_initialize();
	}
	/**
	 * 登录页面
	 * zhangxinhe 2015-12-25
	 */
	public function index(){

//echo "string";die;

		if(IS_POST){//判断是否是POST方式提交
			$name = I('post.username', '');//如果post.username不存在，则返回空。I语法：I（'变量类型.变量名','[默认值]','[过滤方法]','[额外数据源]'）
			$pwd = I('post.password', '');
			$ip = get_client_ip();//获取客户端IP
			$info = M('admins')->field('id,gid,pwd,tel')->where('status=1 and name="' . $name . '"')->find();//M方法不需要具体实例化模型；连贯操作；find()查询一行数据
//dump($info);
			if($info['pwd'] === md5($name . '_WhwX_' . $pwd)){
				session('aid', $info['id']);//内置session函数，进行初始化，赋值，取值，删除，管理，判断？
				session('aname', $name);//$name=$_SESSION['aname'];
				session('ainfo', array('name' => $name, 'tel' => $info['tel']));
				$ruleInfo = M('group')->field('rules,aids')->where(array('id' => $info['gid']))->find();
				$ruleInfo && session('ruleInfo', $ruleInfo);
				M('admins')->where('id=' . $info['id'])->save(array('last_login_time' => time(), 'last_login_ip' => $ip));
				M('admin_login_log')->add(array('name' => $name, 'times' => time(), 'ip' => $ip));
				$this->returnResult(true, array('登录成功', ''), U('Index/index'));
			}else{
				M('admin_login_log')->add(array('name' => $name, 'times' => time(), 'ip' => $ip, 'status' => 0, 'pwd' => $pwd));
				$this->returnResult(false, array('', '账号或密码错误'));
			}
		}else{
			if(session('aid') > 0){
				$this->redirect('Admin/Index/index');
			}
			$this->display();
		}
	}
	/**
	 * 退出登录
	 * zhangxinhe 2015-5-5
	 */
	public function logout(){
		session('[destroy]');//清空session
		$this->redirect('Admin/Public/index');//重定向
	}
	/**
	 * 修改密码
	 * zhangxinhe 2015-5-5
	 */
	public function editPwd(){
		if(IS_POST){
			$pwd = M('admins')->where('id=' . session('aid'))->getField('pwd');//getField获取字段的值
			if(md5(session('aname') . '_WhwX_' . I('post.old_pwd')) === $pwd){
				$data['id'] = session('aid');//data方法生成要操作的数据对象
				$data['pwd'] = md5(session('aname') . '_WhwX_' . I('post.new_pwd'));
				$result = $this->updateData($data, 'admins', 2);
				$this->returnResult($result, null, U('Index/index'));
			}
			$this->returnResult(false, array('', '原始密码错误'));
		}else{
			$this->assign('menuList', session('left_menu'));//控制器中变量传递给模板，相当于给模板赋值，等价于$this->menuList=session('left_menu')
			$this->display();//调用模板
		}
	}
}