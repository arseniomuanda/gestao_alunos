  <main id="main" class="main">

      <div class="row">
          <div class="col-lg-10">

              <div class="pagetitle">
                  <h1>Listas de Campanhas</h1>
                  <nav>
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="/">Home</a></li>
                          <li class="breadcrumb-item">Vagas</li>
                      </ol>
                  </nav>
              </div><!-- End Page Title -->

          </div>

          <div class="col-lg-2">

              <a class="btn btn-block btn-success" href="/candidaturas/vagas/novo">Adicionar Vaga</a>

          </div>
      </div>

      <section class="section">
          <div class="row">
              <div class="col-lg-12">

                  <div class="card">
                      <div class="card-body">
                          <h5 class="card-title">Vagas de <?= date('Y') ?></h5>
                          <p>Vagas alisivas ao ano de <?= date('Y') ?> <a href="" target="_blank">Ver formulário</a></p>

                          <!-- Table with stripped rows -->
                          <table class="table datatable">
                              <thead>
                                  <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Tema</th>
                                      <th scope="col">Nº Candidados</th>
                                      <th scope="col">Limite de Aprovaçoes</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php for ($i = 0; $i < 6; $i++) {  ?>
                                      <tr>
                                          <th scope="row">1</th>
                                          <td>Vaga Para curso de Informárica</td>
                                          <td><?= rand(4,56) ?></td>
                                          <td><?= rand(56,99) ?></td>
                                      </tr>
                                  <?php } ?>
                              </tbody>
                          </table>
                          <!-- End Table with stripped rows -->

                      </div>
                  </div>

              </div>
          </div>
      </section>

  </main><!-- End #main -->