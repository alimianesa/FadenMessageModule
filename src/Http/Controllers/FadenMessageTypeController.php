<?php

namespace App\Http\Controllers;

use Alive2212\LaravelSmartRestful\SmartCrudController;
use App\FadenMessageType;


class FadenMessageTypeController extends SmartCrudController
{
    public function initController()
    {
        $this->model  = new FadenMessageType();
    }


}
