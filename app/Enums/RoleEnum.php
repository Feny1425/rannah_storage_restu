<?php

namespace App\Enums;

enum RoleEnum: string
{
    case SUPER_ADMIN = 'Super Admin';
    case SYSTEM = 'System';
    case OWNER = 'Owner';
    case RECEIVER = 'Receiver';
    case DISPATCHER = 'Dispatcher';
    case CASHIER = 'Cashier';
}