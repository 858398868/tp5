<?php
namespace app\manage\controller;
use think\Db;
use think\Controller;
use think\Session;
class register extends Controller
{
	#展示注册页面方法
	public function register()
	{
		
			return view('register');
	}
	#展示个人资料修改页面
	public function data()
	{
		
			return view('data');
	}
	
	#注册用户方法
	public function user_register()
	{		
			
			$email_result = Db::table('user')->where('email',input('post.email'))->find();
			if($email_result)
			{
				$this->error('用户已存在,注册失败');
				
				return;
			}else{
				$user = input('post.');
				$result = Db::table('user')->insert($user);
				if($result)
				{
					$this->success('注册成功');
				}else
				{
					$this->error('用户已存在,注册失败');
				}
			}	
				
	}
	
	#用户登录
	public function user_login()
	{
		
			$user = Db::table('user')->where('email',input('post.email'))->find();
			if(!$user)
			{
				$this->error('请检查用户名或密码是否正确');
			}
			if(input('post.password') == $user['password'])
			{
				Session::set('name',$user['username']);
				$this->success('登陆成功','index/index');
				
			}else
			{
				$this->error('请检查用户名或密码是否正确');
			}
		
	}
	


}
