<?php

namespace App\Controllers;

class Task extends BaseController
{
    public function index()
    {
        $data['numbers'] = [[1],[2,7],[3,6,9],[4,5,8,10]];
        return view('task_view', $data);
        //$this->load->view('task_view', $data);
    }


}
