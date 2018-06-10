<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Usuarios;

class CadastroController extends Controller
{
    
    private $usuario;
    
    public function __construct(Usuarios $usuario)
    {
        $this->usuario = $usuario;
    }
    
    public function getIndex(){ 
        
        return view('cadastro');
            
             } 
             
             
             
    public function createUser(Request $request){
      $usuario = new usuarios();
      $usuario = $usuario->create($request->all());
      
      \Session::flash ('mensagem_sucesso', 'Usuario Cadastrado com sucesso!!');
      
      return view('cadastro');
      
      
      ///Forma de fazer sem a model:
      /* $insert = $this->usuario->insert([
        'matricula' =>    $_POST['matricula'],
        'nome' =>         $_POST['nome'],
        'email' =>        $_POST['email'],
        'senha' =>        $_POST['senha']
            
            ]);
            
        if($insert)
            return 'inserido com sucesso!!';
        else
            return 'falha ao inserir';*/
    }
}
