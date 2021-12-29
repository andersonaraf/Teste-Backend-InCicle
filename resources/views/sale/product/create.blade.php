<!-- Button trigger modal -->
<input type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Novo Produto">
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
            <form method="post" action="{{route('product.store')}}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar novo Produto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Nome do Produto" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Preço</label>
                        <input type="number" class="form-control" id="exampleFormControlInput2" name="price" placeholder="100.00" step="0.01" required>
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
