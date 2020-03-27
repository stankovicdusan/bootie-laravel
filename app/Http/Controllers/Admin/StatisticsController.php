<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistics;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index(){
        $model = new Statistics();

        $infos = $model->getAll();

        return view("admin.pages.statistics", [
            'infos' => $infos
        ]);
    }
}
