<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Cliente::orderby('nome')->get();
        return view('clientes.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cliente::create([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'email' => mb_strtoupper($request->email, 'UTF-8'),
            'endereco_id' => $request->endereco_id
        ]);
        
        return redirect()->route('clientes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = Cliente::find($id);

        if(!isset($dados)) {return "<h1>ID: $id não encontrado!</h1>";}
        return view('clientes.edit', compact('dados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $obj = Cliente::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'email' => mb_strtoupper($request->email, 'UTF-8'),
        ]);

        $obj->save();

        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Cliente::find($id);

        if(!isset($obj)){ return "<h1>ID: $id não encontrado!";}

        $obj->destroy($id);
        
        return redirect()->route('clientes.index');
        
    }
}
