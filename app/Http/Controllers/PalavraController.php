<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Palavra;
use Input;

class PalavraController extends Controller
{
    public function traduzir(Request $request)
    {
        if($request->input('significado') == null){
            $palavra = Palavra::where('palavra', '=', $request->input('palavra'))->first();
            if($palavra == null){
                return redirect('/')->with('mensagem','Não achei!');
            }
            $palavra->relevancia++;
            $palavra->save();
            return view('index', array('palavra'=> $palavra));
            //return redirect('/')->with('resposta','');
        }
        else{
            $palavra = Palavra::updateOrCreate(
                ['palavra'=> $request->input('palavra')],
                ['significado'=> $request->input('significado')]
            );
            $palavra->relevancia++;
            $palavra->save();
            return redirect('/');
        }
    }
}
