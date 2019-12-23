<?php

declare(strict_types=1);

namespace StevenBerg\ResponsibleImages\Tests\Urls;

use Ds\Map;
use PHPUnit\Framework\TestCase;
use StevenBerg\ResponsibleImages\Urls\Cloudinary;
use StevenBerg\ResponsibleImages\Values\Gravity;
use StevenBerg\ResponsibleImages\Values\Size;
use StevenBerg\ResponsibleImages\Values\Version;

class CloudinaryTest extends TestCase
{
    protected function setUp(): void
    {
        putenv('CLOUDINARY_URL=cloudinary://test_key:test_secret@test_name');
        $this->name = 'test.jpg';
        $this->maker = new Cloudinary();
    }

    public function testScale()
    {
        $this->assertEquals(
            'https://res.cloudinary.com/test_name/image/upload/c_scale,f_auto,fl_advanced_resize,q_auto:best,w_100/test.jpg',
            $this->maker->make(
                $this->name,
                new Map(['width' => Size::from(100)])
            )
        );
    }

    public function testFill()
    {
        $this->assertEquals(
            'https://res.cloudinary.com/test_name/image/upload/c_fill,f_auto,fl_advanced_resize,g_auto,h_100,q_auto:best,w_100/test.jpg',
            $this->maker->make(
                $this->name,
                new Map([
                    'width' => Size::from(100),
                    'height' => Size::from(100),
                    'gravity' => Gravity::Auto(),
                ])
            )
        );
    }

    public function testVersion()
    {
        $this->assertEquals(
            'https://res.cloudinary.com/test_name/image/upload/c_scale,f_auto,fl_advanced_resize,q_auto:best,w_100/v123/test.jpg',
            $this->maker->make(
                $this->name,
                new Map([
                    'width' => Size::from(100),
                    'version' => Version::from('123'),
                ])
            )
        );
    }
}
