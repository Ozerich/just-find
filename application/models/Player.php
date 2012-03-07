<?php

class Player extends ActiveRecord\Model
{
    public function get_fullname()
    {
        return $this->name." ".$this->surname;
    }
}

?>