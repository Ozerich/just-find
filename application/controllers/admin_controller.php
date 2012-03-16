<?php

class Admin_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->user = $this->session->userdata('user_id') ? Admin::find_by_id($this->session->userdata('user_id')) : FALSE;
        $this->view_data['user'] = $this->user;

        $this->layout_view = 'admin';

    }

    private function start_game()
    {

        $is_started = Config::find_by_param('started_game');
        if ($is_started->value) {
            return;
        }

        @GameTask::delete_all();
        foreach (Team::all() as $team)
        {
            $game_task = GameTask::create(array('task_id' => $team->task_1, 'team_id' => $team->id));

            $game_task->open_time = time_to_mysqldatetime(time());
            $game_task->save();

            if ($team->task_2) GameTask::create(array('task_id' => $team->task_2, 'team_id' => $team->id));
            if ($team->task_3) GameTask::create(array('task_id' => $team->task_3, 'team_id' => $team->id));
            if ($team->task_4) GameTask::create(array('task_id' => $team->task_4, 'team_id' => $team->id));
            if ($team->task_5) GameTask::create(array('task_id' => $team->task_5, 'team_id' => $team->id));
            if ($team->task_6) GameTask::create(array('task_id' => $team->task_6, 'team_id' => $team->id));

            $team->start_time = inputdate_to_mysqldate(time());
            $team->save();
        }

        $is_started->value = 1;
        $is_started->save();

        redirect('game');
    }

    private function stop_game()
    {
        $is_started = Config::find_by_param('started_game');

        if ($is_started->value == 0) {
            return;
        }

        $is_started->value = 0;
        $is_started->save();

        redirect('admin/game');
    }

    public function game($param = "")
    {
        if ($_POST) {
            $gameover = Config::find_by_param('game_over_html');
            $gameover->value = $_POST['gameover'];
            $gameover->save();

            $h = Config::find_by_param('hint1_interval');
            $h->value = $this->input->post('hint1_interval');
            $h->save();

            $h = Config::find_by_param('hint2_interval');
            $h->value = $this->input->post('hint2_interval');
            $h->save();

            $h = Config::find_by_param('hint3_interval');
            $h->value = $this->input->post('hint3_interval');
            $h->save();

            $h = Config::find_by_param('answer_interval');
            $h->value = $this->input->post('answer_interval');
            $h->save();

            redirect('admin/game');
        }
        if ($param == "start_game")
            $this->start_game();
        else if ($param == "stop_game")
            $this->stop_game();
        else

            $this->view_data['page_title'] = 'Настройки игры';
    }

    public function auth()
    {
        if ($_POST) {
            $user = Admin::validate_login($_POST['email'], $_POST['password']);

            if ($user)
                redirect('admin/game');
            else
                redirect('admin/auth');
        }
        $this->view_data['page_title'] = 'Вход в систему управления';
        $this->layout_view = 'application.php';
    }

    public function main()
    {
        if (!$this->user)
            redirect('admin/auth');

        $this->view_data['page_title'] = 'Панель управления';
    }

    public function teams()
    {
        if (!$this->user)
            redirect('admin/auth');

        if ($_POST) {

            foreach ($_POST['pos'] as $team_id => $pos) {
                $team = Team::find_by_id($team_id);
                if ($team) {
                    $team->pos = $pos;
                    $team->save();
                }
            }

            redirect('admin/teams');
        }

        $this->view_data['teams'] = Team::all(array('order' => 'pos ASC'));

        $this->view_data['page_title'] = 'Команды-участники';
    }

    public function tasks()
    {
        if (!$this->user)
            redirect('admin/auth');

        $this->view_data['page_title'] = 'Задания';
    }

    public function new_team()
    {
        if (!$this->user)
            redirect('admin/auth');

        if ($_POST) {
            $team = Team::create(array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'task_1' => $this->input->post('task1'),
                'task_2' => $this->input->post('task2'),
                'task_3' => $this->input->post('task3'),
                'task_4' => $this->input->post('task4'),
                'task_5' => $this->input->post('task5'),
                'task_6' => $this->input->post('task6'),
            ));

            foreach ($_POST['player_name'] as $ind => $name) {
                Player::create(array(
                    'team_id' => $team->id,
                    'name' => $_POST['player_name'][$ind],
                    'surname' => $_POST['player_surname'][$ind],
                    'type' => isset($_POST['is_teacher'][$ind]) ? 'teacher' : 'student',
                    'group' => isset($_POST['is_teacher'][$ind]) ? '' : $_POST['player_group'][$ind],
                    'is_operator' => $ind == 0
                ));
            }
            redirect('admin/teams');
        }

        $this->view_data['page_title'] = 'Новая команда';
    }

    public function team($team_id = 0)
    {
        $team = Team::find_by_id($team_id);

        if (!$team) {
            show_404();
            exit();
        }

        if ($_POST) {
            $team->name = $this->input->post('name');
            $team->email = $this->input->post('email');
            if ($this->input->post('password'))
                $team->password = $this->input->post('password');
            $team->task_1 = $this->input->post('task1');
            $team->task_2 = $this->input->post('task2');
            $team->task_3 = $this->input->post('task3');
            $team->task_4 = $this->input->post('task4');
            $team->task_5 = $this->input->post('task5');
            $team->task_6 = $this->input->post('task6');
            $team->save();

            Player::table()->delete(array('team_id' => $team->id));

            foreach ($_POST['player_name'] as $ind => $name) {
                Player::create(array(
                    'team_id' => $team->id,
                    'name' => $_POST['player_name'][$ind],
                    'surname' => $_POST['player_surname'][$ind],
                    'type' => isset($_POST['is_teacher'][$ind]) ? 'teacher' : 'student',
                    'group' => isset($_POST['is_teacher'][$ind]) ? '' : $_POST['player_group'][$ind],
                    'is_operator' => $ind == 0
                ));
            }

            redirect('admin/teams');
        }

        $this->view_data['team'] = $team;
    }

    public function new_task()
    {
        if (!$this->user)
            redirect('admin/auth');

        if ($_POST) {
            Task::create(array(
                'question' => $this->input->post('question'),
                'hint_1' => $this->input->post('hint1'),
                'hint_2' => $this->input->post('hint2'),
                'hint_3' => $this->input->post('hint3'),
                'answer' => $this->input->post('answer'),
                'code' => $this->input->post('code'),
            ));
            redirect('admin/tasks');
        }

        $this->view_data['page_title'] = 'Новое задание';
    }

    public function task($task_id = 0)
    {

        $task = Task::find_by_id($task_id);
        if (!$task) {
            show_404();
            exit();
        }

        if ($_POST) {

            $task->question = $this->input->post('question');
            $task->hint_1 = $this->input->post('hint1');
            $task->hint_2 = $this->input->post('hint2');
            $task->hint_3 = $this->input->post('hint3');
            $task->answer = $this->input->post('answer');
            $task->code = $this->input->post('code');
            $task->save();

            redirect('admin/tasks');
        }

        $this->view_data['task'] = $task;
    }

    public function logout()
    {
        $this->user->logout();
        redirect('admin/auth');
    }


}


?>