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


namespace exception;

use traits\Send;

/**
 * 异常提示
 */
class Exception
{
    use Send;

    /**
     * 路由不存在情况
     */
    public static function miss()
    {
        self::error('route not found', 404);
    }
}