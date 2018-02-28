<?php

declare(strict_types=1);

/**
 * @author Steven Berg <steven@stevenberg.net>
 * @copyright 2018 Steven Berg
 * @license MIT
 */

namespace StevenBerg\ResponsibleImages\Values;

use StevenBerg\WholesomeValues\Base;

/**
 * Represents an image name.
 */
class Version extends Base
{
    protected static function validate($value): bool
    {
        return is_string($value) && is_numeric($value);
    }

    protected static function invalidReason(): string
    {
        return 'must be a numeric string';
    }
}
