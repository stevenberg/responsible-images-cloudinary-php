<?php
declare(strict_types=1);
/**
 * @author Steven Berg <steven@stevenberg.net>
 * @copyright 2017 Steven Berg
 * @license GNU General Public License, version 3
 */

namespace StevenBerg\ResponsibleImages\Values;

/**
 * Represents a Cloudinary crop type.
 */
class Crop extends Base
{
    const VALUES = ['fill', 'scale'];

    /**
     * {@inheritDoc}
     *
     * A gravity value is valid if it's one of `auto`, `center`.
     */
    protected static function validate($value): bool
    {
        return is_string($value) && in_array($value, self::VALUES);
    }

    protected static function invalidReason(): string
    {
        return 'Crop value must be one of ' . implode(', ', self::VALUES);
    }
}
