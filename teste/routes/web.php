<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/seunome/{nome?}',function($nome=null){
    if(isset($nome)){
        echo "Olá!! sejabenvindo, $nome !";    
    }
    else{
        echo "Você não digitou nenhum nome!";
    }
});

Route::get('/rotacomregras/{nome}/{n}',function($nome, $n){
    for($i=0;$i<$n;$i++){
        echo "Olá!! sejabenvindo, $nome !";
        echo "<br>";
    }
    
})->where('nome','[A-Za-z]+')
->where('n','[0-9]+');


Route::prefix('/app')->group(function(){
    Route::get('/', function(){
        return view('app');
    });

    Route::get('/user', function(){
        return view('user');
    });

    Route::get('/profile', function(){
        return view('profile');
    });

});


$url = "http://prova.123milhas.net/api/flights";
$voos = file_get_contents($url);
$objeto = json_decode($voos);
var_dump($objeto[0]);
echo "<br>";
echo "<br>";

$b = array(); // novo array

foreach($objeto as $a){
    echo "ID   ".$a->id."    ";
    echo "Compahia   ".$a->cia."    ";
    echo "Preço   ".$a->price."    ";
    echo "Ida   ".$a->outbound."    ";
    echo "Volta   ".$a->inbound."    ";
    echo "Tarifa   ".$a->fare."<br><br><br>";
    
}

var_dump($a);
