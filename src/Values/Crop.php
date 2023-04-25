<?php

declare(strict_types=1);

/**
 * @author Steven Berg <steven@stevenberg.net>
 * @copyright 2017 Steven Berg
 * @license MIT
 */

namespace StevenBerg\ResponsibleImages\Values;

/**
 * Represents a Cloudinary crop type.
 */
enum Crop: string implements Value
{
    case Fill = 'fill';

    case Scale = 'scale';

    public function getValue(): string
    {
        return $this->value;
    }
}
