<?php

namespace Modules\Members\Enums;

/**
 * Enum for the different types of club status.
 * 
 * @package Modules\Members\Enums
 * @author AutiCodes
 * @return int
 */
enum ClubStatus: int
{
    case ASPIRANT_MEMBER = 1;
    case MEMBER = 2;
    case MANAGEMENT = 3;
    case REMOVED_MEMBER = 4;
    case DONOR = 5;
    case JUNIOR_MEMBER = 6;
    case NOT_YET_MEMBER = 7;
    case NEW_REGISTRATION = 8;
}
