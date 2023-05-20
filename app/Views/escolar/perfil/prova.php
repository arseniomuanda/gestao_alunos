 <main id="main" class="main">

     <div class="pagetitle">
         <h1><?= $prova->nome ?></h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="/">Home</a></li>
                 <li class="breadcrumb-item"><a href="/escolar/provas">Provas</a></li>
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
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Perfil</button>
                             </li>

                             <li class="nav-item">
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#alunos-notas">Adicionar Notas</button>
                             </li>

                             <li class="nav-item">
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Notas</button>
                             </li>

                         </ul>
                         <div class="tab-content pt-2">

                             <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                 <h5 class="card-title">Descrição</h5>
                                 <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                                 <h5 class="card-title">Dados da Prova</h5>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Nome</div>
                                     <div class="col-lg-9 col-md-8"><?= $prova->nome ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Disciplina</div>
                                     <div class="col-lg-9 col-md-8"><?= $prova->disciplina_nome ?></div>
                                 </div>

                                 <!-- <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Curso</div>
                                     <div class="col-lg-9 col-md-8"><?= $prova->disciplina_nome ?></div>
                                 </div> -->

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Ano</div>
                                     <div class="col-lg-9 col-md-8"><?= $prova->ano_nome ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Trimeste</div>
                                     <div class="col-lg-9 col-md-8"><?= $prova->trimestre_nome ?></div>
                                 </div>

                             </div>

                             <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                 <!-- Perfil Edit Form -->
                                 <form method="post" onsubmit="event.preventDefault();vue_app.editProva(<?= $prova->id ?>)">
                                     <div class="row mb-3">
                                         <label for="nome" class="col-md-4 col-lg-3 col-form-label">Nome Completo</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="nome" type="text" class="form-control" id="nome" value="<?= $prova->nome ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="curso" class="col-md-4 col-lg-3 col-form-label">Curso</label>
                                         <div class="col-md-8 col-lg-9">
                                             <select onchange="vue_app.buscarDisciplica(this.value)" name="curso" class="form-control" id="curso">
                                                 <option value="">Selecionar Curso</option>
                                                 <?php foreach ($cursos as $key => $value) { ?>
                                                     <option <?= $value->id == $prova->curso ? 'selected' : '' ?> value="<?= $value->id ?>"><?= $value->nome ?></option>
                                                 <?php } ?>
                                             </select>
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="disciplina" class="col-md-4 col-lg-3 col-form-label">Disciplina</label>
                                         <div class="col-md-8 col-lg-9">
                                             <select name="disciplina" class="form-control" id="disciplina">
                                                 <option value="<?= $prova->disciplina ?>"><?= $prova->disciplina_nome ?></option>
                                                 <option v-for="item in disciplinas" :value="item.id">{{item.nome}}</option>
                                             </select>
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="ano" class="col-md-4 col-lg-3 col-form-label">Ano</label>
                                         <div class="col-md-8 col-lg-9">
                                             <select name="ano" class="form-control" id="ano">
                                                 <option value="">Selecionar Ano</option>
                                                 <?php foreach ($anos as $key => $value) { ?>
                                                     <option <?= $value->id == $prova->ano ? 'selected' : '' ?> value="<?= $value->id ?>"><?= $value->nome ?></option>
                                                 <?php } ?>
                                             </select>
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="trimestre" class="col-md-4 col-lg-3 col-form-label">Trimeste</label>
                                         <div class="col-md-8 col-lg-9">
                                             <select name="trimestre" class="form-control" id="trimestre">
                                                 <option value="">Selecionar Trimeste</option>
                                                 <?php foreach ($trimestres as $key => $value) { ?>
                                                     <option <?= $value->id == $prova->trimestre ? 'selected' : '' ?> value="<?= $value->id ?>"><?= $value->nome ?></option>
                                                 <?php } ?>
                                             </select>
                                         </div>
                                     </div>

                                     <div class="text-center">
                                         <button type="submit" class="btn btn-primary">Salvar</button>
                                     </div>
                                 </form><!-- End Perfil Edit Form -->

                             </div>

                             <div class="tab-pane fade pt-3" id="alunos-notas">
                                 <table class="table table-striped">
                                     <thead>
                                         <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Número de estudante</th>
                                             <th scope="col">Valor</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php $i = 0;
                                            if ((sizeof($alunos) > sizeof($notas))) {
                                                foreach ($alunos as $key => $value) { ?>
                                                 <tr>
                                                     <th scope="row"><?= ++$i ?></th>
                                                     <td><?= $value->numero ?></td>
                                                     <td> <input onchange="vue_app.setNota(<?= $value->numero ?>,<?= $value->id ?>,  <?= $prova->id ?>, this.value, 'undefined')" class="form-control w-25" type="number" name="nota" id="nota"></td>
                                                 </tr>
                                         <?php }
                                            } ?>
                                     </tbody>
                                 </table>
                             </div>


                             <div class="tab-pane fade pt-3" id="profile-settings">
                                 <table class="table table-striped">
                                     <thead>
                                         <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Número de estudante</th>
                                             <th scope="col">Valor</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php $i = 0;
                                            foreach ($notas as $key => $value) { ?>
                                             <tr>
                                                 <th scope="row"><?= ++$i ?></th>
                                                 <td><?= $value->numero ?></td>
                                                 <td> <input onchange="vue_app.setNota(<?= $value->numero ?>,<?= $value->aluno ?>,  <?= $prova->id ?>, this.value, <?= $value->prova ?>)" class="form-control w-25" type="number" value="<?= $value->valor ?>" name="nota" id="nota"></td>
                                             </tr>
                                         <?php } ?>
                                     </tbody>
                                 </table>
                             </div>

                             <div class="tab-pane fade pt-3" id="profile-change-password">
                                 <!-- Change Password Form -->
                                 <form>

                                     <div class="row mb-3">
                                         <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="password" type="password" class="form-control" id="currentPassword">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="newpassword" type="password" class="form-control" id="newPassword">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                         </div>
                                     </div>

                                     <div class="text-center">
                                         <button type="submit" class="btn btn-primary">Change Password</button>
                                     </div>
                                 </form><!-- End Change Password Form -->

                             </div>

                         </div><!-- End Bordered Tabs -->

                     </div>
                 </div>

             </div>
         </div>
     </section>

 </main><!-- End #main -->