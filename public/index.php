<?php
// +----------------------------------------------------------------------
// | ThinkPHP 5.1
// +----------------------------------------------------------------------
// | 版权所有 早安丿清晨
// +----------------------------------------------------------------------
// | 官方网站: http://localhost
// +----------------------------------------------------------------------
// | QQ:100839888
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
namespace think;

// 加载基础文件
require __DIR__ . '/../thinkphp/base.php';

// 支持事先使用静态方法设置Request对象和Config对象

// 执行应用并响应
Container::get('app')->run()->send();
