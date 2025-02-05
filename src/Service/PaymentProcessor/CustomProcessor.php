<?php

namespace App\Service\PaymentProcessor;

class CustomProcessor
{
    /**
     * @param float $price payment amount in currency
     * @return bool true if payment was succeeded, false otherwise
     */
    public function processPayment(float $price): bool
    {
        if ($price < 100) {
            return false;
        }

        //process payment logic
        return true;
    }
}
