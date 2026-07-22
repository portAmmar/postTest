<?php

namespace App\Modules\POS\Enums;

enum OrderStatus: string
{
    case PAID = 'paid';
    case CANCELLED = 'cancelled';
}