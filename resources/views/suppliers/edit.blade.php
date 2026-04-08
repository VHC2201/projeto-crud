@extends('layouts.app')

@section('content')
<div class="card mt-4">
    <div class="card-header bg-warning text-dark"><h4>Editar Fornecedor: {{ $supplier->name }}</h4></div>
    <div class="card-body">
        <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
            @csrf
            @method('PUT') <h5 class="mb-3">Dados Básicos</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Nome *</label>
                    <input type="text" class="form-control" name="name" value="{{ $supplier->name }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Email *</label>
                    <input type="email" class="form-control" name="email" value="{{ $supplier->email }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Telefone</label>
                    <input type="text" class="form-control" name="phone" value="{{ $supplier->phone }}">
                </div>
            </div>

            <h5 class="mb-3 mt-3">Endereço</h5>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label>CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" value="{{ $supplier->cep }}" maxlength="9">
                </div>
                <div class="col-md-7 mb-3">
                    <label>Rua/Av</label>
                    <input type="text" class="form-control" id="street" name="street" value="{{ $supplier->street }}">
                </div>
                <div class="col-md-2 mb-3">
                    <label>Número</label>
                    <input type="text" class="form-control" id="number" name="number" value="{{ $supplier->number }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Bairro</label>
                    <input type="text" class="form-control" id="neighborhood" name="neighborhood" value="{{ $supplier->neighborhood }}">
                </div>
                <div class="col-md-5 mb-3">
                    <label>Cidade</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ $supplier->city }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Estado (UF)</label>
                    <input type="text" class="form-control" id="state" name="state" value="{{ $supplier->state }}" maxlength="2">
                </div>
            </div>

            <button type="submit" class="btn btn-warning">Atualizar</button>
            <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

<script>
// O mesmo script do create para manter o ViaCEP funcionando na edição
document.getElementById('cep').addEventListener('blur', function() {
    let cep = this.value.replace(/\D/g, '');
    if (cep.length === 8) {
        fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => response.json())
            .then(data => {
                if (!data.erro) {
                    document.getElementById('street').value = data.logradouro;
                    document.getElementById('neighborhood').value = data.bairro;
                    document.getElementById('city').value = data.localidade;
                    document.getElementById('state').value = data.uf;
                    document.getElementById('number').focus();
                }
            });
    }
});
</script>
@endsection