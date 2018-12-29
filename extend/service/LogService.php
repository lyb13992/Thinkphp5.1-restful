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

namespace service;

use think\Db;
use think\db\Query;

/**
 * 操作日志服务
 * Class LogService
 * @package service
 * @author YaBin <mail@lvyabin.com>
 * @date 2018/12/24 13:25
 */
class LogService
{

    /**
     * 获取数据操作对象
     * @return Query
     */
    protected static function db()
    {
        return Db::name('Log');
    }

    /**
     * 写入操作日志
     * @param string $action
     * @param string $content
     * @return bool
     */
    public static function write($action = '行为', $content = "内容描述", $username = '', $detail = '')
    {
        $request = app('request');
        $node = strtolower(join('/', [$request->module(), $request->controller(), $request->action()]));
        $username = $username ? $username : session('user.username') . '';
        $data = [
            'ip'       => $request->ip(),
            'node'     => $node,
            'action'   => $action,
            'content'  => $content,
            'username' => $username,
            'detail'   => $detail,
        ];
        return self::db()->insert($data) !== false;
    }

}
