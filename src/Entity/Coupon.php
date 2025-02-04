<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\HasLifecycleCallbacks]
class Coupon extends BaseEntity
{
    public function __construct(
        #[ORM\Column(type: 'string')]
        private string $code,
        #[ORM\Column(type: 'float')]
        private float $discountPercentage,
    )
    {
        parent::__construct();
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getDiscountPercentage(): float
    {
        return $this->discountPercentage;
    }

    public function setDiscountPercentage(float $discountPercentage): self
    {
        $this->discountPercentage = $discountPercentage;
        return $this;
    }
}
