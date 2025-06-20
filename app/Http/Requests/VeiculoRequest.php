<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VeiculoRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() && auth()->user()->role == 2; //Verifica se o usuario esta autenticado e se ele é um adimin
    }

    public function rules() //Define as validaçoes que o codigo deve respeitar
    {
        $veiculoId = $this->route('veiculo') ? $this->route('veiculo')->id : null;

        return [
            'placa' => [
                'required', //É um campo obrigatorio
                'regex:/^[A-Z]{3}[0-9]{4}$/', //Regex para validar o formato da placa;
                Rule::unique('veiculos', 'placa')->ignore($veiculoId),
            ],

            'renavam'=> [
                'required',
                'numeric', //Deve ser numerico
                'digits_between:9,11', //Numero de digitos deve estar entre 'BETWEEN' 9-11 digitos
                Rule::unique('veiculos', 'renavam')->ignore($veiculoId),       
            ],
            
            'modelo' => [
                'required',
                'string',
                'max:100',
                'regex:/[a-zA-Z]/'
            ],

            'marca' => [
                'required',
                'string',
                'max:100',
                'regex:/[a-zA-Z]/'
            ],

            'ano' => [
                'required',
                'digits:4',
                'integer',
                'min:1900',
                'max:' . date('Y')  // Define o ano limite como o atual
            ],

            'proprietario_id' => [
                'required',
                'exists:users,id', //Necessita que o ususario já exita no banco
            ],
        ];
    }

    public function messages() 
    {
        return [
            //Mensagens de erros para a placa
            'placa.required' => 'A placa deve ser informada.',
            'placa.regex' => 'O formato da placa deve seguir o seguinte padrão ABC1234.',
            'placa.unique' => 'Esta placa já existe',

            //Mensagens de erros para o renavam
            'renavam.required' => 'O renavam deve ser informado.',
            'renavam.numeric' => 'O renavam deve conter apenas números.',
            'renavam.digits_between' => 'O renavam deve ter entre 9 e 11 dígitos.',
            'renavam.unique' => 'Este renavam já está cadastrado.',

            //Mensagens de erros para o modelo
            'modelo.required' => 'O modelo deve ser informado',
            'modelo.string' => 'Somente textos para o modelo',
            'modelo.max' => 'Máximo de 100 caracteres para o modelo',
            'modelo.regex' => 'Somente letras são aceitas para o nome do modelo',

            //Mensagens de erros para a marca
            'marca.required' => 'A marca deve ser informada',
            'marca.string' => 'Somente textos para a marca',
            'marca.max' => 'Máximo de 100 caracteres para a marca',
            'marca.regex' => 'Somente letras são aceitas para o nome da marca',

            //Mensagens de erros para o ano
            'ano.required' => 'O ano deve ser informado',
            'ano.digits' => 'O ano deve ter somente 4 digitos',
            'ano.min' => 'O ano deve ser no mínimo a partir de 1900',
            'ano.max' => 'O ano não pode ser maior que o ano atual.',

            //Mensagens de erros para o proprietario
            'proprietario_id.required' => 'O proprietário deve ser informado',
        ];
    }
}
