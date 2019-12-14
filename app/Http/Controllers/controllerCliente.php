<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class controllerCliente extends Controller
{
    //cadastrar cliente
    public function save(Request $request)
    {
        $testeRetorno = "Criado com sucesso!";
        //dd($request);
        Cliente::create($request->all());
        // $cliente = new Cliente();
        //$cliente->fill($request->all());
        //$cliente->save();
        return response()->json($testeRetorno, 200);
    }

    //atualizar cliente
    public function update(Request $request, $id)
    {
        $testeRetorno = "Atualizado com sucesso!";
        // obtém todos os dados do nosso carro
        $cliente = Cliente::find($id);

        $clienteData = array_filter($request->all());
        // atualiza esse carro
        //preenche os valores que vem do banco de dados
        $cliente->fill($clienteData);
        $cliente->save();
        return response()->json($testeRetorno, 200);
    }

    //lista cliente
    public function index()
    {
        $clientes = Cliente::get();
        return response()->json($clientes, 200);
    }

    //deletar cliene
    public function apagar($id)
    {
        $testeRetorno = "Apagado com sucesso!";
        $cliente = Cliente::find($id);
        $cliente->delete();
        return response()->json($testeRetorno, 200);
    }
}
