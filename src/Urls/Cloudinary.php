<?php
/**
 * @author Steven Berg <steven@stevenberg.net>
 * @copyright 2017 Steven Berg
 * @license GNU General Public License, version 3
 */

namespace StevenBerg\ResponsibleImages\Urls;

use StevenBerg\ResponsibleImages\Values\Gravity;
use StevenBerg\ResponsibleImages\Values\Name;

/**
 * Generate URLs for images stored in Cloudinary.
 */
class Cloudinary implements Maker
{
    /**
     * Return a URL for the given image name and options.
     *
     * @param \StevenBerg\ResponsibleImages\Values\Name $name The image name.
     * @param (\StevenBerg\ResponsibleImages\Values\Value|string)[] $options Options to pass to the URL maker class.
     *
     * @return string The URL of the resized image.
     */
    public function make(Name $path, array $options = []): string
    {
        if (isset($options['width']) && isset($options['height'])) {
            $options['crop'] = 'fill';
            if (!isset($options['gravity'])) {
                $options['gravity'] = Gravity::value('auto');
            }
        } else {
            $options['crop'] = 'scale';
        }

        return cloudinary_url($path, $this->options() + $options);
    }

    private function options()
    {
        return [
            'secure' => true,
            'quality' => 'auto:best',
            'fetch_format' => 'auto',
            'flags' => 'advanced_resize',
        ];
    }
}
