<?php

class Admin_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->user = $this->session->userdata('user_id') ? Admin::find($this->session->userdata('user_id')) : FALSE;
        $this->view_data['user'] = $this->user;

        $this->layout_view = 'admin';

    }

    public function auth()
    {
        if ($_POST) {
            $user = Admin::validate_login($_POST['email'], $_POST['password']);

            if ($user)
                redirect('admin/main');
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


}


?>