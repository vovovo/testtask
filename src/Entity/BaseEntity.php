<?php

declare(strict_types=1);

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

abstract class BaseEntity extends TimestampEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid')]
    protected Uuid $id;

    public function __construct(
        ?Uuid $id = null,
        ?DateTimeImmutable $createdAt = null,
    ) {
        $this->id = $id ?? Uuid::v7();
        parent::__construct($createdAt);
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function setId(Uuid $id): self
    {
        $this->id = $id;
        return $this;
    }
}
