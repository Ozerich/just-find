<?php

class GameTask extends ActiveRecord\Model
{
    public static $table_name = 'game_tasks';

    public function get_task()
    {
        return Task::find_by_id($this->task_id);
    }
}

?>