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


if (is_file($_SERVER["DOCUMENT_ROOT"] . $_SERVER["SCRIPT_NAME"])) {
    return false;
} else {
    require __DIR__ . "/index.php";
}