  <main id="main" class="main">

      <div class="pagetitle">
          <h1>Adicionar Salas</h1>
          <nav>
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item"><a href="/config/salas">Salas</a></li>
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
                          <form onsubmit="event.preventDefault(),vue_app.addSala()" class="row g-3">
                              <div class="col-md-6">
                                  <label for="inputName5" class="form-label">Nome</label>
                                  <input required type="text" class="form-control" name="nome" id="nome">
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