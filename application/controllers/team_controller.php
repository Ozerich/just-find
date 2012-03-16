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

        if(!$current_gametask->hint1_time && (time() - $current_gametask->open_time->getTimestamp() > HINT_DELAY))
            $current_gametask->hint1_time = time_to_mysqldatetime(time());

        else if(!$current_gametask->hint2_time && $current_gametask->hint1_time && (time() - $current_gametask->hint1_time->getTimestamp() > HINT_DELAY))
            $current_gametask->hint2_time = time_to_mysqldatetime(time());

        else if(!$current_gametask->hint3_time && $current_gametask->hint2_time && (time() - $current_gametask->hint2_time->getTimestamp() > HINT_DELAY))
            $current_gametask->hint3_time = time_to_mysqldatetime(time());

        else if(!$current_gametask->answer_time && $current_gametask->hint3_time && (time() - $current_gametask->hint3_time->getTimestamp() > HINT_DELAY))
            $current_gametask->answer_time = time_to_mysqldatetime(time());


        $current_gametask->save();


        echo $this->load->view('team/team_content.php', array('team' => $this->team), true);
        exit();
    }

    public function index()
    {
        $this->view_data['team_content'] = $this->load->view('team/team_content.php', array('team' => $this->team), true);
        $this->view_data['page_title'] = 'Страница оператора';
    }

    private function next_task($is_solved = false)
    {

        $current = $this->team->current_gametask;
        $current->close_time = time_to_mysqldatetime(time());
        $current->is_solved = $is_solved;
        $current->is_closed = 1;
        $current->save();

        $task = GameTask::find(array('conditions' => array('team_id = ? AND is_closed = 0', $this->team->id)));
        $task->open_time = time_to_mysqldatetime(time());
        $task->save();
    }

    public function answer()
    {
        $code = $this->input->post('code');

        $correct_code = $this->team->current_gametask->task->code;
        if ($correct_code != $code)
            $result = array('result' => 0, 'html' => '');
        else
        {
            $this->next_task(true);
            $result = array('result' => 1, 'html' => $this->load->view('team/team_content.php', array('team' => $this->team), true));
        }

        echo json_encode($result);
        exit();
    }

}


?>