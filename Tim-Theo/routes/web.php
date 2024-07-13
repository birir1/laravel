<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    // dd('sospeter');

    //fetch all users
     //$users = DB::select("select * from users");
     //$users = DB::select("select * from users where email=?", ['sospeterbirir1@gmail.com']);

     // create new user
    //  $users= DB::insert('insert into users (name,email,password) values (?,?,?)',[
    //     'Timothy',
    //     'timothy@yahoo.com',
    //     'password',
    //  ]);

    // update users
    //  dd($users);
    // $user = DB::update("update users set email=? where id=?", [
    //     'timothy@gmail.com',
    //     '4',
    // ]);

    //delete users
    // $user = DB::delete("delete from users where id=3");


    // THE QUERY BUILDER
    // $users = DB::table('users')->where('id', 2)->get();

    // CREATE NEW USER 
    // $user = DB::table('users')->insert([
    //     'name' => 'Patricia Birir',
    //     'email' => 'patricia@gmail.com',
    //     'password' => '38541063',

    // ]);
    //dd($users);

    //ELOQUENT
    
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';