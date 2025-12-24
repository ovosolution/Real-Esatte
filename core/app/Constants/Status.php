<?php

namespace App\Constants;

use Dompdf\Positioner\Fixed;
use PHPUnit\Framework\TestStatus\Incomplete;

class Status
{

    const ENABLE  = 1;
    const DISABLE = 0;

    const YES = 1;
    const NO  = 0;

    const VERIFIED   = 1;
    const UNVERIFIED = 0;

    const REJECTED = 2;

    const COMPLETE   = 1;
    const INCOMPLETE = 0;

    const SUPER_ADMIN_ROLE_ID   = 1;
    const MODERATOR_ROLE_ID     = 2;
    const SUPPORT_AGENT_ROLE_ID = 3;

    const SUPPER_ADMIN_ID = 1;

    const PAYMENT_INITIATE = 0;
    const PAYMENT_SUCCESS  = 1;
    const PAYMENT_PENDING  = 2;
    const PAYMENT_REJECT   = 3;

    const TICKET_OPEN   = 0;
    const TICKET_ANSWER = 1;
    const TICKET_REPLY  = 2;
    const TICKET_CLOSE  = 3;

    const PRIORITY_LOW    = 1;
    const PRIORITY_MEDIUM = 2;
    const PRIORITY_HIGH   = 3;

    const USER_ACTIVE = 1;
    const USER_BAN    = 0;

    const KYC_UNVERIFIED = 0;
    const KYC_PENDING    = 2;
    const KYC_VERIFIED   = 1;

    const GOOGLE_PAY = 5001;

    const CUR_BOTH = 1;
    const CUR_TEXT = 2;
    const CUR_SYM  = 3;

    const AVAILABLE = 1;
    const UNDERCONSTRUCTION = 2;

    const SALE = 1;
    const RENT = 2;

    const FIXED = 1;
    const NEGOTIABLE = 2;

}
