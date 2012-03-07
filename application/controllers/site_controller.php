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
        $this->view_data['page_title'] = "О игре";
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
}

?>