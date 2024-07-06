<?php

namespace Modules\Members\Enums;

/**
 * Enum for the different types of club status.
 * 
 * @package Modules\Members\Enums
 * @author KelvinCodes
 * @return int
 */
enum Instructor: int
{
    case IS_NOT_INSTRUCTOR = 0;
    case IS_INSTRUCTOR = 1;
}
