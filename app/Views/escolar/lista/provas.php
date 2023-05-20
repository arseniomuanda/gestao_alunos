  <main id="main" class="main">

      <div class="row">
          <div class="col-lg-9">

              <div class="pagetitle">
                  <h1>Listas de Provas</h1>
                  <nav>
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="/">Home</a></li>
                          <li class="breadcrumb-item">Provas</li>
                      </ol>
                  </nav>
              </div><!-- End Page Title -->

          </div>

          <div class="col-lg-3">

              <a class="btn btn-block btn-success" href="/escolar/provas/novo">Adicionar Prova</a>

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
                                      <th scope="col">Ano</th>
                                      <th scope="col">Disciplina</th>
                                      <th scope="col">Trimeste</th>
                                      <th scope="col" colspan="2">Opções</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $i = 0;
                                    foreach ($provas as $key => $value) { ?>
                                      <tr>
                                          <th scope="row"><?= ++$i ?></th>
                                          <td><?= $value->nome ?></td>
                                          <td><?= $value->ano ?></td>
                                          <td><?= $value->disciplina ?></td>
                                          <td><?= $value->trimestre ?></td>
                                          <td>
                                              <button onclick="vue_app.removeProva(<?= $value->id ?>)" class="btn btn-primary"><i class="bi bi-trash"></i></button>
                                              <a href="/escolar/provas/<?= $value->id ?>" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                          </td>
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