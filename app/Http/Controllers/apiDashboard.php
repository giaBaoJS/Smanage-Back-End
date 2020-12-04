<?php

namespace App\Http\Controllers;
use App\UserTable;
use App\contact;
use App\couponTable;
use App\doitacTable;
use App\tintucTable;
use App\gallerytable;
use App\bill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Mail;
use Session;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\Count;

class apiDashboard extends Controller
{
    function addAccount(Request $request)
    {
        $getEmail=UserTable::where('email','=',$request->email)->get();
        if (count($getEmail)>0) {
            return 1;
        }else{
            $data=[
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'phone'=>$request->phone,
                'address'=>$request->address,
            ];
            UserTable::create($data);
            return 0;
        }
    }
    public function addUser(Request $request)
    {
        $getEmail=UserTable::where('email','=',$request->email)->get();
        if (count($getEmail)>0) {
            return 1;
        }else{
            if ($request->role==1) {
                $id_doitac=$request->id_doitac;
            }else{
                $id_doitac=0;
            }
            $data=[
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'phone'=>$request->phone,
                'address'=>$request->address,
                'id_doitac'=>$id_doitac,
                'gender'=>$request->gender,
                'role'=>$request->role,
                'active'=>$request->active,
            ];
            UserTable::create($data);
            return 0;
        }

    }
    function updateUser(Request $request)
    {
        // $getEmail=UserTable::where('email','=',$request->email)->get();
        // if (count($getEmail)>0) {
        //     return 1;
        // }else{

        // }
        $showOneUser=UserTable::find($request->id_user);
        $showOneUser->name=$request->name;
        $showOneUser->email=$request->email;
        if ($request->password!="") {
            $showOneUser->password=bcrypt($request->password);
        }
        $showOneUser->phone=$request->phone;
        $showOneUser->address=$request->address;
        $showOneUser->id_doitac=$request->id_doitac;
        $showOneUser->gender=$request->gender;
        $showOneUser->role=$request->role;
        $showOneUser->active=$request->active;
        $showOneUser->save();
        return 0;
    }
    public function loginLock(Request $request)
    {

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($data)) {
            if (Auth::check()) {
                if (Auth::check()) {
                    session(['account' => Auth::user()]);
                    return 1;
                }
            }
        } else {
            return 0;
        }
    }
// ----contact
    public function deleteContact($id)
    {
        contact::find($id)->delete();
        return 1;
    }
// ----contact
    public function oneCounpon($id)
    {
        if (session('account')->role==1) {
        $showOneCoupon=couponTable::join('doitac', 'coupon.id_doitac', '=', 'doitac.id_doitac')->where('coupon.id_coupon','=',$id)->first();
        }else{
        $showOneCoupon=couponTable::join('user', 'coupon.id_user', '=', 'user.id_user')->where('coupon.id_coupon','=',$id)->first();
        }
        return $showOneCoupon;
    }
//------Đối tác
    public function doiTac()
    {
        $showDoitac=doitacTable::all();
        return response($showDoitac,200);
    }

    public function returnLogin(Request $request)
    {
        Auth::logout();
        $request->session('account')->flush();
        $email = Cookie::forget('email');
        $password = Cookie::forget('password');
        return response()->json([
            "message"=>"logout"
        ],201)->withCookie($email)->withCookie($password);
    }
    public function setPremium()
    {
        $showUser=UserTable::all();
        for ($i=0; $i < count($showUser); $i++) {
            $dayEnd = strtotime( Carbon::now());
            $dayStart =strtotime($showUser[$i]['created_at']);
            $dayDiff=floor(($dayEnd-$dayStart)/(60*60*24));
            if ($dayDiff>=7 && $showUser[$i]['active']==1) {
                $user=UserTable::find($showUser[$i]['id_user']);
                $user->active=0;
                $user->save();
            }
        };
        $showCoupon=couponTable::all();
        for ($y=0; $y < count($showCoupon); $y++) {
            if ($showCoupon[$y]['quantity']==0) {
                $showCouponDt=couponTable::find($showCoupon[$y]['id_coupon']);
                  $showCouponDt->status=0;
                  $showCouponDt->save();
            }
            $date_start = explode("-", $showCoupon[$y]['date_start']);
            $dayEnd = strtotime(date('m/d/Y',strtotime(Carbon::now())));
            $dayStart =strtotime(date('d/m/Y',strtotime($date_start[1])));
            return $dayStart;
        }

    }
    // coupon -----------------

    public function delCoupon($id)
    {
        couponTable::find($id)->delete();
        return 1;
    }
    public function chart()
    {
        $showBill=bill::where('id_doitac','=',session('account')->id_doitac)->get();
        $day1=0;
        $day2=0;
        $day3=0;
        $day4=0;
        $day5=0;
        $day6=0;
        $day7=0;
        $day8=0;
        $day9=0;
        $day10=0;
        $day11=0;
        $day12=0;
        foreach ($showBill as $t) {
            $dayStart =date('m',strtotime($t->created_at));
            if ($dayStart==1) {
                $day1=$day1+$t->total_price;
            }
            if ($dayStart==2) {
                $day2=$day2+$t->total_price;
            }
            if ($dayStart==3) {
                $day3=$day3+$t->total_price;
            }
            if ($dayStart==3) {
                $day3=$day3+$t->total_price;
            }
            if ($dayStart==4) {
                $day4=$day4+$t->total_price;
            }
            if ($dayStart==5) {
                $day5=$day5+$t->total_price;
            }
            if ($dayStart==6) {
                $day6=$day6+$t->total_price;
            }
            if ($dayStart==7) {
                $day7=$day7+$t->total_price;
            }
            if ($dayStart==8) {
                $day8=$day8+$t->total_price;
            }
            if ($dayStart==9) {
                $day9=$day9+$t->total_price;
            }
            if ($dayStart==10) {
                $day10=$day10+$t->total_price;
            }
            if ($dayStart==11) {
                $day11=$day11+$t->total_price;
            }
            if ($dayStart==12) {
                $day12=$day12+$t->total_price;
            }
        }
        $chart=[
            '1'=>$day1,
            '2'=>$day2,
            '3'=>$day3,
            '4'=>$day4,
            '5'=>$day5,
            '6'=>$day6,
            '7'=>$day7,
            '8'=>$day8,
            '9'=>$day9,
            '10'=>$day10,
            '11'=>$day11,
            '12'=>$day12,
        ];
        return $chart;
    }
    // coupon -----------------
    // coupon -----------------

    public function delgallery($id)
    {
        gallerytable::find($id)->delete();
        return 1;
    }
    public function editgallery($id)
    {
       $showGallery= gallerytable::find($id);
        return $showGallery;
    }

    // coupon -----------------
    // tin tức -----------------

    public function delNews($id)
    {
        tintucTable::find($id)->delete();
        return 1;
    }

    // tin tức -----------------
    //COUPON
    public function checkNameCoupon(Request $request)
    {
        $showCoupon=couponTable::where('code_coupon','=',$request->code_coupon)->get();
        if(count($showCoupon)>0){
            return 1;
        }else{
            $data = array(
                'id_user' => $request->id_user,
                'id_doitac' => $request->id_doitac,
                'code_coupon' => $request->code_coupon,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'date_start' => $request->date_start,
                'status' => 1,
    
            );
            couponTable::create($data);
            return 0;
        }
    }

}



