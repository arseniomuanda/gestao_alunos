 <main id="main" class="main">

     <div class="pagetitle">
         <h1>Perfil</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="/">Home</a></li>
                 <li class="breadcrumb-item"><a href="/escolar/cursos">Cursos</a></li>
                 <li class="breadcrumb-item active">Perfil</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->

     <section class="section profile">
         <div class="row">
             <div class="col-xl-4">

                 <div class="card">
                     <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                         <!-- <img src="" alt="Perfil" class="rounded-circle"> -->
                         <h2><?= $curso->nome ?> - <?= $curso->sigla ?></h2>
                         <h3>Limite de alunos <?= $curso->limite_alunos ?></h3>
                         <!-- <div class="social-links mt-2">
                             <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                             <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                             <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                             <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                         </div> -->
                     </div>
                 </div>

             </div>

             <div class="col-xl-8">

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
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-disciplinas">Disciplinas</button>
                             </li>

                             <li class="nav-item">
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-profes">Professores</button>
                             </li>

                             <li class="nav-item">
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-alunos">Alunos</button>
                             </li>

                         </ul>
                         <div class="tab-content pt-2">

                             <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                 <h5 class="card-title">Descrição</h5>
                                 <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>
                                 
                                 <h5 class="card-title">Dados do curso</h5>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Nome</div>
                                     <div class="col-lg-9 col-md-8"><?= $curso->nome ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Sigla</div>
                                     <div class="col-lg-9 col-md-8"><?= $curso->sigla ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Limite de Alunos</div>
                                     <div class="col-lg-9 col-md-8"><?= $curso->limite_alunos ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Nº de Alunos</div>
                                     <div class="col-lg-9 col-md-8"><?= $curso->qtd_alunos ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Nº de Disciplinas</div>
                                     <div class="col-lg-9 col-md-8"><?= $curso->qtd_disciplinas ?></div>
                                 </div>

                             </div>

                             <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                 <!-- Perfil Edit Form -->
                                 <form onsubmit="event.preventDefault();vue_app.editCurso(<?= $curso->id ?>)">
                                     <div class="row mb-3">
                                         <label for="nome" class="col-md-4 col-lg-3 col-form-label">Nome</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="nome" type="text" required class="form-control" id="nome" value="<?= $curso->nome ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="numero" class="col-md-4 col-lg-3 col-form-label">Sigle</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input type="text" required class="form-control" name="sigla" id="sigla" value="<?= $curso->sigla ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="numero" class="col-md-4 col-lg-3 col-form-label">Limite de alunos</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input type="text" required class="form-control" name="limite_alunos" id="limite_alunos" value="<?= $curso->limite_alunos ?>">
                                         </div>
                                     </div>


                                     <div class="text-center">
                                         <button type="submit" class="btn btn-primary">Salvar</button>
                                     </div>
                                 </form><!-- End Perfil Edit Form -->

                             </div>

                             <div class="tab-pane fade pt-3" id="profile-disciplinas">
                             </div>

                             <div class="tab-pane fade pt-3" id="profile-profes">
                             </div>

                             <div class="tab-pane fade pt-3" id="profile-alunos">
                             </div>

                         </div><!-- End Bordered Tabs -->

                     </div>
                 </div>

             </div>
         </div>
     </section>

 </main><!-- End #main -->