<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PointService;

class PointController extends Controller
{
    //
    public function __construct(PointService $service)
    {
      // $this->middleware('auth');
      $this->service = $service;
    }
    public function index(){
      $list = $this->service->all();
      return view('ConfigPoint',[
        "point" => $list
      ]);
    }
}
