<?php

class Live_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout_view = '';

        if(Config::find_by_param('started_game')->value == 0)
            show_404();

        $this->view_data['top_teams'] = Team::find('all', array('limit' => 5, 'order' => 'pos ASC'));
        $this->view_data['bottom_teams'] = Team::find('all', array('limit' => 5, 'offset' => 5, 'order' => 'pos ASC'));
    }

    public function index()
    {

        $this->view_data['content'] = $this->load->view('live/live_content.php', $this->view_data, true);
        $this->view_data['page_title'] = 'Прямая трансляция игры';
    }

    public function update(){

        echo $this->load->view('live/live_content.php', $this->view_data, true);
        exit();
    }

}

?>