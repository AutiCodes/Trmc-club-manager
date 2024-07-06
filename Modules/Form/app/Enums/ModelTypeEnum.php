<?php

namespace Modules\Form\Enums;

/**
 * Enum for the different types of models that can be submitted.
 * 
 * @package Modules\Form\Enums
 * @author KelvinCodes
 * @return int 
 */
enum ModelTypeEnum: int
{
    case PLANE = 1;
    case GLIDER = 2;
    case HELICOPTER = 3;
    case DRONE = 4;
}
