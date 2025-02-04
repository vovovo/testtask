<?php

declare(strict_types=1);

namespace App\Validator;

use Attribute;
use Symfony\Component\Validator\Constraint;

#[Attribute] final class Coupon extends Constraint
{
    public string $message = 'Incorrect coupon code.';

    /**
     * @param null|string $message
     * @param string[] $groups
     * @param mixed $payload
     */
    public function __construct(?string $message = null, ?array $groups = null, $payload = null)
    {
        parent::__construct([], $groups, $payload);

        $this->message = $message ?? $this->message;
    }
}