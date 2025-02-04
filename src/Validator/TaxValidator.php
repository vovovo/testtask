<?php

declare(strict_types=1);

namespace App\Validator;

use App\Repository\TaxRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

final class TaxValidator extends ConstraintValidator
{
    public function __construct(
        private readonly TaxRepository $taxRepository)
    {
    }

    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof Tax) {
            throw new UnexpectedTypeException($constraint, Tax::class);
        }

        if(null === $value || '' === $value) {
            return;
        }

        if(null === $this->taxRepository->findOneBy(['code' => $value])) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}