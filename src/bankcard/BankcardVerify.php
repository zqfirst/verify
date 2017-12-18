<?php

namespace Verify\bankcard;

/**
 * 只能验证个人卡 借记卡的准确性
 *
 * Class BankcardVerify
 * @package Verify\bankcard
 */
class BankcardVerify
{

    /**
     * 银行卡验证入口
     *
     * @param $num
     */
    public static function check($num)
    {
        if (!in_array(strlen($num), [16, 19])) {
            return false;
        } elseif (!self::verify($num)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * 银行卡生成规则验证
     *
     * @param $card
     * @return bool
     */
    private static function verify($card)
    {
        $card = strrev($card);
        for ($i = 0, $total = 0; $i < strlen($card); $i++) {
            if (($i + 1) % 2 == 0) {
                $ix = $card[$i] * 2;
                if ($ix >= 10) {
                    $nx = 1 + ($ix % 10);
                    $total += $nx;
                } else {
                    $total += $ix;
                }
            } else {
                $total += $card[$i];
            }
        }

        return $total % 10 == 0;
    }
}