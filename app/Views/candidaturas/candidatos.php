  <main id="main" class="main">

      <div class="pagetitle">
          <h1>Lista de Candidatos</h1>
          <nav>
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item">Candidatos</li>
              </ol>
          </nav>
      </div><!-- End Page Title -->

      <section class="section">
          <div class="row">
              <div class="col-lg-12">

                  <div class="card">
                      <div class="card-body">
                          <h5 class="card-title">Lista de Candidatos</h5>
                          <!-- Table with stripped rows -->
                          <table class="table datatable">
                              <thead>
                                  <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Nome</th>
                                      <th scope="col">Idade</th>
                                      <th scope="col">Data de cadastro</th>
                                      <th scope="col">Estado</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $count = 0;
                                    foreach ($candidatos as $key => $value) { ?>
                                      <tr>
                                          <th scope="row"><?= $count ?></th>
                                          <td><?= $count ?></td>
                                          <td><?= $count ?></td>
                                          <td><?= $count ?></td>
                                          <td></td>
                                      </tr>
                                  <?php  } ?>
                              </tbody>
                          </table>
                          <!-- End Table with stripped rows -->

                      </div>
                  </div>

              </div>
          </div>
      </section>

  </main><!-- End #main -->