<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Objetos;

class ObjetosController extends Controller
{
    
    private $objeto;
    
    public function __construct(Objetos $objeto)
    {
        $this->objeto = $objeto;
    }
    

    public function getPainel()
    { 
        if (session()->has('usuario')){
        dd(session()->all());
        return view('painel');
        }else{
            return view('home');
        }
    } 
    
        public function logout()
    { 
        session()->flush();
        return view('home');
            
    }
    
    public function store(Request $request)
{
  
   
    
    
    
    
}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
            
             
             
    public function createObj(Request $request){
     
      /*$objeto = new objetos();
      $objeto = $objeto->create($request->all());
      */
        // Define o valor default para a variável que contém o nome da imagem 
    $nameFile = null;
 
    // Verifica se informou o arquivo e se é válido
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
         
        // Define um aleatório para o arquivo baseado no timestamps atual
        $name = $request->session()->get('matricula')."_".$request->image->getClientOriginalName() ;
 
        // Recupera a extensão do arquivo
        $extension = $request->image->extension();
 
        // Define finalmente o nome
        $nameFile = "{$name}.{$extension}";
 
        // Faz o upload:
        $upload = $request->image->storeAs('imagens', $nameFile,'imagens');
        // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
 
        // Verifica se NÃO deu certo o upload (Redireciona de volta)
        if ( !$upload )
            return redirect()
                        ->back()
                        ->with('error', 'Falha ao fazer upload')
                        ->withInput();
 
    }
      
     
      if(!$request->file('image')->isValid())
      echo "imagem invalida!";
      
      
     // Forma de fazer sem a model:
       $insert = $this->objeto->insert([
        'matricula'  => session()->get('matricula'),
        'nome' =>    $request->nome,
        'descricao' =>         $request->descricao,
        'imagem' =>        "imagens/".$nameFile
        
            
            ]);
            
     
        \Session::flash ('mensagem_sucesso', 'Objeto Cadastrado com sucesso!!');
      
         return view('painel');
            
    }
}
