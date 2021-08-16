<?php


namespace GildedRose;


class Backstage extends Item
{
    public function updateQuality(){

        if($this->sell_in > 10){
            $this->quality += 1;
        }

        if($this->sell_in <= 10 && $this->sell_in > 5){
            $this->quality += 2;
        }

        if($this->sell_in <= 5){
            $this->quality += 3;
        }

        if($this->quality > 50) {
            $this->quality = 50;
        }

        if($this->sell_in <= 0){
            $this->quality = 0 ;
        }

        $this->sell_in -=1;
    }
}