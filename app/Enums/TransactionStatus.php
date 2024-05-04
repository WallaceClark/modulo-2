<?php

namespace App\Enums;

enum TransactionStatus: int
{
    case CANCELLED = 0;
    case PAID = 1;
    case PENDING = 2;
    case FAILED = 3;
}