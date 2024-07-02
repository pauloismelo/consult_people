<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Adicionar Usuário</h4>
                <p class="card-title-desc">Preencha os camposa abaixo para adicionar um usuário ao sistema</p>

                <form action="end_cadastrar.php" method="post">
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Nome</label>
                    <div class="col-md-10">
                        <input class="form-control" name="nome" type="text" id="example-text-input" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-search-input" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-10">
                        <input class="form-control input-mask" name="email" type="email" required data-inputmask="'alias': 'email'" im-insert="true">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-email-input" class="col-md-2 col-form-label">CPF</label>
                    <div class="col-md-10">
                        <input type="text" name="documento" class="form-control input-mask"  data-inputmask="'mask': '999.999.999-99'" im-insert="true" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-url-input" class="col-md-2 col-form-label">Celular</label>
                    <div class="col-md-10">
                        <input type="text" name="celular" id="example-url-input" required class="form-control input-mask"  data-inputmask="'mask': '(99)99999-9999'" im-insert="true">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-2 col-form-label">Tipo de Usuário</label>
                    <div class="col-md-10">
                        <select class="form-select" name="departamento" required>
                            <option value="">Selecione...</option>
                            <option value="CLIENTE">CLIENTE</option>
                            <option value="DIRETORIA">DIRETORIA</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">

                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary waves-effect waves-light w-md">Cadastrar</button>
                    </div>
                </div>
              </form>






            </div>
        </div>
    </div> <!-- end col -->
</div>
