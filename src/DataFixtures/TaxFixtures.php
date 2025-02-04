<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Tax;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class TaxFixtures extends Fixture
{
    private const array DATA = [
        ['code' => 'DE123456789', 'taxValue' => 19],
        ['code' => 'IT123456789000', 'taxValue' => 22],
        ['code' => 'GR123456789', 'taxValue' => 24],
        ['code' => 'FRNC123456789', 'taxValue' => 20],

    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::DATA as $item) {
            $product = (new Tax(
                $item['code'],
                $item['taxValue']
            ));

            $manager->persist($product);
        }

        $manager->flush();
    }
}
