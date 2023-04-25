  <main id="main" class="main">

      <div class="pagetitle">
          <h1>Adicionar Funcionar</h1>
          <nav>
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item"><a href="/rh/funcionarios">Funcionario</a></li>
                  <li class="breadcrumb-item active">Adicionar</li>
              </ol>
          </nav>
      </div><!-- End Page Title -->
      <section class="section">
          <div class="row">
              <div class="col-lg-12">

                  <div class="card">
                      <div class="card-body">
                          <h5 class="card-title">Dados</h5>

                          <!-- Multi Columns Form -->
                          <form onsubmit="event.preventDefault(),vue_app.addFuncionario()" class="row g-3">
                              <div class="col-md-12">
                                  <label for="inputName5" class="form-label">Nome</label>
                                  <input required type="text" class="form-control" name="nome" id="nome">
                              </div>
                              <div class="col-md-6">
                                  <label for="inputName5" class="form-label">Numero</label>
                                  <input required type="text" class="form-control" name="numero" id="numero">
                              </div>
                              <div class="col-md-6">
                                  <label for="inputName5" class="form-label">Função</label>
                                  <select required type="text" class="form-control" name="categoria" id="categoria">
                                      <option>Selecionar Função</option>
                                      <option value="1">Admin</option>
                                      <option value="2">Professor</option>
                                      <option value="3">Secretário</option>
                                  </select>
                              </div>
                              <div class="col-md-6">
                                  <label for="telefone" class="form-label">Telefone</label>
                                  <input required type="text" class="form-control" name="telefone" id="telefone">
                              </div>
                              <div class="col-md-6">
                                  <label for="bi" class="form-label">BI</label>
                                  <input type="text" class="form-control" name="bi" id="bi">
                              </div>
                              <div class="col-md-6">
                                  <label for="inputName5" class="form-label">Sexo</label>
                                  <select required type="text" class="form-control" name="sexo" id="sexo">
                                    <option></option>
                                      <option value="M">Masculino</option>
                                      <option value="F">Feminino</option>
                                  </select>
                              </div>
                              <div class="col-md-6">
                                  <label for="email" class="form-label">E-mail</label>
                                  <input required type="email" class="form-control" name="email" id="email">
                              </div>
                              <div class="col-md-6">
                                  <label for="municipio" class="form-label">Município</label>
                                  <input required type="text" min="1" class="form-control" name="municipio" id="municipio">
                              </div>
                              <div class="col-md-6">
                                  <label for="bairro" class="form-label">Bairro</label>
                                  <input required type="text" min="1" class="form-control" name="bairro" id="bairro">
                              </div>
                              <div class="col-md-6">
                                  <label for="rua" class="form-label">Rua</label>
                                  <input type="text" min="1" class="form-control" name="rua" id="rua">
                              </div>
                              <div class="col-md-6">
                                  <label for="n_casa" class="form-label">Nº casa</label>
                                  <input type="text" min="1" class="form-control" name="n_casa" id="n_casa">
                              </div>
                              <div class="text-center">
                                  <button type="submit" class="btn btn-primary">Salvar</button>
                                  <button type="reset" class="btn btn-secondary">Reset</button>
                              </div>
                          </form><!-- End Multi Columns Form -->

                      </div>
                  </div>

              </div>
          </div>
      </section>

  </main><!-- End #main -->