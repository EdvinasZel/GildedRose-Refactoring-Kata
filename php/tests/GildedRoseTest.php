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
        $item->updateQuality();

        $this->assertEquals($item->quality, 11);
        $this->assertEquals($item->sell_in, 9);
    }
    public function test_aged_brie_type_on_sell_in_date_updates()
    {
        $item = GildedRose::type('Aged Brie', 10, 0);
        $item->updateQuality();

        $this->assertEquals($item->quality, 12);
        $this->assertEquals($item->sell_in, -1);
    }
    public function test_aged_brie_type_before_sell_in_date_with_maximum_quality()
    {
        $item = GildedRose::type('Aged Brie', 50, 5);
        $item->updateQuality();

        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sell_in, 4);
    }
    public function test_aged_brie_type_on_sell_in_date_near_maximum_quality()
    {
        $item = GildedRose::type('Aged Brie', 49, 0);
        $item->updateQuality();

        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sell_in, -1);
    }
    public function test_aged_brie_type_on_sell_in_date_with_maximum_quality()
    {
        $item = GildedRose::type('Aged Brie', 50, 0);
        $item->updateQuality();

        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sell_in, -1);
    }
    public function test_aged_brie_type_after_sell_in_date_with_maximum_quality()
    {
        $item = GildedRose::type('Aged Brie', 50, -10);
        $item->updateQuality();

        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sell_in, -11);
    }
    //Backstage pass tests
    public function test_backstage_pass_before_sell_in_date_updates_quality()
    {
        $item = GildedRose::type('Backstage passes to a TAFKAL80ETC concert', 10, 10);
        $item->updateQuality();

        $this->assertEquals($item->quality, 12);
        $this->assertEquals($item->sell_in, 9);
    }
    public function test_backstage_pass_updates_by_three_with_five_days_left_to_sell()
    {
        $item = GildedRose::type('Backstage passes to a TAFKAL80ETC concert', 10, 5);
        $item->updateQuality();

        $this->assertEquals($item->quality, 13);
        $this->assertEquals($item->sell_in, 4);
    }
    public function test_backstage_pass_more_than_ten_days_before_sell_on_date_updates()
    {
        $item = GildedRose::type('Backstage passes to a TAFKAL80ETC concert', 10, 11);
        $item->updateQuality();

        $this->assertEquals($item->quality, 11);
        $this->assertEquals($item->sell_in, 10);
    }
    public function test_backstage_pass_quality_drops_to_zero_after_sell_in_date()
    {
        $item = GildedRose::type('Backstage passes to a TAFKAL80ETC concert', 10, 0);
        $item->updateQuality();

        $this->assertEquals($item->quality, 0);
        $this->assertEquals($item->sell_in, -1);
    }
    public function test_backstage_pass_close_to_sell_in_date_with_max_quality()
    {
        $item = GildedRose::type('Backstage passes to a TAFKAL80ETC concert', 50, 10);
        $item->updateQuality();

        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sell_in, 9);
    }
    public function test_backstage_pass_very_to_sell_in_date_with_max_quality()
    {
        $item = GildedRose::type('Backstage passes to a TAFKAL80ETC concert', 50, 5);
        $item->updateQuality();

        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sell_in, 4);
    }
    public function test_backstage_pass_quality_zero_after_sell_date()
    {
        $item = GildedRose::type('Backstage passes to a TAFKAL80ETC concert', 50, -5);
        $item->updateQuality();

        $this->assertEquals($item->quality, 0);
        $this->assertEquals($item->sell_in, -6);
    }
    //Sulfuras tests
    public function test_sulfuras_on_sell_in_date()
    {
        $item = GildedRose::type('Sulfuras, Hand of Ragnaros', 80, 0);
        $item->updateQuality();

        $this->assertEquals($item->quality, 80);
        $this->assertEquals($item->sell_in, 0);
    }
    public function test_sulfuras_after_sell_in_date()
    {
        $item = GildedRose::type('Sulfuras, Hand of Ragnaros', 80, -1);
        $item->updateQuality();

        $this->assertEquals($item->quality, 80);
        $this->assertEquals($item->sell_in, -1);
    }
    //Conjured tests
    public function test_conjured_before_sell_in_date_updates()
    {
        $item = GildedRose::type('Conjured', 10, 10);
        $item->updateQuality();

        $this->assertEquals($item->quality, 8);
        $this->assertEquals($item->sell_in, 9);
    }
    public function test_conjured_does_not_degrade_passed_zero()
    {
        $item = GildedRose::type('Conjured', 0, 10);
        $item->updateQuality();

        $this->assertEquals($item->quality, 0);
        $this->assertEquals($item->sell_in, 9);
    }
    public function test_conjured_after_sell_in_date_degrades_twice_as_fast()
    {
        $item = GildedRose::type('Conjured', 10, 0);
        $item->updateQuality();

        $this->assertEquals($item->quality, 6);
        $this->assertEquals($item->sell_in, -1);
    }


}
