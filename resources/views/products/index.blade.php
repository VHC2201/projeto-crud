@extends('layouts.app')


@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 mt-4">
    <h2>Gestão de Produtos</h2>
    <a href="{{ route('dashboard') }}" class="btn btn-outline-dark me-2">Voltar ao Painel</a>
    <a href="{{ route('products.create') }}" class="btn btn-primary">+ Novo Produto</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="table-responsive">
    <table class="table table-hover table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Preço</th>
                <th>Fornecedor</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                <td>
                    <span class="badge bg-info text-dark">
                        {{ $product->supplier->name ?? 'Sem fornecedor' }}
                    </span>
                </td>
                <td class="text-center">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                    
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Excluir este produto definitivamente?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-muted">Nenhum produto cadastrado ainda.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

