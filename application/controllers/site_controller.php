<?php

class Site_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view_data['page_title'] = 'Главная страница';
    }

    public function about()
    {
        $this->view_data['page_title'] = "Об игре";
    }

    public function registration()
    {
        $this->view_data['page_title'] = 'Регистрация';
    }

    public function rules()
    {
        $this->view_data['page_title'] = 'Правила игры';
    }

    public function sponsors()
    {
        $this->view_data['page_title'] = 'Спонсоры';
    }
	
	public function ie()
    {
        $this->view_data['page_title'] = 'Просмотр со старых осликов запрещен :(';
    }
	
	public function teams()
    {
        $this->view_data['page_title'] = 'Команды-участники';
    }

    public function login()
    {
        if ($_POST) {
            $user = Team::validate_login($_POST['email'], $_POST['password']);

            if ($user)
                redirect('team');
            else
                redirect('login');
        }
        $this->view_data['page_title'] = 'Вход в игру';
    }
}

?>