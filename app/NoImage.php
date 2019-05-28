<?php

namespace App;

class NoImage
{
    /**
     * Returns image src with given dimension
     *
     * @return string
     */
    public function getSrc($height, $width) {
        return "/img/noimage-{$height}x{$width}.jpeg";
    }
}
