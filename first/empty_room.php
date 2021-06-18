<?php

class EmptyRoom extends Room
{
    public $type = 'm';

    public function execute(): int
    {
        global $output;
        $output.=("empty");
        return 0;
    }

}



?>