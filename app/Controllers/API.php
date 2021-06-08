<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;


class API extends ResourceController
{
	public function TestAPI()
	{
		$query=$this->db->query('select * from users');
        echo json_encode($query->result());
	}
}
