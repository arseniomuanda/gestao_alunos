 <main id="main" class="main">

     <div class="pagetitle">
         <h1><?= $disciplina->nome ?> - <?= $disciplina->curso_nome ?> - Ano lectivo <?= $disciplina->ano_nome ?></h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="/">Home</a></li>
                 <li class="breadcrumb-item"><a href="/escolar/disciplinas">Disciplinas</a></li>
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
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar</button>
                             </li>

                             <li class="nav-item">
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-provas">Provas</button>
                             </li>

                         </ul>
                         <div class="tab-content pt-2">

                             <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                 <h5 class="card-title">Descrição</h5>
                                 <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                                 <h5 class="card-title">Dados da disciplina</h5>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Nome</div>
                                     <div class="col-lg-9 col-md-8"><?= $disciplina->nome ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Curso</div>
                                     <div class="col-lg-9 col-md-8"><?= $disciplina->curso_nome ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Ano</div>
                                     <div class="col-lg-9 col-md-8"><?= $disciplina->ano_nome ?></div>
                                 </div>

                             </div>

                             <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                 <!-- Perfil Edit Form -->
                                 <form onsubmit="event.preventDefault();vue_app.editDisciplina(<?= $disciplina->id ?>)">
                                     <div class="row mb-3">
                                         <label for="nome" class="col-md-4 col-lg-3 col-form-label">Nome</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input required name="nome" type="text" required class="form-control" id="nome" value="<?= $disciplina->nome ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="numero" class="col-md-4 col-lg-3 col-form-label">Curso</label>
                                         <div class="col-md-8 col-lg-9">
                                             <select required type="text" required class="form-control" name="curso" id="curso">
                                                 <option>Selecionar curso</option>
                                                 <?php foreach ($cursos as $key => $value) { ?>
                                                     <option <?= $value->id == $disciplina->curso ? 'selected' : ''  ?> value="<?= $value->id ?>"><?= $value->nome ?></option>
                                                 <?php } ?>
                                             </select>
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="numero" class="col-md-4 col-lg-3 col-form-label">Ano</label>
                                         <div class="col-md-8 col-lg-9">
                                             <select required type="text" required class="form-control" name="ano" id="ano">
                                                 <option>Selecionar ano</option>
                                                 <?php foreach ($anos as $key => $value) { ?>
                                                     <option <?= $value->id == $disciplina->ano ? 'selected' : ''  ?> value="<?= $value->id ?>"><?= $value->nome ?></option>
                                                 <?php } ?>
                                             </select>
                                         </div>
                                     </div>


                                     <div class="text-center">
                                         <button type="submit" class="btn btn-primary">Salvar</button>
                                     </div>
                                 </form><!-- End Perfil Edit Form -->

                             </div>

                             <div class="tab-pane fade pt-3" id="profile-provas">
                                 <p type="button" class="btn btn-outline-secondary">Primeiro Trimestre</p>
                                 <table class="table table-striped">
                                     <thead>
                                         <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Nome</th>
                                             <th scope="col">Data</th>
                                             <th scope="col"></th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php $i = 0;
                                            foreach ($primeiro as $key => $value) { ?>
                                             <tr>
                                                 <th scope="row"><?= ++$i ?></th>
                                                 <td><?= $value->nome ?></td>
                                                 <td><?= $value->data ?></td>
                                                 <td><a href="/escolar/provas/<?= $value->id ?>" class="btn btn-primary"><i class="bi bi-eye"></i></a></td>
                                             </tr>
                                         <?php } ?>
                                     </tbody>
                                 </table>
                                 <p type="button" class="btn btn-outline-info">Segundo Trimestre</p>
                                 <table class="table table-striped">
                                     <thead>
                                         <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Nome</th>
                                             <th scope="col">Data</th>
                                             <th scope="col"></th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php $i = 0;
                                            foreach ($segundo as $key => $value) { ?>
                                             <tr>
                                                 <th scope="row"><?= ++$i ?></th>
                                                 <td><?= $value->nome ?></td>
                                                 <td><?= $value->data ?></td>
                                                 <td><a href="/escolar/provas/<?= $value->id ?>" class="btn btn-primary"><i class="bi bi-eye"></i></a></td>
                                             </tr>
                                         <?php } ?>
                                     </tbody>
                                 </table>
                                 <p type="button" class="btn btn-outline-danger">Terceiro Trimestre</p>
                                 <table class="table table-striped">
                                     <thead>
                                         <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Nome</th>
                                             <th scope="col">Data</th>
                                             <th scope="col"></th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php $i = 0;
                                            foreach ($terceiro as $key => $value) { ?>
                                             <tr>
                                                 <th scope="row"><?= ++$i ?></th>
                                                 <td><?= $value->nome ?></td>
                                                 <td><?= $value->data ?></td>
                                                 <td><a href="/escolar/provas/<?= $value->id ?>" class="btn btn-primary"><i class="bi bi-eye"></i></a></td>
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