<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{

    //Aged Brie tests
    public function test_aged_brie_type_before_sell_in_date_updates()
    {
        $item = GildedRose::type('Aged Brie', 10, 10);
        $item->updateQuality($item);

        $this->assertEquals($item->quality, 11);
        $this->assertEquals($item->sell_in, 9);
    }
    public function test_aged_brie_type_on_sell_in_date_updates()
    {
        $item = GildedRose::type('Aged Brie', 10, 0);
        $item->updateQuality($item);

        $this->assertEquals($item->quality, 12);
        $this->assertEquals($item->sell_in, -1);
    }
    public function test_aged_brie_type_before_sell_in_date_with_maximum_quality()
    {
        $item = GildedRose::type('Aged Brie', 50, 5);
        $item->updateQuality($item);

        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sell_in, 4);
    }
    public function test_aged_brie_type_on_sell_in_date_near_maximum_quality()
    {
        $item = GildedRose::type('Aged Brie', 49, 0);
        $item->updateQuality($item);

        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sell_in, -1);
    }
    public function test_aged_brie_type_on_sell_in_date_with_maximum_quality()
    {
        $item = GildedRose::type('Aged Brie', 50, 0);
        $item->updateQuality($item);

        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sell_in, -1);
    }
    public function test_aged_brie_type_after_sell_in_date_with_maximum_quality()
    {
        $item = GildedRose::type('Aged Brie', 50, -10);
        $item->updateQuality($item);

        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sell_in, -11);
    }
}
