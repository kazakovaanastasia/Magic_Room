<?php
class Map
{
    public $pool = [];
    public $x = 1;
    public $y = 1;
    public $max_x = 1;
    public $max_y = 1;
    public function create($file)
    {
        $this->max_x=3;
        $this->max_y=3;
        $main = new RoomFactory();
        $this->max_x= (int)fgets($file) ;
        $this->max_y= (int)fgets($file) ;
        $val=0;
        while(!feof($file)) {
            $val+=1;
            $str= fgets($file) ;
            $elem=$main->create($str[0], (int)$str[1], (int)$str[2], (int)$str[3], (int)$str[4], (int)$str[5]);
            $now_x=$val%$this->max_x;
            if ($now_x==0){$now_x= $this->max_x;}
            $now_y=(int)(($val-$now_x)/$this->max_x+1);
            $this->pool[$now_y][ $now_x]=$elem;
        }
     /*
      example if i dont use file
      Я запоняю змейкой
        $q = $main->create('e', 0, 1, 0, 0, 1);
        $w = $main->create('e', 0, 0, 1, 0, 1);
        $e = $main->create('m', 1, 0, 0, 0, 0);
        $a = $main->create('c', 3, 0, 0, 1, 1);
        $s = $main->create('m', 2, 0, 0, 1, 1);
        $d = $main->create('e', 1, 0, 0, 0, 0);
        $z = $main->create('m', 1, 1, 0, 1, 0);
        $x = $main->create('m', 3, 1, 1, 1, 0);
        $c = $main->create('e', 1, 0, 1, 0, 1);

        $this->pool[1][1] = $q;
        $this->pool[1][2] = $w;
        $this->pool[1][3] = $e;
        $this->pool[2][1] = $a;
        $this->pool[2][2] = $s;
        $this->pool[2][3] = $d;
        $this->pool[3][1] = $z;
        $this->pool[3][2] = $x;
        $this->pool[3][3] = $c;
*/
    }

    public function get()
    {
        $a = $this->pool[0]->execute();
        echo "$a";
    }


    public function step($dir): int
    {
        switch ($dir) {
            case 1:

                $this->y++;
                break;
            case 2:
                $this->y--;
                break;

            case 3:
                $this->x--;
                break;

            case 4:
                $this->x++;
                break;
            default:
                throw new Exception('Wrong number passed.');
        }
        $res = $this->activate();
        $old_room = $this->pool[$this->x][$this->y];
        $this->pool[$this->x][$this->y] = new EmptyRoom(0, $old_room->u, $old_room->d, $old_room->l, $old_room->r);
        return $res;
    }

    public function activate(): int
    {
        return $this->pool[$this->x][$this->y]->execute();
    }
}


?>