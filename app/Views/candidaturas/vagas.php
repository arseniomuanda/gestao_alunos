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
                          <p>Vagas alusívas ao ano de <?= date('Y') ?> <a href="" target="_blank">Ver formulário</a></p>

                          <!-- Table with stripped rows -->
                          <table class="table datatable">
                              <thead>
                                  <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Nome</th>
                                      <th scope="col">Início</th>
                                      <th scope="col">Fim</th>
                                      <th scope="col">Estado</th>
                                      <th scope="col">Total de Vagas</th>
                                      <th scope="col">Vagas disponíveis</th>
                                      <th scope="col" colspan="2">Opções</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $count = 0;
                                    foreach ($vagas as $key => $value) { ?>
                                      <tr>
                                          <th scope="row"><?= ++$count ?></th>
                                          <td><?= $value->nome ?></td>
                                          <td><?= $value->inicio ?></td>
                                          <td><?= $value->fim ?></td>
                                          <td><?= $value->estado == 1 ? 'Aberto' : 'Fechado' ?></td>
                                          <td><?= $value->maximo_candidados ?></td>
                                          <td><?= (int) $value->maximo_candidados - (int) $value->alunos ?></td>
                                          <td><button onclick="vue_app.removeVaga(<?= $value->id ?>)" class="btn btn-primary"><i class="bi bi-trash"></i></button></td>
                                          <td><a href="/candidaturas/vagas/<?= $value->id ?>" class="btn btn-primary"><i class="bi bi-eye"></i></a></td>
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