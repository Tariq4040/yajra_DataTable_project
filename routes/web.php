<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Contracts\Database\Query\Builder;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('user',function(){
    // dd(DB::table('users')->select('updated_at',DB::raw('count(*)'))->groupBy('updated_at')->get()->value('name'));
    // $user = DB::table('users')
    //             ->get()
    //             ->groupBy('updated_at','count(*) as total')
    //             ->dd();
    // dd($user);
// dd(User::where('status',1)->get());
    // $users = DB::table('users')
    //         ->select('*')
    //         ->where('id', '>', 11)
    //         ->Where(function($query) {
    //             if(User::where('status',0)){
    //                 $query->orwhere('name', 'like','%Mi%');
    //             }
    //         })->get();
    //         dd($users);

    // $users = DB::table('users')
    //         ->select('name', 'email')
    //         ->whereNot('id', '>', 11)
    //         ->where('name','like','Dr%')
    //         ->get();
    //         dd($users);

    // $users = DB::table('users')
    //         ->whereDate('created_at','2022-06-14')
    //         ->whereDay('created_at','14')
    //         ->whereMonth('created_at','06')
    //         ->whereYear('created_at','2022')
    //         ->whereTime('created_at','09:21:45')
    //         ->get();
    //         dd($users);

    // where column normally7 used for compairing two different column of same table
    // $users = DB::table('users')
    // ->whereColumn('created_at','!=','updated_at')
    // ->get();
    //         dd($users);

// $users = DB::table('users')->select('name','email')
//     ->where('id','<','11')
//     ->where(function($builder){
//         $builder->where('name' , 'like'  , '%Dr%');
//     })
//     ->get();
//     dd($users);

// $users = DB::table('users')->select('name','email')
// // ->whereExists(function($builder){
// //     $builder->where('email', DB::raw('count (*) as total User')->groupBy('created_at'));
// // })
// ->get();
// dd($users);

// $users = User::select('name',DB::raw('count(*) as total member'))->orderBy('name','desc')
// ->get();
// dd($users);


// $users = User::select('*')->orderBy('name','desc')->oldest()->limit(5)
// ->get();
// $users = DB::table('users')->whereBetween('id' ,[11,16])->where('status','0')->get();

$users = DB::table('users')
                ->offset(10)
                ->limit(5)
                ->get();
dd($users);
});
