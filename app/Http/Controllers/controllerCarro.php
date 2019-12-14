<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Carro;

class controllerCarro extends Controller
{
    //cadastrando
    public function save(Request $request)
    {
        $testeRetorno = "Cadastrado com sucesso!";
        //dd($request);
        //Carro::create($request->all());
        //instancia novo objeto
        $carro = new Carro();
        //preecher no model
        $carro->fill($request->all());
        //salva
        $carro->save();
        return response()->json($testeRetorno, 200);
    }

    //atualizar
    public function update(Request $request, $id)
    {
        $testeRetorno = "Atualizado com sucesso!";
        // obtém todos os dados do nosso carro
        $carro = Carro::find($id);

        $carroData = array_filter($request->all());
        // atualiza esse carro
        $carro->fill($carroData);
        $carro->save();
        return response()->json($testeRetorno, 200);
    }

    //lista carros
    public function index()
    {

        $carros = Carro::get();
        return response()->json($carros, 200);
    }

    //deletar carro
    public function apagar($id)
    {
        $testeRetorno = "Apagado com sucesso!";
        $carro = Carro::find($id);
        $carro->delete();
        return response()->json($testeRetorno, 200);
    }
}
