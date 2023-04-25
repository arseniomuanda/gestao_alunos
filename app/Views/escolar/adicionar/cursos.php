  <main id="main" class="main">

      <div class="pagetitle">
          <h1>Adicionar Curso</h1>
          <nav>
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item"><a href="/escolar/cursos">Cursos</a></li>
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
                          <form class="row g-3">
                              <div class="col-md-12">
                                  <label for="inputName5" class="form-label">Nome</label>
                                  <input type="text" class="form-control" name="nome" id="nome">
                              </div>
                              <div class="col-md-6">
                                  <label for="inputName5" class="form-label">Sigla</label>
                                  <input type="text" class="form-control" name="sigla" id="sigla">
                              </div>
                              <div class="col-md-6">
                                  <label for="inputName5" class="form-label">Limite de alunos</label>
                                  <input type="number" min="1" class="form-control" name="limite_alunos" id="limite_alunos">
                              </div>
                              <div class="text-center">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                  <button type="reset" class="btn btn-secondary">Reset</button>
                              </div>
                          </form><!-- End Multi Columns Form -->

                      </div>
                  </div>

              </div>
          </div>
      </section>

  </main><!-- End #main -->