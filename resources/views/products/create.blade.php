@extends('layouts.app')

@section('content')
<div class="card mt-4">
    <div class="card-header bg-primary text-white">
        <h4>Cadastrar Novo Produto</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf <div class="mb-3">
                <label for="name" class="form-label">Nome do Produto <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Preço (R$) <span class="text-danger">*</span></label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
            </div>

            <div class="mb-3">
                <label for="supplier_id" class="form-label">Fornecedor Responsável <span class="text-danger">*</span></label>
                <select class="form-select" id="supplier_id" name="supplier_id" required>
                    <option value="" disabled selected>-- Selecione um Fornecedor --</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('products.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                <button type="submit" class="btn btn-success">Salvar Produto</button>
            </div>
        </form>
    </div>
</div>
@endsection

