<?php

class Player
{
    public $s;

    public $h;
    public $count = 0;

    public function start_game($file)
    {
        $this->h = new Map();
        $this->h->create($file);

    }

    public function choose_step(int $dir):int
    {
        $this->s++;

        $add=$this->h->step($dir);
        $this->count += $add;
        return $add;

    }

}
?>