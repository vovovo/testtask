<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Coupon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class CouponFixtures extends Fixture
{
    private const array DATA = [
        ['code' => 'P15', 'discountPercentage' => 15,],
        ['code' => 'P30', 'discountPercentage' => 30,],
        ['code' => 'P100', 'discountPercentage' => 100,],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::DATA as $item) {
            $product = (new Coupon(
                $item['code'],
                $item['discountPercentage']
            ));

            $manager->persist($product);
        }

        $manager->flush();
    }
}
