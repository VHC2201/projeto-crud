@extends('layouts.app')

@section('content')
<div class="row mt-4">
    <div class="col-12">
        <h1 class="mb-4">Painel de Controle</h1>
        
        @if($totalSuppliers == 0)
            <div class="alert alert-warning shadow-sm" role="alert">
                <h4 class="alert-heading">Bem-vindo ao Sistema de Gestão!</h4>
                <p>Para começar a cadastrar seus produtos, você precisa primeiro registrar pelo menos um fornecedor no sistema.</p>
                <hr>
                <a href="{{ route('suppliers.create') }}" class="btn btn-primary">Cadastrar Meu Primeiro Fornecedor</a>
            </div>
        @else
            <div class="alert alert-success shadow-sm" role="alert">
                Seu sistema está operante. Use os cartões abaixo para gerenciar seus dados.
            </div>
        @endif
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6 mb-4">
        <div class="card shadow border-primary h-100">
            <div class="card-body text-center">
                <h5 class="card-title text-primary">Fornecedores</h5>
                <h2 class="display-4">{{ $totalSuppliers }}</h2>
                <p class="card-text">Empresas parceiras cadastradas.</p>
                <a href="{{ route('suppliers.index') }}" class="btn btn-outline-primary w-100">Gerenciar Fornecedores</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card shadow border-success h-100">
            <div class="card-body text-center">
                <h5 class="card-title text-success">Produtos</h5>
                <h2 class="display-4">{{ $totalProducts }}</h2>
                <p class="card-text">Itens disponíveis no estoque.</p>
                
                @if($totalSuppliers > 0)
                    <a href="{{ route('products.index') }}" class="btn btn-outline-success w-100">Gerenciar Produtos</a>
                @else
                    <button class="btn btn-secondary w-100" disabled>Cadastre um fornecedor primeiro</button>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection