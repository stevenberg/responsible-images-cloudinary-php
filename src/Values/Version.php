<?php

declare(strict_types=1);

/**
 * @author Steven Berg <steven@stevenberg.net>
 * @copyright 2018 Steven Berg
 * @license MIT
 */

namespace StevenBerg\ResponsibleImages\Values;

/**
 * Represents an image version.
 */
class Version
{
    public function __construct(private string $value)
    {
        if (!is_numeric($value)) {
            throw new \TypeError('Argument 1 passed to StevenBerg\ResponsibleImages\Values\Version::__construct must be numeric');
        }
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
