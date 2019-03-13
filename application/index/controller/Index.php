<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
			return view('index',['title'=>'歪脖网']);
    }
	

}
