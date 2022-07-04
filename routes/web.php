<?php

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Query\Builder;
use App\Http\Controllers\UserController;
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
// dd($users);
Route::match(['get', 'post'], '/test', function () {
    $users = User::select('name')->get();
    dd($users);
});
Route::get('users' , function(){
    $users = User::with('employees');
    dump($users);

    $users = User::all();

    foreach ($users as $user){
        echo $user->name . "<br>";
    }
//    dd($user1);
// $users = $query->addSelect('email')->get();
    // $users = DB::table('users')->select('status')->distinct()->get();
    // $users = User::get();
    // if(User::where('status',1)->exists()){
    //     foreach($users as $user){
    //         return $user;
    //     }
    // }
    // dd($users);
    // foreach($users as $user){
    //     return $user;
    //     dd($user);
    // }
    // $users = User::findOrFail(6)->employees;
//dd($users);

});
Route::get('user',function(Builder $builder){
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

// $users = DB::table('users')
//                 ->where('id','2')
//                 ->update(['name' => 'Tariq Ahmad', 'email'=>'chtariq144@gmail.com']);
// dd($users);

$request=Carbon::today();
dd(Carbon::createFromFormat('Y-m-d H:i:s', $request)->toString());
dd(Carbon::today()->isoFormat(' MMMM Do YYYY, h:mm'));





$users = DB::table('users')->where('status',0)
        ->chunk(10, function($users){
            foreach($users as $user){
                DB::table('users')
                ->where('status',$user->status)
                ->update('status',1);
            }
        })->dd();
});
