<?php

namespace Modules\Members\Enums;

enum ClubStatus: int
{
    case ASPIRANT_MEMBER = 1;
    case MEMBER = 2;
    case MANAGEMENT = 3;
    case REMOVED_MEMBER = 4;
    case DONOR = 5;
}
