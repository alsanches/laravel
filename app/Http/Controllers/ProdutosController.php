<?php

namespace CursoLaravel\Http\Controllers;

use Illuminate\Http\Request;

use CursoLaravel\Http\Requests;

use CursoLaravel\Produtos;

class ProdutosController extends Controller
{
    protected $produtos, $request;

    public function __construct(Produtos $produtos, Request $request)
    {
        $this->produtos = $produtos;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = $this->produtos->paginate(15);
        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
//        dd($request->all());
//        dd($request->only(['cod','nome']));
//        dd($request->except(['enviar']));
//        return "cadastrando os dados do produto";

        $dadosForm = $this->request->all();

        $validator = validator($dadosForm, Produtos::$rules);

        if ($validator->fails()){
            return redirect('/produtos/create')
                ->withErrors($validator)
                ->withInput();
        }


            $insert = $this->produtos->create($dadosForm);
        if ($insert)
            return redirect('/produtos');
        else
            return "Erro ao cadastrar produto";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Recupera o produto para mostrar os detalhes.

        $produto = $this->produtos->find($id);

        return view('produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $produto = $this->produtos->find($id);

        return view('produtos.edit', compact('produto'));

//        return "Editando produto $id";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        // Regras para editar

        $rules =  [
            'cod'=>"required|numeric|min:3|unique:produtos,cod,{$id}",
            'nome'=>'required|min:5',
        ];
        $dadosForm = $this->request->all();
        $validator = validator($dadosForm, $rules);
        if ( $validator->fails())
        {
            return redirect("/produtos/{$id}/edit")
                ->withErrors($validator)
                ->withInput();
        }

        $produto = $this->produtos->find($id);
        $update = $produto->update($this->request->all());
        if ($update)
            return redirect('/produtos');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = $this->produtos->find($id);
        $delete = $produto->delete();
        if ($delete)
            return redirect('/produtos');
        else
            return redirect("/produtos/$id");
    }
}
