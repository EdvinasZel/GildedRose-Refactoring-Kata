<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    public $name='';
    public $quality='';
    public $sell_in='';

    public function __construct($name, $quality, $sell_in)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sell_in = $sell_in;
    }

    public static function type($name, $quality, $sell_in)
    {
        return new static ($name, $quality, $sell_in);
    }


    public function updateQuality(): void
    {
        switch ($this->name){

            case 'Aged Brie':

                $this->quality += 1;
                $this->sell_in -= 1;

                if($this->sell_in <= 0){
                    $this->quality += 1;
                }

                if($this->quality > 50){
                    $this->quality = 50;
                }

                break;

            case 'Backstage passes to a TAFKAL80ETC concert':

                $this->quality += 1;

                if($this->sell_in <= 10){
                    $this->quality += 1;
                }

                if($this->sell_in <= 5){
                    $this->quality += 1;
                }

                if($this->quality > 50) {
                    $this->quality = 50;
                }

                if($this->sell_in <= 0){
                    $this->quality = 0 ;
                }

                $this->sell_in -=1;

                break;

            case 'Sulfuras, Hand of Ragnaros':

                break;

            case 'Conjured':

                $this->quality -= 2;
                $this->sell_in -= 1;

                if($this->sell_in <= 0){
                    $this->quality -= 2;
                }

                if($this->quality <= 0){
                    $this->quality = 0 ;
                }

                break;

            default:

                $this->quality -= 1;
                $this->sell_in -=1;

                if($this->sell_in <= 0){
                    $this->quality -= 1;
                }

                break;
        }
    }

}
