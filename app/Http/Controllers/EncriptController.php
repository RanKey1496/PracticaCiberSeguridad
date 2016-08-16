<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Response;

class EncriptController extends Controller
{

    public function clasica(){
    	dd("clasica");
    }

    public function des(){
        return view('des');
    }

    public function tripledes(){
    	return view('tripledes');
    }

    public function aes(){
    	return view('aes');
    }

    public function despostEncript(Request $request){
        $start = microtime(true);
        $iv = '3qM2VxF7';
        $string = Input::get('string');
        $password = Input::get('salt');
        $method = "des-cbc";
        $encrypted = openssl_encrypt($string, $method, $password, 0, $iv);
        
        $end = microtime(true);
        $final = $end - $start;
        return Response::json(array('result' => $encrypted, 'time' => $final . ' segundo sensuales :V', 'iv' => $iv));
    }

    public function despostDesencript(Request $request){
        $start = microtime(true);
        $iv = '3qM2VxF7';
        $string = Input::get('string');
        $password = Input::get('salt');
        $method = "des-cbc";
        $decrypted = openssl_decrypt($string, $method, $password, 0, $iv);
        
        $end = microtime(true);
        $final = $end - $start;
        return Response::json(array('result' => $decrypted, 'time' => $final . ' segundo sensuales :V', 'iv' => $iv));
    }

    public function tripledespostEncript(){
        $start = microtime(true);
        $iv = '3qM2VxF7';
        $string = Input::get('string');
        $password = Input::get('salt');
        $method = "des-ede3-cbc";
        $encrypted = openssl_encrypt($string, $method, $password, 0, $iv);
        
        $end = microtime(true);
        $final = $end - $start;
        return Response::json(array('result' => $encrypted, 'time' => $final . ' segundo sensuales :V', 'iv' => $iv));
    }

    public function tripledespostDesencript(){
        $start = microtime(true);
        $iv = '3qM2VxF7';
        $string = Input::get('string');
        $password = Input::get('salt');
        $method = "des-ede3-cbc";
        $decrypted = openssl_decrypt($string, $method, $password, 0, $iv);
        
        $end = microtime(true);
        $final = $end - $start;
        return Response::json(array('result' => $decrypted, 'time' => $final . ' segundo sensuales :V', 'iv' => $iv));
    }

    public function aespostEncript(Request $request){
        $start = microtime(true);
        $iv = 'eyJpdiI63qM2VxF7';
        $string = Input::get('string');
        $password = Input::get('salt');
        $method = "aes-128-cbc";
        $encrypted = openssl_encrypt($string, $method, $password, 0, $iv);
        
        $end = microtime(true);
        $final = $end - $start;
        return Response::json(array('result' => $encrypted, 'time' => $final . ' cuñados llorando :V', 'iv' => $iv));
    }

    public function aespostDesencript(Request $request){
        $start = microtime(true);
        $iv = 'eyJpdiI63qM2VxF7';
        $string = Input::get('string');
        $password = Input::get('salt');
        $method = "aes-128-cbc";
        $decrypted = openssl_decrypt($string, $method, $password, 0, $iv);
        
        $end = microtime(true);
        $final = $end - $start;
        return Response::json(array('result' => $decrypted, 'time' => $final . ' cuñados llorando :V', 'iv' => $iv));
    }
}
