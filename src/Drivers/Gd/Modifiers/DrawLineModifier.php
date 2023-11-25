<?php

namespace Intervention\Image\Drivers\Gd\Modifiers;

use Intervention\Image\Drivers\DrawModifier;
use Intervention\Image\Interfaces\ImageInterface;
use Intervention\Image\Interfaces\ColorInterface;
use Intervention\Image\Geometry\Line;

/**
 * @method ColorInterface backgroundColor()
 * @property Line $drawable
 */
class DrawLineModifier extends DrawModifier
{
    public function apply(ImageInterface $image): ImageInterface
    {
        foreach ($image as $frame) {
            imageline(
                $frame->native(),
                $this->drawable->start()->x(),
                $this->drawable->start()->y(),
                $this->drawable->end()->x(),
                $this->drawable->end()->y(),
                $this->driver()->colorProcessor($image->colorspace())->colorToNative(
                    $this->backgroundColor()
                )
            );
        }

        return $image;
    }
}
