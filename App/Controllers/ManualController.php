<?php
namespace App\Controllers;

use App\Models\Manual;
use League\Plates\Engine;

class ManualController extends Controller
{

    public function single($slug)
    {
        $manualModel = new Manual;
        $manual = $manualModel->get($slug);
        if(is_null($manual)){
            open404Error();
            exit;
        }
        echo $this->templates->render('sections/manual_single',[
            'manual' => $manual
        ]);
    }

    public function search()
    {
        
    }

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
