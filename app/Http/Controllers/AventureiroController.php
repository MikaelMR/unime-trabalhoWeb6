<?php

/*
* União Metropolitana de Educação e Cultura
* Bacharelado em Sistemas de Informação
* Programação Orientada a Objetos II
* Prof. Pablo Ricardo Roxo Silva
* Mikael Magalhães Ramos
*/

namespace App\Http\Controllers;

use App\Http\Requests\StoreAventuRequest;
use App\Http\Requests\UpdateAventuRequest;
use App\Models\Aventureiro;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class AventureiroController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $value = $request->value;

        $order_by = $request->order_by;
        $order = $request->order === 'desc'
            ? 'desc'
            : 'asc';

        $colunas = ['nome', 'raca', 'idade', 'classe', 'nivel'];

        $aventureiros = Aventureiro::select(['*'])
            ->when($search && in_array($search, $colunas) && $value, function ($query) use ($search, $value) {
                $query->where($search, 'like', '%' . $value . '%');
            })
            ->when($order_by && in_array($order_by, $colunas), function ($query) use ($order_by, $order) {
                $query->orderBy($order_by, $order);
            })
            ->get();

        return response()->json($aventureiros);
    }

    public function show($id)
    {
        $aventureiro = Aventureiro::findOrFail($id);
        //SELECT * FROM aventureiro WHERE id = $id
        return response()->json($aventureiro);
    }

    public function store(Request $request)
    {
        $dados = $request->all();

        $validator = Validator::make($dados, (new StoreAventuRequest())->rules());
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $aventureiro = Aventureiro::create($dados);
        //INSERT INTO aventureiros (nome, raca, idade, classe, nivel) VALUES ('$dados->nome', '$dados->raca', '$dados->idade', '$dados->classe', '$dados->nivel')
        return response()->json($aventureiro, 201);
    }

    public function update(Request $request, $id)
    {
        $dados = $request->all();

        $validator = Validator::make($dados, (new UpdateAventuRequest())->rules());
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        Aventureiro::findOrFail($id)->update($dados);
        //UPDATE aventureiros SET nome = '$request->nome', raca = '$request->raca, idade = '$request->idade, classe = '$request->classe, nivel = '$request->nivel' WHERE id = $id
        return $this->show($id);
    }

    public function destroy($id)
    {
        Aventureiro::findOrFail($id)->delete();
        //DELETE FROM aventureiros WHERE id = $id
        return response()->json('', 204);
    }
}
