<?php

class Admin extends ActiveRecord\Model
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
}

?>