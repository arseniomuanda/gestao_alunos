  <main id="main" class="main">

      <div class="pagetitle">
          <h1>Adicionar Turma</h1>
          <nav>
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item"><a href="/config/turmas">Turmas</a></li>
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
                          <form onsubmit="event.preventDefault(),vue_app.addTurma()" class="row g-3">
                              <div class="col-md-12">
                                  <label for="inputName5" class="form-label">Nome</label>
                                  <input required type="text" class="form-control" name="nome" id="nome">
                              </div>
                              <div class="col-md-6">
                                  <label for="inputName5" class="form-label">Curso</label>
                                  <select name="curso" required class="form-control" id="curso">
                                      <option>Selecionar Curso</option>
                                      <?php foreach ($cursos as $key => $value) { ?>
                                          <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                      <?php } ?>
                                  </select>
                              </div>
                              <div class="col-md-6">
                                  <label for="inputName5" class="form-label">Sala</label>
                                  <select name="sala" required class="form-control" id="sala">
                                      <option>Selecionar Sala</option>
                                      <?php foreach ($salas as $key => $value) { ?>
                                          <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                      <?php } ?>
                                  </select>
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