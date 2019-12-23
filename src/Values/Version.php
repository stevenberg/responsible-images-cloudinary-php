<?php

declare(strict_types=1);

/**
 * @author Steven Berg <steven@stevenberg.net>
 * @copyright 2018 Steven Berg
 * @license MIT
 */

namespace StevenBerg\ResponsibleImages\Values;

use TypeError;

/**
 * Represents an image version.
 */
class Version
{
    private $value;

    public function __construct(string $value)
    {
        if (!is_numeric($value)) {
            throw new TypeError('Argument 1 passed to StevenBerg\ResponsibleImages\Values\Version::__construct must be numeric');
        }

        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public static function from(string $value): self
    {
        return new self($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
