<?php
namespace app\manage\controller;

class index
{
    public function index()
    {
			return view('index');
    }
	
		#展示个人资料修改页面
	public function data()
	{
		
			return view('data');
	}

}
