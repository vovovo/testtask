<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\HasLifecycleCallbacks]
class Tax extends BaseEntity
{
    public function __construct(
        #[ORM\Column(type: 'string')]
        private string $code,
        #[ORM\Column(type: 'float')]
        private float $taxValue
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

    public function getTaxValue(): float
    {
        return $this->taxValue;
    }

    public function setTaxValue(float $taxValue): self
    {
        $this->taxValue = $taxValue;
        return $this;
    }
}
