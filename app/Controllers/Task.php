<?php

namespace App\Controllers;

class Task extends BaseController
{
    public function index()
    {
        $count = 10;
        $Numbers = $this->generateNumbers($count);
        $arrangedNumbers = $this->arrangeNumbers($Numbers);
        return view('task_view', ['numbers' => $arrangedNumbers]);
    }

    function generateNumbers($count) {
        $number = range(1, $count);
        shuffle($number);
        return $number;
    }

    function arrangeNumbers($numbers) {
        $rows = [];
        $row = [];
        $rowCount = 1;
        foreach ($numbers as $num) {
            $row[] = $num;
            if (count($row) === $rowCount) {
                $rows[] = $row;
                $row = [];
                $rowCount++;
            }
        }
        return $rows;
    }




}
