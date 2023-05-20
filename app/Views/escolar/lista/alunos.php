  <main id="main" class="main">

      <div class="row">
          <div class="col-lg-9">

              <div class="pagetitle">
                  <h1>Listas de Alunos</h1>
                  <nav>
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="/">Home</a></li>
                          <li class="breadcrumb-item">Alunos</li>
                      </ol>
                  </nav>
              </div><!-- End Page Title -->

          </div>

          <div class="col-lg-3">

              <a class="btn btn-block btn-success" href="/escolar/alunos/novo">Cadastrar Aluno</a>

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
                                      <th scope="col">Idade</th>
                                      <th scope="col">Sexo</th>
                                      <th scope="col">Curso</th>
                                      <th scope="col">Turma</th>
                                      <th scope="col" colspan="2">Opção</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $index = 0;
                                    foreach ($alunos as $key => $value) {  ?>
                                      <tr>
                                          <th scope="row"><?= ++$index ?></th>
                                          <td><?= $value->nome ?></td>
                                          <td><?=  (int) date('Y') - (int) date('Y', strtotime($value->datanascimento)) ?></td>
                                          <td><?= $value->sexo == 'M' ? 'Masculino' : 'Feminino' ?></td>
                                          <td><?= $value->curso ?></td>
                                          <td><?= $value->turma ?></td>
                                          <td><button onclick="vue_app.removeDisciplica(<?= $value->id ?>)" class="btn btn-primary"><i class="bi bi-trash"></i></button></td>
                                          <td><a href="/escolar/alunos/<?= $value->id ?>" class="btn btn-primary"><i class="bi bi-eye"></i></a></td>
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