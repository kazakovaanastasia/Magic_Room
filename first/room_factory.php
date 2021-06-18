<?php
class RoomFactory
{
    public static function create($type, $sort, bool $u, bool $d, bool $l, bool $r)
    {
        switch ($type) {
            case 'e':
                return new EmptyRoom(0, $u, $d, $l, $r);
            case 'm':
                return new MonsterRoom($sort, $u, $d, $l, $r);
            case 'c':
                return new ChestRoom($sort, $u, $d, $l, $r);
            default:
                throw new Exception('Wrong user type passed.');
        }
    }
}
?>