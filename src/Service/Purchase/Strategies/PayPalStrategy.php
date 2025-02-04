<?php

namespace App\Service\Purchase\Strategies;

use App\Enum\PaymentProcessorEnum;
use Exception;
use Systemeio\TestForCandidates\PaymentProcessor\PaypalPaymentProcessor;

class PayPalStrategy implements PaymentStrategyInterface
{
    private const PAYMENT_TYPE = PaymentProcessorEnum::PAYPAL->value;

    public function __construct(private readonly PaypalPaymentProcessor $processor)
    {
    }

    public function canProcess(PaymentProcessorEnum $processorEnum): bool
    {
        return $processorEnum->value === self::PAYMENT_TYPE;
    }

    public function paymentProcess(float $price): bool
    {
        try {
            $this->processor->pay($price);
        } catch (Exception) {
            return false;
        }

        return true;
    }
}