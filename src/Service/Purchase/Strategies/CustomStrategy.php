<?php

namespace App\Service\Purchase\Strategies;

use App\Enum\PaymentProcessorEnum;
use App\Service\PaymentProcessor\CustomProcessor;

class CustomStrategy implements PaymentStrategyInterface
{
    private const PAYMENT_TYPE = PaymentProcessorEnum::CUSTOM->value;

    public function __construct(private readonly CustomProcessor $processor)
    {
    }

    public function canProcess(PaymentProcessorEnum $processorEnum): bool
    {
        return $processorEnum->value === self::PAYMENT_TYPE;
    }

    public function paymentProcess(float $price): bool
    {
        return $this->processor->processPayment($price);
    }
}