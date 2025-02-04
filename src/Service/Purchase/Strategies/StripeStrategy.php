<?php

namespace App\Service\Purchase\Strategies;

use App\Enum\PaymentProcessorEnum;
use Systemeio\TestForCandidates\PaymentProcessor\StripePaymentProcessor;

class StripeStrategy implements PaymentStrategyInterface
{
    private const PAYMENT_TYPE = PaymentProcessorEnum::STRIPE->value;

    public function __construct(private readonly StripePaymentProcessor $processor)
    {
    }

    public function canProcess(PaymentProcessorEnum $processorEnum): bool
    {
        return $processorEnum->value === self::PAYMENT_TYPE;
    }

    public function paymentProcess(float $price): bool
    {
        $result = $this->processor->processPayment($price);
    }
}