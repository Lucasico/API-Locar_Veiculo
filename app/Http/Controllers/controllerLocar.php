<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locar;
use App\Cliente;
use App\Carro;
use Illuminate\Support\Facades\DB;

class controllerLocar extends Controller
{
    //salvar
    public function save(Request $request)
    {
        $retornoSucesso = "Criado com sucesso!";
        $retornoErroCliente = "Erro ao cadastrar, usuario nao encontrado!";
        $retornoErroCarro = "Erro ao cadastrar, carro nao encontrado!";
        $retornoErroLocar = "Erro ao cadastrar, carro ja locado!";

        //where == onde
        $cliente = DB::table('cliente')->where('cpf', '000000')->value('cpf');
        $carro = DB::table('carro')->where('placa', 'CAM321')->value('placa');
        $locar = DB::table('locar_carro')->where('carro_locado', 'CAM321')->value('carro_locado');

        if ($cliente == null || $carro == null || $locar != null) {
            if ($cliente == null) {
                return response()->json($retornoErroCliente, 200);
            }
            if ($carro == null) {
                return response()->json($retornoErroCarro, 200);
            }
            if ($locar != null) {
                return response()->json($retornoErroLocar, 200);
            }
        } else {
            //all == toda
            Locar::create($request->all());
            return response()->json($retornoSucesso, 200);
        }
    }
    //atualizar locar
    public function update(Request $request, $id)
    {
        $testeRetorno = "Atualizado com sucesso!";
        // obtém todos os dados do nosso carro, atraves do metodo find com
        //id igual ao desejado

        $locar = Locar::find($id);

        $locarData = array_filter($request->all());
        // atualiza esse carro
        $locar->fill($locarData);
        $locar->save();
        return response()->json($testeRetorno, 200);
    }

    //lista locar
    public function index()
    {
        $locacoes = Locar::get();
        return response()->json($locacoes, 200);
    }

    //deletar carro
    public function apagar($id)
    {
        $testeRetorno = "Apagado com sucesso!";
        $locar = Locar::find($id);
        $locar->delete();
        return response()->json($testeRetorno, 200);
    }
}
