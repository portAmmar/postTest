<?php

namespace App\Modules\POS\Enums;

enum PaymentMethod: string
{
    case CASH = 'cash';
    case CARD = 'card';
}