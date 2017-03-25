<?php

class Login_model extends Ion_auth_model {
    function __constructor() {
        parent::__constructor();
    }
    public function login($identity, $password, $remember=FALSE)
    {
        $this->trigger_events('pre_login');

        if (empty($identity) || empty($password))
        {
            $this->set_error('login_unsuccessful');
            return FALSE;
        }

        $this->trigger_events('extra_where');

        $query = $this->db->select($this->identity_column . ', taikhoan_id, matkhau')
            ->where($this->identity_column, $identity)
            ->limit(1)
            ->order_by('taikhoan_id', 'desc')
            ->get($this->tables['users']);

        if($this->is_time_locked_out($identity))
        {
            // Hash something anyway, just to take up time
            $this->hash_password($password);

            $this->trigger_events('post_login_unsuccessful');
            $this->set_error('login_timeout');

            return FALSE;
        }

        if ($query->num_rows() === 1)
        {
            $user = $query->row();

            $password = $this->hash_password_db($user->id, $password);

            if ($password === TRUE)
            {
                if ($user->active == 0)
                {
                    $this->trigger_events('post_login_unsuccessful');
                    $this->set_error('login_unsuccessful_not_active');

                    return FALSE;
                }

                $this->set_session($user);

                $this->update_last_login($user->id);

                $this->clear_login_attempts($identity);

                if ($remember && $this->config->item('remember_users', 'ion_auth'))
                {
                    $this->remember_user($user->id);
                }

                $this->trigger_events(array('post_login', 'post_login_successful'));
                $this->set_message('login_successful');

                return TRUE;
            }
        }

        // Hash something anyway, just to take up time
        $this->hash_password($password);

        $this->increase_login_attempts($identity);

        $this->trigger_events('post_login_unsuccessful');
        $this->set_error('login_unsuccessful');

        return FALSE;
    }
}
?>