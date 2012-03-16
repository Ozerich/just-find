<?php

define('HINT_DELAY', 10);

class Team_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->team = $this->session->userdata('team_id') ? Team::find_by_id($this->session->userdata('team_id')) : FALSE;
        $this->view_data['team'] = $this->team;

        if (!$this->team)
            redirect('login');

        $this->layout_view = 'application';
    }

    public function update()
    {

        $current_gametask = $this->team->current_gametask;
        if ($current_gametask) {
            if (!$current_gametask->hint1_time && (time() - $current_gametask->open_time->getTimestamp() > Config::find_by_param('hint1_interval')->value))
                $current_gametask->hint1_time = time_to_mysqldatetime(time());

            else if (!$current_gametask->hint2_time && $current_gametask->hint1_time && (time() - $current_gametask->hint1_time->getTimestamp() > Config::find_by_param('hint2_interval')->value))
                $current_gametask->hint2_time = time_to_mysqldatetime(time());

            else if (!$current_gametask->hint3_time && $current_gametask->hint2_time && (time() - $current_gametask->hint2_time->getTimestamp() > Config::find_by_param('hint3_interval')->value))
                $current_gametask->hint3_time = time_to_mysqldatetime(time());

            else if (!$current_gametask->answer_time && $current_gametask->hint3_time && (time() - $current_gametask->hint3_time->getTimestamp() > Config::find_by_param('answer_interval')->value))
                $current_gametask->answer_time = time_to_mysqldatetime(time());


            $current_gametask->save();
        }


        echo $this->load->view('team/team_content.php', array('team' => $this->team), true);
        exit();
    }

    public function index()
    {
        $this->view_data['is_game_over'] = $this->is_game_over();
        $this->view_data['team_content'] = $this->load->view('team/team_content.php', array('team' => $this->team), true);
        $this->view_data['page_title'] = 'Страница оператора '.$this->team->operator->fullname;
    }

    private function game_over()
    {
        $this->team->finish_time = time_to_mysqldatetime(time());
        $this->team->save();
    }

    private function next_task()
    {

        $current = $this->team->current_gametask;
        $current->close_time = time_to_mysqldatetime(time());
        $current->is_closed = 1;
        $current->save();

        $task = GameTask::find(array('conditions' => array('team_id = ? AND is_closed = 0', $this->team->id)));
        if (!$task) {
            $this->game_over();
            return;
        }
        $task->open_time = time_to_mysqldatetime(time());
        $task->save();
    }

    private function is_game_over(){
        return $this->team->finish_time ? 1 : 0;
    }

    public function answer()
    {
        $code = $this->input->post('code');

        $correct_code = $this->team->current_gametask->task->code;
        if ($correct_code != $code)
            $result = array('result' => 0, 'html' => '', 'game_over' => $this->is_game_over());
        else
        {
            $this->next_task(true);
            $result = array('result' => 1, 'game_over' => $this->is_game_over(), 'html' => $this->load->view('team/team_content.php', array('team' => $this->team), true));
        }

        echo json_encode($result);
        exit();
    }

}


?>