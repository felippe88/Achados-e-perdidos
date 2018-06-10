<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
    $usuarios = \DB::select('select * from usuarios where matricula IN (select matricula from objetos)');
    
    $objetos = \DB::table('objetos')->get();
    return view('home',compact('objetos'),compact('usuarios'));
        
        
    }
    
    
    
    

    
     public function painel()
    {
        echo "painel usuario";
        
        
    }
    
    
    
    public function login(Request $request)
    {
        print_r($request->input());
        $matricula = $request->input('matricula');
        $senha = $request->input('senha');
        $data = \DB::select('select matricula from usuarios where matricula=? and senha=?' , [$matricula,$senha]);
        if(count($data))
        {
            
            session(['matricula' => $request->matricula]); 
            return view('painel');
            
        }else{
            return view ('home');
        }
        
    }
    

    
   
    
    
    
}
