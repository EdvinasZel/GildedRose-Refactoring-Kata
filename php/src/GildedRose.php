<?php

namespace GildedRose;

final class GildedRose
{
    public static $lookup = [
        'Aged Brie' => AgedBrie::class,
        'Backstage passes to a TAFKAL80ETC concert' => Backstage::class,
        'Sulfuras, Hand of Ragnaros' => Sulfuras::class,
        'Conjured' => Conjured::class,
    ];

    public static function type($name, $quality, $sell_in)
    {
        if (array_key_exists($name, self::$lookup)) {
            return new self::$lookup[$name]($quality,$sell_in);
        }
        return new Item($quality,$sell_in);
    }
}
