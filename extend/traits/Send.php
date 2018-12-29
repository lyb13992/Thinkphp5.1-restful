<?php

namespace traits;

use think\facade\Log;

trait Send
{

    /**
     * 签权返回
     *
     * @param int    $code
     * @param string $message
     * @param array  $data
     * @param array  $header
     *
     * @return string
     */
    public static function returnMsg($code = 200, $message = '', $data = [], $header = [])
    {
        $return['code']    = (int)$code;
        $return['message'] = $message;
        $return['data']    = is_array($data) ? $data : ['info' => $data];

        return json_encode($return, JSON_UNESCAPED_UNICODE);
    }
    /**
     * 成功返回
     *
     * @param array  $data
     * @param int    $code
     * @param string $message
     *
     * @return void
     */
    public static function success($data = [], $code = 200, $message = 'success')
    {
        $return['code']    = (int)$code;
        $return['message'] = (string)$message;
        if (!empty($data)) {
            if (is_object($data)) {
                $data = method_exists($data, 'toArray') ? $data->toArray() : $data;
            }
            $return['data']  = is_string($data) ? ['info' => $data] : $data;
            $return ['data'] = self::arrValueToStr($return['data']);
        }

        json($return, 200)->send();

        die;
    }
    /**
     * 数组转字符串
     *
     * @param array  $array
     * @return string
     */
    public static function arrValueToStr($array)
    {
        if (is_array($array)) {
            foreach ($array as $k => $v) {
                $array[$k] = self::arrValueToStr($array[$k]);
            }
        } else {
            if (is_null($array)) {
                return 'null';
            }
            if (is_int($array) || is_null($array) || is_float($array) || is_bool($array)) {
                return (string)$array;
            }
        }
        return $array;
    }
    /**
     * 失败返回
     *
     * @param array  $data
     * @param int    $code
     * @param string $message
     *
     * @return void
     */
    public static function error($message = 'error', $code = 300, $data = [])
    {
        $return['code']    = (int)$code;
        $return['message'] = (string)$message;
        if (!empty($data)) {
            if (is_object($data)) {
                $data = method_exists($data, 'toArray') ? $data->toArray() : $data;
            }
            $return['data'] = is_string($data) ? ['info' => $data] : $data;
        }
        Log::error(var_export($return, true));

        json($return)->send();
        die;
    }

    /**
     * 一维数据数组生成数据树
     * @param array $list 数据列表
     * @param string $id 父ID Key
     * @param string $pid ID Key
     * @param string $son 定义子数据Key
     * @return array
     */
    public static function arr2tree($list, $id = 'id', $pid = 'pid', $son = 'sub')
    {
        list($tree, $map) = [[], []];
        foreach ($list as $item) {
            $map[$item[$id]] = $item;
        }
        foreach ($list as $item) {
            if (isset($item[$pid]) && isset($map[$item[$pid]])) {
                $map[$item[$pid]][$son][] = &$map[$item[$id]];
            } else {
                $tree[] = &$map[$item[$id]];
            }
        }
        unset($map);
        return $tree;
    }

    /**
     * 获取数据树子ID
     * @param array $list 数据列表
     * @param int $id 起始ID
     * @param string $key 子Key
     * @param string $pkey 父Key
     * @return array
     */
    public static function getArrSubIds($list, $id = 0, $key = 'id', $pkey = 'pid')
    {
        $ids = [intval($id)];
        foreach ($list as $vo) {
            if (intval($vo[$pkey]) > 0 && intval($vo[$pkey]) === intval($id)) {
                $ids = array_merge($ids, self::getArrSubIds($list, intval($vo[$key]), $key, $pkey));
            }
        }
        return $ids;
    }

    /**
     * 根据数组key查询(可带点规则)
     * @param array $data 数据
     * @param string $rule 规则，如: order.order_no
     * @return mixed
     */
    private static function parseKeyDot(array $data, $rule)
    {
        list($temp, $attr) = [$data, explode('.', trim($rule, '.'))];
        while ($key = array_shift($attr)) {
            $temp = isset($temp[$key]) ? $temp[$key] : $temp;
        }
        return (is_string($temp) || is_numeric($temp)) ? str_replace('"', '""', "\t{$temp}") : '';
    }
}

