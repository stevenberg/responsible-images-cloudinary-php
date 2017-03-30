<?php
declare(strict_types=1);

namespace StevenBerg\ResponsibleImages\Tests\Urls;

use PHPUnit\Framework\TestCase;
use StevenBerg\ResponsibleImages\Urls\Cloudinary;
use StevenBerg\ResponsibleImages\Values\Name;
use StevenBerg\ResponsibleImages\Values\Size;

class CloudinaryTest extends TestCase
{
    protected function setUp()
    {
        putenv('CLOUDINARY_URL=cloudinary://test_key:test_secret@test_name');
        $this->name = Name::from('test.jpg');
        $this->maker = new Cloudinary;
    }

    public function testScale()
    {
        $this->assertEquals(
            'https://res.cloudinary.com/test_name/image/upload/c_scale,f_auto,fl_advanced_resize,q_auto:best,w_100/test.jpg',
            $this->maker->make($this->name, ['width' => Size::from(100)])
        );
    }

    public function testFill()
    {
        $this->assertEquals(
            'https://res.cloudinary.com/test_name/image/upload/c_fill,f_auto,fl_advanced_resize,g_auto,h_100,q_auto:best,w_100/test.jpg',
            $this->maker->make(
                $this->name,
                [
                    'width' => Size::from(100),
                    'height' => Size::from(100),
                    'gravity' => Size::from('auto'),
                ]
            )
        );
    }
}
