<?php

namespace App\Enums;

enum SignatureStatus: int
{
    case CANCELLED = 0;
    case ACTIVATED = 1;
    case DISABLED = 2;
    case SUSPENDED = 3;
}