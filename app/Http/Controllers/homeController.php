<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Support\Facades\Cookie;
use App\userTable;
use App\couponTable;
use App\mien;
use App\contact;
use App\gallerytable;
use App\slider;
use App\tinh;
use App\tintucTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $showOneNews=tintucTable::join('user','news.id_user','=','user.id_user')->orderby('id_news','desc')->limit(2)->get();
        $showMien=mien::all();
        return view('front-end/home',['showMien'=>$showMien,'showOneNews'=>$showOneNews]);
    }
}
