<?php

namespace Verify\phone;

class PhoneVerify
{

    /**
     * 手机号验证入口
     *
     * @param $num
     * @return bool
     */
    public static function check($num)
    {
        if (!self::lengthCheck($num)) {
            return false;
        } elseif (!self::phoneCheck($num)){
            return false;
        }

        return true;
    }

    /**
     * 手机号长度验证
     *
     * @param $num
     * @return bool
     */
    private static function lengthCheck($num)
    {
        return in_array(strlen($num), [11]);
    }

    /**
     *
     *
     * @param $num
     * @return bool
     */
    private static function phoneCheck($num)
    {

        if(preg_match('/^[1]{1}(([35]{1}\d{1})||([4]{1}[7]{1})||([78]{1}[6789]{1}))\d{8}$/',$num)){
            return true;
        }

        return false;
    }
}