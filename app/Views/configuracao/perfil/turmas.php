 <main id="main" class="main">

     <div class="pagetitle">
         <h1>Perfil</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="/">Home</a></li>
                 <li class="breadcrumb-item"><a href="/config/turmas">Turmas</a></li>
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
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Alunos</button>
                             </li>

                         </ul>
                         <div class="tab-content pt-2">

                             <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                 <h5 class="card-title">Dados da Turma</h5>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Nome</div>
                                     <div class="col-lg-9 col-md-8"><?= $turma->nome ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Sala</div>
                                     <div class="col-lg-9 col-md-8"><?= $turma->sala ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Curso</div>
                                     <div class="col-lg-9 col-md-8"><?= $turma->curso ?></div>
                                 </div>

                             </div>

                             <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                 <!-- Perfil Edit Form -->
                                 <form onsubmit="event.preventDefault();vue_app.editTurma(<?= $turma->id ?>)">
                                     <div class="row mb-3">
                                         <label for="nome" class="col-md-4 col-lg-3 col-form-label">Nome</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="nome" type="text" required class="form-control" id="nome" value="<?= $turma->nome ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="nome" class="col-md-4 col-lg-3 col-form-label">Sala</label>
                                         <div class="col-md-8 col-lg-9">
                                             <select name="sala" required class="form-control" id="sala">
                                                 <?php foreach ($salas as $key => $value) { ?>
                                                     <option <?= $value->id == $turma->sala_id ? 'selected' : '' ?> value="<?= $value->id ?>"><?= $value->nome ?></option>
                                                 <?php } ?>
                                             </select>
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="nome" class="col-md-4 col-lg-3 col-form-label">Cruso</label>
                                         <div class="col-md-8 col-lg-9">
                                             <select name="curso" required class="form-control" id="curso">
                                                 <?php foreach ($cursos as $key => $value) { ?>
                                                     <option <?= $value->id == $turma->curso_id ? 'selected' : '' ?> value="<?= $value->id ?>"><?= $value->nome ?></option>
                                                 <?php } ?>
                                             </select>
                                         </div>
                                     </div>

                                     <div class="text-center">
                                         <button type="submit" class="btn btn-primary">Salvar</button>
                                     </div>
                                 </form><!-- End Perfil Edit Form -->

                             </div>

                             <div class="tab-pane fade pt-3" id="profile-change-password">
                                 <table class="table datatable">
                                     <thead>
                                         <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Nome</th>
                                             <th scope="col">Idade</th>
                                             <th scope="col">Sexo</th>
                                             <th scope="col">Curso</th>
                                             <th scope="col">Turma</th>
                                             <th scope="col">Opção</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php $index = 0;
                                            foreach ($alunos as $key => $value) {  ?>
                                             <tr>
                                                 <th scope="row"><?= ++$index ?></th>
                                                 <td><?= $value->nome ?></td>
                                                 <td><?= (int) date('Y') - (int) date('Y', strtotime($value->datanascimento)) ?></td>
                                                 <td><?= $value->sexo == 'M' ? 'Masculino' : 'Feminino' ?></td>
                                                 <td><?= $value->curso ?></td>
                                                 <td><?= $value->turma ?></td>
                                                 <td><a href="/escolar/alunos/<?= $value->id ?>" class="btn btn-primary"><i class="bi bi-eye"></i></a></td>
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