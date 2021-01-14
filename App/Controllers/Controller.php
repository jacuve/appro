<?php
namespace App\Controllers;

use App\Models\Manual;
use League\Plates\Engine;

class Controller
{
    protected $templates;

    public function __construct()
    {
        $this->templates = new Engine('../views');
    }

}
