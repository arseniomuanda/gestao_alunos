 <main id="main" class="main">

     <div class="pagetitle">
         <h1>Perfil</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="/">Home</a></li>
                 <li class="breadcrumb-item"><a href="/candidaturas/vagas">Candidaturas</a></li>
                 <li class="breadcrumb-item active">Perfil</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->

     <section class="section profile">
         <div class="row">

             <div class="col-xl-12">

                 <div class="card">
                     <div class="card-body pt-3">
                         <!-- Bordered Tabs -->
                         <ul class="nav nav-tabs nav-tabs-bordered">

                             <li class="nav-item">
                                 <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Resumo</button>
                             </li>

                             <li class="nav-item">
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Dados</button>
                             </li>

                             <li class="nav-item">
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Candidatos</button>
                             </li>

                         </ul>
                         <div class="tab-content pt-2">

                             <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                 <h5 class="card-title">Descrição</h5>
                                 <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                                 <h5 class="card-title">Dados do cadidato</h5>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Nome</div>
                                     <div class="col-lg-9 col-md-8"><?= $vaga->nome ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Início</div>
                                     <div class="col-lg-9 col-md-8"><?= $vaga->inicio ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Fim</div>
                                     <div class="col-lg-9 col-md-8"><?= $vaga->fim ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Limite</div>
                                     <div class="col-lg-9 col-md-8"><?= $vaga->maximo_candidados ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Estado</div>
                                     <div class="col-lg-9 col-md-8"><?= $vaga->estado == 1 ? 'Aberto' : 'Fechado' ?></div>
                                 </div>

                             </div>

                             <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                 <!-- Perfil Edit Form -->
                                 <form onsubmit="event.preventDefault();vue_app.editVaga(<?= $vaga->id ?>)">
                                     <div class="row mb-3">
                                         <label for="nome" class="col-md-4 col-lg-3 col-form-label">Nome</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="nome" type="text" required class="form-control" id="nome" value="<?= $vaga->nome ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="numero" class="col-md-4 col-lg-3 col-form-label">Início</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input type="text" required class="form-control" name="inicio" id="inicio" value="<?= $vaga->inicio ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="bi" class="col-md-4 col-lg-3 col-form-label">Fim</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input type="text" required class="form-control" name="fim" id="fim" value="<?= $vaga->inicio ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="bi" class="col-md-4 col-lg-3 col-form-label">Limite</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input type="text" required class="form-control" name="maximo_candidados" id="maximo_candidados" value="<?= $vaga->maximo_candidados ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="sexo" class="col-md-4 col-lg-3 col-form-label">Estado</label>
                                         <div class="col-md-8 col-lg-9">
                                             <select class="form-control" required name="estado" id="estado">
                                                 <option value="">Selecionar Sexo</option>
                                                 <option <?= $vaga->estado == '1' ? 'selected' : '' ?> value="1">Aberto</option>
                                                 <option <?= $vaga->estado == '0' ? 'selected' : '' ?> value="0">Fechado</option>
                                             </select>
                                         </div>
                                     </div>

                                     <div class="text-center">
                                         <button type="submit" class="btn btn-primary">Salvar</button>
                                     </div>
                                 </form><!-- End Perfil Edit Form -->

                             </div>

                             <div class="tab-pane fade pt-3" id="profile-change-password">

                                 <table class="table table-striped">
                                     <thead>
                                         <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Nome</th>
                                             <th scope="col">Idade</th>
                                             <th scope="col">Campanha</th>
                                             <th scope="col" colspan="2">Opções</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php $i = 0;
                                            foreach ($candidatos as $key => $value) { ?>
                                             <tr>
                                                 <th scope="row"><?= ++$i ?></th>
                                                 <td><?= $value->nome ?></td>
                                                 <td><?= (int)date('Y') - (int)date('Y', strtotime($value->datanascimento)) ?></td>
                                                 <td><?= $value->campanha ?></td>
                                                 <td><button onclick="vue_app.removeDisciplica(<?= $value->id ?>)" class="btn btn-primary"><i class="bi bi-trash"></i></button></td>
                                                 <td><a href="/candidaturas/vagas/<?= $value->id ?>" class="btn btn-primary"><i class="bi bi-eye"></i></a></td>
                                             </tr>
                                         <?php } ?>
                                     </tbody>
                                 </table>
                             </div>

                         </div><!-- End Bordered Tabs -->

                     </div>
                 </div>

             </div>
         </div>
     </section>

 </main><!-- End #main -->