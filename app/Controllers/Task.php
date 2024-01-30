<?php

namespace App\Controllers;

class Task extends BaseController
{
    
    
    public function index() {   
        
        $data['numbers'] = ''; 
        return view('task_view', $data);

    }
    public function generatenum()
    {
        if ($_POST) {
            $num = $_POST['num'];
            $data['numbers'] = $this->generateNumbers($num);
        } else {
            $data['numbers'] = '';
        }
        print_r(json_encode($data));
    }

    private function generateNumbers($num)
    {        
        $numbers = [];
        $maxRows = 4; 
        for ($i = 1; $i <= $maxRows; $i++) {
            $row = [];
            if ($i == 1) {
                $row[] = 1;
            } else if ($i == 2){
                $row[] = $i;
                $row[] = $i * 3 + 1;
            } else if($i == 3) {
                $row[] = $i;
            }else if($i == 4) {
                $row[] = $i;
                $row[] = $i + 1;
            } 
            if ($i > 2) {
                for ($j = 3; $j <= $i + 1; $j++) {
                    $row[] = $i * $j-3;
                }
            }
            $numbers[] = $row;
        }
        return $numbers;
        // $ascending = [];
        // $descending = [];
        
        // foreach ($n as $num) {
        //     if ($num % 2 == 0) {
        //         $descending[] = $num;
        //     } else {
        //         $ascending[] = $num;
        //     }
        // }
        // sort($ascending);
        // rsort($descending);
        // $pattern = [];
        // while (!empty($ascending) || !empty($descending)) {
        //     if (!empty($ascending)) {
        //         $pattern[] = array_shift($ascending);
        //     }
        //     if (!empty($descending)) {
        //         $pattern[] = array_shift($descending);
        //     }
        // }

        // return $pattern;
    }

}
