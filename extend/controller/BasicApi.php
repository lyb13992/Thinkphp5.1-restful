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

namespace controller;


use think\facade\Config;
use traits\Send;

class BasicApi
{
    use Send;
    /**
     * 当前请求对象
     * @var \think\Request
     */
    protected $request;

    /**
     * 构造方法
     * BasicApi constructor.
     */
    public function __construct()
    {
        $this->request = app('request');
        $this->port_white_list();
    }
    /**
     * 空方法
     */
    public function _empty()
    {
        return self::returnMsg(404, 'empty method!');
    }

    /**
     * 域名白名单
     *
     * @param $whiteList //白名单
     */
    public function port_white_list(){
        $whiteList = Config::get('port_white_list');
        if(!empty($whiteList)){
            if(!in_array($this->request->domain(),$whiteList)){
                self::error('路由重定向有误！', 401);
            }
        }
    }

}