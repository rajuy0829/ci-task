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
        $asc = [];
        $numbers = [];
        $maxRows = $num;
        for ($i = 1; $i <= $maxRows; $i++) {
            $ascRow = [];
            $ascRow[] = $i;
            for ($j = 1; $j < $i; $j++) {
                if($i<3){
                    $ascRow[] = $ascRow[0] + $maxRows * $j+1;
                }else if($i==3){
                    $ascRow[] = $ascRow[0] * $j+$i;
                }else if($i==4){
                    if($j<2){
                        $ascRow[] = $j*$i+1;
                    }else{
                        if($j ==2){
                            $ascRow[] = $j*$i;
                        }else{
                            $ascRow[] = $j*$i-2; 
                        }
                    }
                    
                }                   
                
            }
            $numbers[] = $ascRow;
        }
       return $numbers;
    }

}
