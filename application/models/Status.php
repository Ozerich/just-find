<?php

class Status extends ActiveRecord\Model
{
    public static $table_name = 'statuses';

    public static function Get()
    {
        $count = Status::count();

        if ($count == 0)
            return '';

        $status = Status::find(array('order' => 'added ASC', 'limit' => '1'));

        if (((time() - $status->added->getTimestamp()) < $status->display_time) || $count == 1)
            return $status->text;

        $status->delete();
        return Status::Get();

    }
}

?>