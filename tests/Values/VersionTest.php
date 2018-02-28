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
use StevenBerg\WholesomeValues\ExceptionalValue;

class VersionTest extends TestCase
{
    public function testNonStringValue()
    {
        $version = Version::from(1);

        $this->assertInstanceOf(ExceptionalValue::class, $version);
    }

    public function testEmptyStringValue()
    {
        $version = Version::from('');

        $this->assertInstanceOf(ExceptionalValue::class, $version);
    }

    public function testInvalidStringValues()
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
            $version = Version::from($value);

            $this->assertInstanceOf(ExceptionalValue::class, $version);
        }
    }

    public function testValidStringValues()
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

    public function testFromVersion()
    {
        $version = Version::from('123');

        $this->assertEquals($version, Version::from($version));
    }
}
