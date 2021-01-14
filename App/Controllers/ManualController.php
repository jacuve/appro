<?php
namespace App\Controllers;

use App\Models\Manual;
use League\Plates\Engine;

class ManualController extends Controller
{

    public function edit ()
    {
        echo $this->templates->render('sections/manual_edit',[
            'manual' => $manual,
            'errors' => $errors,
            'data' => $data,
            'msg' => $msg ?? ''
        ]);
    }
     
}
