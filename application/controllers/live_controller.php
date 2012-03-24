<?php

class Live_Controller extends MY_Controller
{
    private function update_team($team)
    {
        $current_gametask = $team->current_gametask;

        if ($current_gametask) {
            if (!$current_gametask->hint1_time && (time() - $current_gametask->open_time->getTimestamp() > Config::find_by_param('hint1_interval')->value)) {
                $current_gametask->hint1_time = time_to_mysqldatetime(time());
                Status::create(array('text' => $this->load->view('statuses/open_hint.php', array('hint_num' => '1', 'task' => $current_gametask, 'hint' => $current_gametask->task->hint_1), true),
                    'added' => time_to_mysqldatetime(time()), 'display_time' => OPEN_HINT_TIME));
            }

            else if (!$current_gametask->hint2_time && $current_gametask->hint1_time && (time() - $current_gametask->hint1_time->getTimestamp() > Config::find_by_param('hint2_interval')->value)) {
                $current_gametask->hint2_time = time_to_mysqldatetime(time());
                Status::create(array('text' => $this->load->view('statuses/open_hint.php', array('hint_num' => '2', 'task' => $current_gametask, 'hint' => $current_gametask->task->hint_2), true),
                    'added' => time_to_mysqldatetime(time()), 'display_time' => OPEN_HINT_TIME));
            }

            else if (!$current_gametask->hint3_time && $current_gametask->hint2_time && (time() - $current_gametask->hint2_time->getTimestamp() > Config::find_by_param('hint3_interval')->value)) {
                $current_gametask->hint3_time = time_to_mysqldatetime(time());
                Status::create(array('text' => $this->load->view('statuses/open_hint.php', array('hint_num' => '3', 'task' => $current_gametask, 'hint' => $current_gametask->task->hint_3), true),
                    'added' => time_to_mysqldatetime(time()), 'display_time' => OPEN_HINT_TIME));
            }

            else if (!$current_gametask->answer_time && $current_gametask->hint3_time && (time() - $current_gametask->hint3_time->getTimestamp() > Config::find_by_param('answer_interval')->value)) {
                $current_gametask->answer_time = time_to_mysqldatetime(time());
                Status::create(array('text' => $this->load->view('statuses/open_answer.php', array('task' => $current_gametask), true),
                    'added' => time_to_mysqldatetime(time()), 'display_time' => OPEN_HINT_TIME));
            }

            $current_gametask->save();
        }


    }

    public function __construct()
    {
        parent::__construct();
        $this->layout_view = '';

        if (Config::find_by_param('started_game')->value == 0)
            show_404();

        $this->view_data['top_teams'] = Team::find('all', array('limit' => 5, 'order' => 'pos ASC'));
        $this->view_data['bottom_teams'] = Team::find('all', array('limit' => 5, 'offset' => 5, 'order' => 'pos ASC'));
    }

    public function index()
    {

        $this->view_data['content'] = $this->load->view('live/live_content.php', $this->view_data, true);
        $this->view_data['page_title'] = 'Прямая трансляция игры';
    }

    public function update()
    {

        echo $this->load->view('live/live_content.php', $this->view_data, true);
        exit();
    }

    public function update_all()
    {
        while (true) {
            echo date("H:i:s") . " - Обновление<br/>\n";
            flush();
            foreach (Team::all() as $team)
                $this->update_team($team);
            sleep(5);
        }
    }
}

?>