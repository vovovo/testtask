<?php

namespace App\Enum;

enum PaymentProcessorEnum: string
{
    case PAYPAL = 'payPal';
    case STRIPE = 'stripe';
    case CUSTOM = 'custom';
}
