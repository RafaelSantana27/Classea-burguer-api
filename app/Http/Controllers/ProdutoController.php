<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Services\ApiResponse;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todos produtos da base de dados
        return ApiResponse::sucesso(Produto::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar o produto
        $validacao = $request->validate(
            [
                'nome' => 'required|string|min:3|max:100',
                'descricao' => 'nullable|string|max:1000',
                'preco' => 'required|numeric|min:0.01',
                'categoria_id' => 'required|exists:categorias,id',
                'imagem' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'ativo' => 'required|boolean',
            ],
            [
                // nome
                'nome.required' => 'O nome do produto é obrigatório.',
                'nome.string' => 'O nome do produto deve ser um texto válido.',
                'nome.min' => 'O nome do produto deve ter no mínimo 3 caracteres.', 
                'nome.max' => 'O nome do produto não pode ter mais que 100 caracteres.', 
                
                // descricao
                'descricao.string' => 'A descrição do produto deve ser um texto válido.',
                'descricao.max' => 'A descrição do produto não pode ter mais que 1000 caracteres.',

                // preco
                'preco.required' => 'O preço do produto é obrigatório.',
                'preco.numeric' => 'O preço deve ser um número válido.',
                'preco.min' => 'O preço deve ser maior que zero.',

                // categoria_id
                'categoria_id.required' => 'A categoria é obrigatória.',
                'categoria_id.exists' => 'A categoria selecionada não existe.',

                // imagem
                'imagem.image' => 'O arquivo deve ser uma imagem válida.',
                'imagem.mimes' => 'A imagem deve estar no formato: jpg, jpeg ou png.',
                'imagem.max' => 'A imagem não pode ter mais que 2MB.',

                // ativo
                'ativo.required' => 'O campo "ativo" é obrigatório.',
                'ativo.boolean' => 'O campo "ativo" deve ser verdadeiro ou falso (true ou false).',
            ]
        );

        $validacao['imagem'] = $this->uploadImagem($request);


        // Add novo Produto na base de dados
        // $produto = Produto::create($request->all());
        $produto = Produto::create($validacao);

        return ApiResponse::sucesso($produto, 'Produto cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Exibir um Produto em especifico
        $produto = Produto::Find($id);

        if($produto) {
            return ApiResponse::sucesso($produto);
        } else {
            return ApiResponse::erro('Produto não encontrado');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // Deletar uma Categoria
        $produto = Produto::Find($id);

        if($produto) {
            $produto->delete();
            return ApiResponse::sucesso($produto, 'Produto deletado com sucesso!');
        } else {
             return ApiResponse::erro('Produto não encontrado');
        }
    }

    private function uploadImagem($request)
    {
        $imagemUrl = null;

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            
            $requestImagem = $request['imagem'];
            $nomeImagem = $requestImagem->getClientOriginalName();
            $extensaoImagem = $requestImagem->extension();

            $novaImagem = md5(uniqid() . $nomeImagem) . '.' . $extensaoImagem;

            $requestImagem->move(public_path('img/cardapio/'), $novaImagem);

            $imagemUrl = $novaImagem;
        }
        
        return $imagemUrl;
    }
}
