<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditTask;
use App\Models\Folder;
use App\Models\Task;
use App\Http\Requests\CreateTask;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home/index');
    }


}