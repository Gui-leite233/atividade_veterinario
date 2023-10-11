@extends('templates.main', ['titulo' => "Lista de Clientes", 'rota'=>"clientes.create"])

@section('titulo') Desenvolvimento Web @endsection

@section('conteudo')

    <div class="row">
        <div class="col">
            
            <!-- Utiliza o componente "datalist" criado -->
            <x-datalist 
                :title="'Clientes'"
                :crud="'clientes'"
                :header="['ID', 'NOME', 'EMAIL']" 
                :fields="['id', 'nome', 'email']"
                :data="$data"
                :hide="[true, false, true, false]" 
                :info="['id', 'nome', 'email']"
                :remove="'nome'"
            />
        </div>
    </div>
@endsection