<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class ProductFixtures extends Fixture
{
    private const array DATA = [
        ['id'=> '0194ce07-5f72-70ca-b332-b8fe5ac91ca3', 'name' => 'IPhone', 'price' => 100,],
        ['id'=> '0194ce07-5f73-7da0-a145-138e54a1b9fc', 'name' => 'Headphones', 'price' => 50,],
        ['id'=> '0194ce07-5f73-7da0-a145-138e5522c09b', 'name' => 'Cover case', 'price' => 20,],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::DATA as $item) {
            $product = (new Product(
                $item['id'],
                $item['name'],
                $item['price'],
            ));

            $manager->persist($product);
        }

        $manager->flush();
    }
}
