<?php
class ChestRoom extends Room
{
    public $type = 'c';

    public function execute(): int
    {        global $output;

        switch ($this->sort) {

            case 1:
                $ran=rand(1, 10);
                $output.=("Chest with money");
                return rand(1, 10);
            case 2:
                $ran=rand(1, 10);
                $output.=("Chest with money");
                return rand(11, 20);
            case 3:
                $ran=rand(1, 10);
                $output.=("Chest with money");
                return rand(21, 30);
        }
    }
}

?>