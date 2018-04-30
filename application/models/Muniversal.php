<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/

class Muniversal extends Kominfo_model 
{
	
	public function __construct()
	{
		parent::__construct();

	}

	public function get_account_by_login($param=0)
    {
      return $this->db->get_where('users', array('id_user' => $param))->row();
    } 

}

