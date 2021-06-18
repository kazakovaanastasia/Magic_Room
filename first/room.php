<?php
abstract class Room
{
    public $type;
    public $sort;
    public $u;
    public $d;
    public $l;
    public $r;

    function getType(): string
    {
        return $this->type;
    }

    public function __construct(int $val, bool $u, bool $d, bool $l, bool $r)
    {
        $this->sort = $val;
        $this->u = $u;
        $this->d = $d;
        $this->l = $l;
        $this->r = $r;

    }

    public abstract function execute(): int;

}
?>