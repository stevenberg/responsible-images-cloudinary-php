<?php

declare(strict_types=1);

/**
 * @author Steven Berg <steven@stevenberg.net>
 * @copyright 2017 Steven Berg
 * @license MIT
 */

namespace StevenBerg\ResponsibleImages\Values;

use MyCLabs\Enum\Enum;

/**
 * Represents a Cloudinary crop type.
 */
class Crop extends Enum
{
    private const Fill = 'fill';
    private const Scale = 'scale';
}
