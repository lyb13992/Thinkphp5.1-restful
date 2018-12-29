<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use \think\facade\Route;
use traits\Send;
use think\facade\Config;

$version = Config::get('version.version');
//外网api接口
Route::group('api',function (){
    Route::get(':version','api/:version.Index/api');
});
//内网rpc接口
Route::group('rpc',function (){
    Route::get(':version','rpc/:version.Index/rpc');
});
//管理后台
Route::group('admin',function (){
    Route::get('','admin/Index/index');
});
//没有路由命中的话
Route::miss(function(){
    Send::error('route not found', 404);
});

