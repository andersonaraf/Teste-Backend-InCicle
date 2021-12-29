<!-- Button trigger modal -->
<input type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Novo Cliente">
@error('name')
<label class="alert-danger form-control">{{$message}}</label>
@enderror
@error('price')
<label class="alert-danger form-control mt-2">{{$message}}</label>
@enderror
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{route('customer.store')}}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar novo Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Nome do Cliente" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Cpf ou Cnpj</label>
                        <input type="text" class="form-control mascara-cpfcnpj" id="exampleFormControlInput2" name="document" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Tipo</label>
                        <select type="text" class="form-select" id="exampleFormControlInput2" name="type" required>
                            <option value="CPF">CPF</option>
                            <option value="CNPJ">CNPJ</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Fecha">
                    <input type="submit" class="btn btn-primary" value="Salvar">
                </div>
            </form>
        </div>
    </div>
</div>
