<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity]
#[ORM\HasLifecycleCallbacks]
class Product extends BaseEntity
{
    public function __construct(
        #[ORM\Column(type: 'uuid')]
        ?Uuid $id = null,
        #[ORM\Column(type: 'string')]
        private string $name,
        #[ORM\Column(type: 'float')]
        private float $price,
    )
    {
        parent::__construct($id);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}
