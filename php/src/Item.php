<?php

namespace GildedRose;

class Item
{
    public $sell_in;
    public $quality;

    public function __construct(int $quality, int $sell_in)
    {
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function updateQuality(){
        $this->quality -=1;
        $this->sell_in -=1;

        if($this->sell_in <=0){
            $this->quality -=1;
        }
    }
}
