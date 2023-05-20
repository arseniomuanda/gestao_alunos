  <main id="main" class="main">

      <div class="pagetitle">
          <h1>Adicionar Aluno</h1>
          <nav>
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item"><a href="/escolar/alunos">Alunos</a></li>
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
                          <form onsubmit="event.preventDefault(),vue_app.addAluno()" class="row g-3">
                              <div class="row">
                                  <fieldset class="reset w-100">
                                      <legend class="reset">Contacto</legend>
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3">
                                                  <input type="text" class="form-control" id="nome" name="nome" placeholder="">
                                                  <label for="floatingInput">Nome</label>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3">
                                                  <input type="text" class="form-control" id="bi" name="bi" placeholder="">
                                                  <label for="floatingInput">BI</label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3">
                                                  <input type="phone" class="form-control" id="telefone" name="telefone" placeholder="">
                                                  <label for="telefone">Telefone</label>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3">
                                                  <input type="email" class="form-control" id="email" name="email" placeholder="">
                                                  <label for="floatingInput">Email</label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3">
                                                  <input type="date" max="2008-12-31" class="form-control" id="datanascimento" name="datanascimento" placeholder="">
                                                  <label for="floatingInput">Data de Nascimento</label>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3">
                                                  <select type="text" class="form-control" id="sexo" name="sexo" placeholder="">
                                                      <option>Selecionar Sexo</option>
                                                      <option value="M">Masculino</option>
                                                      <option value="F">Feminino</option>
                                                  </select>
                                                  <label for="floatingInput">Sexo</label>
                                              </div>
                                          </div>
                                      </div>
                                  </fieldset>
                              </div>
                              <div class="row">
                                  <fieldset class="reset w-100">
                                      <legend class="reset">Endereço</legend>
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3">
                                                  <input type="text" class="form-control" id="municipio" name="municipio" placeholder="">
                                                  <label for="floatingInput">Município</label>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3">
                                                  <input type="text" class="form-control" id="bairro" name="bairro" placeholder="">
                                                  <label for="floatingInput">Bairro</label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3">
                                                  <input type="text" class="form-control" id="rua" name="rua" placeholder="">
                                                  <label for="floatingInput">Rua</label>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3">
                                                  <input type="text" class="form-control" id="n_casa" name="n_casa" placeholder="">
                                                  <label for="floatingInput">Número da casa</label>
                                              </div>
                                          </div>
                                      </div>
                                  </fieldset>
                              </div>
                              <div class="row">
                                  <fieldset class="reset w-100">
                                      <legend class="reset">Matricula</legend>
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3">
                                                  <input type="text" class="form-control" id="nome_pai" name="nome_pai" placeholder="">
                                                  <label for="floatingInput">Nome do pai</label>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3">
                                                  <input type="text" class="form-control" id="nome_mae" name="nome_mae" placeholder="">
                                                  <label for="floatingInput">Nome da mãe</label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3">
                                                  <input type="text" class="form-control" id="nome_encarregado" name="nome_encarregado" placeholder="">
                                                  <label for="floatingInput">Nome do Encarregado</label>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3">
                                                  <input type="text" class="form-control" id="telefone_encarregado" name="telefone_encarregado" placeholder="">
                                                  <label for="floatingInput">Telefone do Encarregado</label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3">
                                                  <select onchange="vue_app.buscarCursos(this.value)" class="form-control" id="curso" name="curso">
                                                      <option value="">Selecionar Curso</option>
                                                      <?php foreach ($cursos as $key => $value) { ?>
                                                          <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                                      <?php } ?>
                                                  </select>
                                                  <label for="floatingInput">Curso</label>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3">
                                                  <select class="form-control" id="turma" name="turma">
                                                      <option>Selecionar Turma</option>
                                                      <option v-for="item in turmas" :value="item.id">{{item.nome}}</option>
                                                  </select>
                                                  <label for="floatingInput">Turma</label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3">
                                                  <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" id="dataentrada" name="dataentrada" placeholder="">
                                                  <label for="floatingInput">Data de entrada</label>
                                              </div>
                                          </div>
                                      </div>
                                  </fieldset>
                              </div>
                              <div class="row">
                                  <fieldset class="reset w-100">
                                      <legend class="reset">Documentos</legend>
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3">
                                                  <input type="file" class="form-control" id="certificado" name="certificado" placeholder="">
                                                  <label for="floatingInput">Certicado</label>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3">
                                                  <input type="file" class="form-control" id="foto_tipo_pass" name="foto_tipo_pass" placeholder="">
                                                  <label for="floatingInput">Foto Tipo Pass</label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3">
                                                  <input type="file" class="form-control" id="atestado_medico" name="atestado_medico" placeholder="">
                                                  <label for="floatingInput">Atestado Médico</label>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3">
                                                  <input type="file" class="form-control" id="declaracao_notas" name="declaracao_notas" placeholder="">
                                                  <label for="floatingInput">Declaração da Nona</label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-floating mb-3">
                                                  <input type="file" class="form-control" id="copia_bi" name="copia_bi" placeholder="">
                                                  <label for="floatingInput">Cópio do BI</label>
                                              </div>
                                          </div>
                                      </div>
                                  </fieldset>
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