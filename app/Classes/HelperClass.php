<?php

namespace App\Classes;

class HelperClass
{
    public static function getOrderTotalCosts($orderItems)
    {
        $totalCosts = 0;
        foreach ($orderItems as $order => $item) {
            $totalCosts += $item['qty'] * $item['price'];
        }
        return $totalCosts;
    }
}
