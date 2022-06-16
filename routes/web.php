<?php

use Illuminate\Support\Facades\Route;
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

Route::get('user',function(){
    // dd(DB::table('users')->select('updated_at',DB::raw('count(*)'))->groupBy('updated_at')->get()->value('name'));
    $user = DB::table('users')
                ->get()
                ->groupBy('updated_at','count(*) as total')
                ->dd();
    dd($user);
});
