<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;


class PanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }




}
