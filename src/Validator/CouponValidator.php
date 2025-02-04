<?php

declare(strict_types=1);

namespace App\Validator;

use App\Repository\CouponRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

final class CouponValidator extends ConstraintValidator
{
    public function __construct(
        private readonly CouponRepository $couponRepository)
    {
    }

    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof Coupon) {
            throw new UnexpectedTypeException($constraint, Coupon::class);
        }

        if(null === $value || '' === $value) {
            return;
        }

        if(null === $this->couponRepository->findOneBy(['code' => $value])) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}