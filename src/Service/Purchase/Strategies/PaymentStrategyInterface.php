<?php

namespace App\Service\Purchase\Strategies;

use App\Enum\PaymentProcessorEnum;

interface PaymentStrategyInterface
{
    public function canProcess(PaymentProcessorEnum $processorEnum): bool;

    public function paymentProcess(float $price): bool;
}