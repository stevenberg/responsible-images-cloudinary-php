<?php

declare(strict_types=1);

/**
 * @author Steven Berg <steven@stevenberg.net>
 * @copyright 2017 Steven Berg
 * @license MIT
 */

namespace StevenBerg\ResponsibleImages\Urls;

use Cloudinary\Asset\Media;
use Ds\Map;
use StevenBerg\ResponsibleImages\Values\Crop;
use StevenBerg\ResponsibleImages\Values\Gravity;

/**
 * Generate URLs for images stored in Cloudinary.
 */
class Cloudinary extends Maker
{
    /**
     * Return a URL for the given image name and options.
     *
     * @param Map<string, mixed> $options options to pass to the URL maker class
     */
    protected function url(string $path, Map $options): string
    {
        if (isset($options['width'], $options['height'])) {
            $options['crop'] = Crop::Fill;
            if (!isset($options['gravity'])) {
                $options['gravity'] = Gravity::Auto;
            }
        } else {
            $options['crop'] = Crop::Scale;
        }

        return (string) Media::fromParams($path, $this->options($options));
    }

    /**
     * @param Map<string, mixed> $options
     *
     * @return array<string, bool|string>
     * */
    private function options(Map $options): array
    {
        $options = $options->copy();
        $options->apply(function ($key, $value) {
            return $value->getValue();
        });

        return $options->merge([
            'secure' => true,
            'quality' => 'auto:best',
            'fetch_format' => 'auto',
            'flags' => 'advanced_resize',
        ])->toArray();
    }
}
