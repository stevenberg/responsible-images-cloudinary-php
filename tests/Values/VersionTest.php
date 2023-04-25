<?php

declare(strict_types=1);

/**
 * @author Steven Berg <steven@stevenberg.net>
 * @copyright 2018 Steven Berg
 * @license MIT
 */

namespace StevenBerg\ResponsibleImages\Tests\Values;

use PHPUnit\Framework\TestCase;
use StevenBerg\ResponsibleImages\Values\Version;

class VersionTest extends TestCase
{
    public function testEmptyStringValue(): void
    {
        $this->expectException(\TypeError::class);

        $version = Version::from('');
    }

    public function testInvalidStringValues(): void
    {
        $values = [
            'a',
            '!',
            'a1',
            '2a',
            '3 4',
            '5,678',
        ];

        foreach ($values as $value) {
            $this->expectException(\TypeError::class);

            $version = Version::from($value);
        }
    }

    public function testValidStringValues(): void
    {
        $values = [
            '1',
            '123',
            '843',
            '39584339384843',
        ];

        foreach ($values as $value) {
            $version = Version::from($value);

            $this->assertEquals($value, (string) $version);
        }
    }
}
