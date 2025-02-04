<?php

namespace App\Service\Purchase;

use App\Enum\PaymentProcessorEnum;
use App\Service\CalculatePriceService;
use App\Service\Purchase\Strategies\PaymentStrategyInterface;
use Exception;
use Symfony\Component\Uid\Uuid;

class PurchaseService
{
    /**
     * @param iterable<PaymentStrategyInterface> $strategies
     */
    public function __construct(
         private readonly iterable $strategies = [],
         private CalculatePriceService $calculatePriceService
     ) {
     }

    public function purchase(PaymentProcessorEnum $processorEnum, Uuid $productId, string $taxCode, ?string $couponCode = null): bool
    {
        $price = $this->calculatePriceService->calculate($productId, $taxCode, $couponCode);

        return $this->processPayment($processorEnum, $price);
    }

    private function processPayment(PaymentProcessorEnum $processorEnum, float $price): bool
    {
        foreach ($this->strategies as $strategy) {
            if($strategy->canProcess($processorEnum)) {
               return $strategy->paymentProcess($price);
            }
        }

        throw new Exception('Payment strategy not implemented');
    }
}