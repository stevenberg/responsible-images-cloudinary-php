<?php

declare(strict_types=1);

/**
 * @author Steven Berg <steven@stevenberg.net>
 * @copyright 2017 Steven Berg
 * @license GNU General Public License, version 3
 */

namespace StevenBerg\ResponsibleImages\Values;

use StevenBerg\WholesomeValues\Base;

/**
 * Represents a Cloudinary crop type.
 */
class Crop extends Base
{
    const VALUES = ['fill', 'scale'];

    protected static function validate($value): bool
    {
        return is_string($value) && in_array($value, self::VALUES);
    }

    protected static function invalidReason(): string
    {
        return 'must be one of ' . implode(', ', self::VALUES);
    }
}
