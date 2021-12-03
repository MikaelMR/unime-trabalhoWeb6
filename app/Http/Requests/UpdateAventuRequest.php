<?php

/*
* União Metropolitana de Educação e Cultura
* Bacharelado em Sistemas de Informação
* Programação Orientada a Objetos II
* Prof. Pablo Ricardo Roxo Silva
* Mikael Magalhães Ramos
*/

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAventuRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => [
                'required',
                'max:40',
            ],
            'raca' => [
                'required',
                'max:20',
            ],
            'idade' => [
                'required',
            ],
            'classe' => [
                'required',
                'max:20',
            ],
            'nivel' => [
                'required',
            ],
        ];
    }
}
