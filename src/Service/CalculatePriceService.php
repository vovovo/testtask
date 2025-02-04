<?php

namespace App\Service;

use App\Repository\CouponRepository;
use App\Repository\ProductRepository;
use App\Repository\TaxRepository;
use Symfony\Component\Uid\Uuid;
use function bcsub;

class CalculatePriceService
{
    /*
     * todo: тут для подсчетов я бы заюзал библиотеку BCMath, но в данной сборке нет данного модуля, не стал заморачиваться с установкой
     * */
    public function __construct(
        private readonly ProductRepository $productRepository,
        private readonly TaxRepository $taxRepository,
        private readonly CouponRepository $couponRepository,
    ) {
    }

    public function calculate(Uuid $productId, string $taxCode, ?string $couponCode = null): float
    {
        $product = $this->productRepository->find($productId);
        $tax = $this->taxRepository->findOneBy(['code' => $taxCode]);
        $coupon = null !== $couponCode ? $this->couponRepository->findOneBy(['code' => $couponCode]) : null;

        $priceWithDiscount = $this->calculatePriceWithDiscount($product->getPrice(), $coupon?->getDiscountPercentage());

        return $priceWithDiscount + $priceWithDiscount * ($tax->getTaxValue() / 100);
    }

    private function calculatePriceWithDiscount(float $price, ?float $discount): float
    {
        if (null === $discount) {
            return $price;
        }

        return $price - ($price * ($discount / 100));
    }
}