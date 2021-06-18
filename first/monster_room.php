<?php
class MonsterRoom extends Room
{
    public $type = 'm';


    function get_force(): int
    {
        switch ($this->sort) {
            case 1:
                return rand(1, 5);
            case 2:
                return rand(6, 10);
            case 3:
                return rand(11, 15);
        }
    }

    public function execute(): int
    {
        $monster_force = $this->get_force();
        while (True) {
            if ($monster_force == 0) {
                return 0;
            }
            $user_force = rand(1, 15);
            global $output;
            $output.= ("monster CHALLENGE :  " );

            $output.= ("monster  force $monster_force    your force $user_force" );

            if ($user_force > $monster_force) {
                return $monster_force;
            } else if ($user_force <= $monster_force) {
                $monster_force = max(0, $monster_force - (int)($this->get_force() / 2));
                $output.= ("monster  force $monster_force    your force $user_force");
                continue;
            }
        }
    }


}
?>