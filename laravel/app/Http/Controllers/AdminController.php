<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Admin;
use Request;
use Response;
use Input;
class AdminController extends Controller
{
	 public function index()
  {
    return Response::json(Admin::get());
  }


}