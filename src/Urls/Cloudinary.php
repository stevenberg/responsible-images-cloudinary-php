<?php

declare(strict_types=1);
/**
 * @author Steven Berg <steven@stevenberg.net>
 * @copyright 2017 Steven Berg
 * @license MIT
 */

namespace StevenBerg\ResponsibleImages\Urls;

use Ds\Map;
use StevenBerg\ResponsibleImages\Values\Crop;
use StevenBerg\ResponsibleImages\Values\Gravity;
use StevenBerg\ResponsibleImages\Values\Name;

/**
 * Generate URLs for images stored in Cloudinary.
 */
class Cloudinary extends Maker
{
    /**
     * Return a URL for the given image name and options.
     *
     * @param Ds\Map $options Options to pass to the URL maker class.
     */
    protected function url(Name $path, Map $options): string
    {
        if (isset($options['width']) && isset($options['height'])) {
            $options['crop'] = Crop::from('fill');
            if (!isset($options['gravity'])) {
                $options['gravity'] = Gravity::from('auto');
            }
        } else {
            $options['crop'] = Crop::from('scale');
        }

        return cloudinary_url($path, $this->options($options));
    }

    private function options(Map $options): array
    {
        $options = $options->copy();
        $options->apply(function ($key, $value) {
            return $value->value();
        });

        return $options->merge([
            'secure' => true,
            'quality' => 'auto:best',
            'fetch_format' => 'auto',
            'flags' => 'advanced_resize',
        ])->toArray();
    }
}
