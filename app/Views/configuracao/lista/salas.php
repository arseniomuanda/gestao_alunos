  <main id="main" class="main">

      <div class="row">
          <div class="col-lg-9">

              <div class="pagetitle">
                  <h1>Listas de Salas</h1>
                  <nav>
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="/">Home</a></li>
                          <li class="breadcrumb-item">Salas</li>
                      </ol>
                  </nav>
              </div><!-- End Page Title -->

          </div>

          <div class="col-lg-3">



              <a href="/config/salas/novo" class="btn btn-block btn-success">Cadastrar Salas</a>

          </div>
      </div>

      <section class="section">
          <div class="row">
              <div class="col-lg-12">

                  <div class="card">
                      <div class="card-body">
                          <!-- Table with stripped rows -->
                          <table class="table datatable">
                              <thead>
                                  <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Nome</th>
                                      <th scope="col" colspan="2">Opção</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $index = 0;
                                    foreach ($salas as $key => $value) {  ?>
                                      <tr>
                                          <th scope="row"><?= ++$index ?></th>
                                          <td><?= $value->nome ?></td>
                                          <td><button onclick="vue_app.removeSala(<?= $value->id ?>)" class="btn btn-primary"><i class="bi bi-trash"></i></button></td>
                                          <td><a href="/config/salas/<?= $value->id ?>" class="btn btn-primary"><i class="bi bi-eye"></i></a></td>
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