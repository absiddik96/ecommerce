<?php

class User_working_zone_m extends MY_Model
{
    protected $_table_name = 'User_working_zones';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    public function add_working_zone($user_id='')
    {
        $this->data = [
            'user_id'  => $user_id,
            'store_id' => $this->input->post('working_zone'),
        ];

        if ($this->save($this->data)) {
            return true;
        }else{
            return false;
        }
    }

}

?>
