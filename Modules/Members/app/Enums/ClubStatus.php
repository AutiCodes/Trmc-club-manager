<?php

namespace Modules\Members\Enums;

enum ClubStatus: int
{
    case ASPIRANT_MEMBER = 1;
    case MEMBER = 2;
    case MANAGEMENT = 3;
}
