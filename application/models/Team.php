<?php

class Team extends ActiveRecord\Model
{
    public function set_password($plain_text)
    {
        $this->hashed_password = $this->hash_password($plain_text);
    }

    private function hash_password($password)
    {
        return md5(md5($password));
    }

    private function validate_password($password)
    {
        return $this->hashed_password == md5(md5($password));
    }

    public static function validate_login($email, $password)
    {
        $user = Admin::find_by_email($email);

        if ($user && $user->validate_password($password)) {
            Admin::login($user->id);
            return $user;
        }
        else
            return FALSE;
    }

    public static function login($user_id)
    {
        $CI =& get_instance();
        $CI->session->set_userdata("user_id", $user_id);
    }

    public static function logout()
    {
        $CI =& get_instance();
        $CI->session->sess_destroy();
    }

    public function get_operator()
    {
        return Player::find(array('conditions' => array('team_id = ? and is_operator = 1', $this->id)));
    }

    public function get_players()
    {
        return Player::find('all', array('conditions' => array('is_operator = 0 AND team_id = ?', $this->team_id)));
    }
}

?>