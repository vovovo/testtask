<?php

declare(strict_types=1);

namespace App\Request;

use App\Enum\PaymentProcessorEnum;
use Symfony\Component\Uid\Uuid;
use OpenApi\Attributes as OA;
use App\Validator as AppAssert;

final class PurchaseRequest
{
    public function __construct(
        #[OA\Property(description: 'Id of product')]
        public Uuid $product,
        #[OA\Property(description: 'Tax number')]
        #[AppAssert\Tax()]
        public string $taxNumber,
        #[OA\Property(description: 'Coupon code')]
        #[AppAssert\Coupon()]
        public ?string $couponCode = null,
        #[OA\Property(description: 'Payment system')]
        public PaymentProcessorEnum $paymentProcessor,
    ) {

    }
}