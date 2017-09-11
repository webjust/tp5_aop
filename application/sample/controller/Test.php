<?php

namespace app\sample\controller;

use think\Request;

class Test
{
    public function index(){
        echo '你好世界';
    }

    public function hello(Request $request){
        //echo 'hello world';
        //$request = Request::instance();
        //dump($request);
        //echo $request->param('name');

        // param不传递参数，获取全部的请求参数
        //dump($request->param());
        //dump(request());
        dump($request);
    }

    public function test($id){
        echo $id;
    }
}