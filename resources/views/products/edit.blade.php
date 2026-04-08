@extends('layouts.app')

@section('content')
<div class="card mt-4">
    <div class="card-header bg-warning text-dark">
        <h4>Editar Produto: {{ $product->name }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT') <div class="mb-3">
                <label class="form-label">Nome do Produto *</label>
                <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <textarea class="form-control" name="description" rows="3">{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Preço (R$) *</label>
                <input type="number" step="0.01" class="form-control" name="price" value="{{ $product->price }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Fornecedor Responsável *</label>
                <select class="form-select" name="supplier_id" required>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $product->supplier_id == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Atualizar Produto</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection