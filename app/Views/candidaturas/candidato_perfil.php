 <main id="main" class="main">

     <div class="pagetitle">
         <h1>Perfil</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                 <li class="breadcrumb-item"><a href="/candidaturas/candidatos">Candidatos</a></li>
                 <li class="breadcrumb-item active">Perfil</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->

     <section class="section profile">
         <div class="row">
             <div class="col-xl-4">

                 <div class="card">
                     <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                         <img src="<?= $candidato->foto_tipo_pass ?>" alt="Perfil" class="rounded-circle">
                         <h2><?= $candidato->nome ?></h2>
                         <h3><?= $candidato->email ?></h3>
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
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Perfil</button>
                             </li>

                             <li class="nav-item">
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Documentos</button>
                             </li>

                             <li class="nav-item">
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-options">Opções</button>
                             </li>

                         </ul>
                         <div class="tab-content pt-2">

                             <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                 
                                 <h5 class="card-title">Dados do cadidato</h5>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Nome Completo</div>
                                     <div class="col-lg-9 col-md-8"><?= $candidato->nome ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">BI</div>
                                     <div class="col-lg-9 col-md-8"><?= $candidato->bi ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">E-mail</div>
                                     <div class="col-lg-9 col-md-8"><?= $candidato->email ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Telefone</div>
                                     <div class="col-lg-9 col-md-8"><?= $candidato->telefone ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Data de Nascimento</div>
                                     <div class="col-lg-9 col-md-8"><?= date('d/m/Y', strtotime($candidato->datanascimento)) ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Opção 1</div>
                                     <div class="col-lg-9 col-md-8"><?= $candidato->opcao1 ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Opção 2</div>
                                     <div class="col-lg-9 col-md-8"><?= $candidato->opcao2 ?></div>
                                 </div>

                             </div>

                             <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                 <!-- Perfil Edit Form -->
                                 <form onsubmit="event.preventDefault();vue_app.editCadidato(<?= $candidato->id ?>)" id="update_candidato">
                                     <div class="row mb-3">
                                         <label for="nome" class="col-md-4 col-lg-3 col-form-label">Nome Completo</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="nome" type="text" class="form-control" id="nome" value="<?= $candidato->nome ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="nome" class="col-md-4 col-lg-3 col-form-label">Bi</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="bi" type="text" class="form-control" id="bi" value="<?= $candidato->bi ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="email" class="col-md-4 col-lg-3 col-form-label">E-mail</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="email" type="email" class="form-control" id="email" value="<?= $candidato->email ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="telefone" class="col-md-4 col-lg-3 col-form-label">Telefone</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="telefone" type="text" class="form-control" id="telefone" value="<?= $candidato->telefone ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="datanascimento" class="col-md-4 col-lg-3 col-form-label">Data de Nascimento</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="datanascimento" type="date" class="form-control" id="datanascimento" value="<?= $candidato->datanascimento ?>">
                                         </div>
                                     </div>

                                     <div class="text-center">
                                         <button type="submit" class="btn btn-primary">Salvar</button>
                                     </div>
                                 </form><!-- End Perfil Edit Form -->

                             </div>

                             <div class="tab-pane fade pt-3" id="profile-settings">

                                 <!-- Settings Form -->
                                 <form method="post" onsubmit="event.preventDefault();vue_app.updateDocumentos(<?= $candidato->id ?>, false)">
                                     <div class="row mb-3">
                                         <label for="foto_tipo_pass" class="col-md-4 col-lg-3 col-form-label <?= $candidato->foto_tipo_pass == '' ? 'text-danger' : 'text-success' ?>">Fotografia Tipo Pass</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="foto_tipo_pass" type="file" class="form-control" id="foto_tipo_pass">
                                         </div>
                                     </div>
                                     <div class="row mb-3">
                                         <label for="atestado_medico" class="col-md-4 col-lg-3 col-form-label <?= $candidato->atestado_medico == '' ? 'text-danger' : 'text-success' ?>">Atestado Médico</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="atestado_medico" type="file" class="form-control" id="atestado_medico">
                                         </div>
                                     </div>
                                     <div class="row mb-3">
                                         <label for="certificado" class="col-md-4 col-lg-3 col-form-label <?= $candidato->certificado == '' ? 'text-danger' : 'text-success' ?>">Certificado</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="certificado" type="file" class="form-control" id="certificado">
                                         </div>
                                     </div>
                                     <div class="row mb-3">
                                         <label for="declaracao_notas" class="col-md-4 col-lg-3 col-form-label <?= $candidato->declaracao_notas == '' ? 'text-danger' : 'text-success' ?>">Declaração da Nona</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="declaracao_notas" type="file" class="form-control" id="declaracao_notas">
                                         </div>
                                     </div>
                                     <div class="row mb-3">
                                         <label for="copia_bi" class="col-md-4 col-lg-3 col-form-label <?= $candidato->copia_bi == '' ? 'text-danger' : 'text-success' ?>">Cópia do BI</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="copia_bi" type="file" class="form-control" id="copia_bi">
                                         </div>
                                     </div>
                                     <div class="text-center">
                                         <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                                     </div>
                                 </form><!-- End settings Form -->

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

                             <div class="tab-pane fade pt-3" id="profile-options">
                                 <?php if ($candidato->estado == 0) { ?>
                                     <button type="button" onclick="vue_app.updateEstado(<?= $candidato->id ?>, 1)" class="btn <?= $candidato->estado == '0' ? 'btn-success' : 'btn-outline-secondary' ?>">Aprovar</button>
                                     <button type="button" onclick="vue_app.updateEstado(<?= $candidato->id ?>, 2)" class="btn <?= $candidato->estado == '0' ? 'btn-danger' : 'btn-outline-secondary' ?>">Reprovar</button>
                                 <?php } else if ($candidato->estado != 3) { ?>
                                     <button type="button" class="btn <?= $candidato->estado == '2' ? 'btn-outline-danger' : 'btn-outline-success' ?>"><?= $candidato->estado == '2' ? 'Reprovado' : 'Aprovado' ?></button>
                                     <button type="button" onclick="vue_app.updateEstado(<?= $candidato->id ?>, 0)" class="btn 'btn-outline-secondary">Reset</button>
                                     <?php if ($candidato->estado == 1) { ?>
                                         <form method="post" id="matrucularForm" onsubmit="event.preventDefault();vue_app.matricularCandidato(<?= $candidato->id ?>)">
                                             <div class="row">
                                                 <fieldset class="reset w-100">
                                                     <legend class="reset">Matricula</legend>
                                                     <div class="row">
                                                         <div class="col-md-6">
                                                             <div class="form-floating mb-3">
                                                                 <input type="text" class="form-control" id="nome_pai" name="nome_pai" placeholder="">
                                                                 <label for="floatingInput">Nome do pai</label>
                                                             </div>
                                                         </div>
                                                         <div class="col-md-6">
                                                             <div class="form-floating mb-3">
                                                                 <input type="text" class="form-control" id="nome_mae" name="nome_mae" placeholder="">
                                                                 <label for="floatingInput">Nome da mãe</label>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="row">
                                                         <div class="col-md-6">
                                                             <div class="form-floating mb-3">
                                                                 <input required type="text" class="form-control" id="nome_encarregado" name="nome_encarregado" placeholder="">
                                                                 <label for="floatingInput">Nome do Encarregado</label>
                                                             </div>
                                                         </div>
                                                         <div class="col-md-6">
                                                             <div class="form-floating mb-3">
                                                                 <input required type="text" class="form-control" id="telefone_encarregado" name="telefone_encarregado" placeholder="">
                                                                 <label for="floatingInput">Telefone do Encarregado</label>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="row">
                                                         <div class="col-md-6">
                                                             <div class="form-floating mb-3">
                                                                 <select required onchange="vue_app.buscarCursos(this.value)" class="form-control" id="curso" name="curso">
                                                                     <option value="">Selecionar Curso</option>
                                                                     <?php foreach ($cursos as $key => $value) { ?>
                                                                         <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                                                     <?php } ?>
                                                                 </select>
                                                                 <label for="floatingInput">Curso</label>
                                                             </div>
                                                         </div>
                                                         <div class="col-md-6">
                                                             <div class="form-floating mb-3">
                                                                 <select required class="form-control" id="turma" name="turma">
                                                                     <option>Selecionar Turma</option>
                                                                     <option v-for="item in turmas" :value="item.id">{{item.nome}}</option>
                                                                 </select>
                                                                 <label for="floatingInput">Turma</label>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="row">
                                                         <div class="col-md-6">
                                                             <div class="form-floating mb-3">
                                                                 <input required type="date" class="form-control" value="<?= date('Y-m-d') ?>" id="dataentrada" name="dataentrada" placeholder="">
                                                                 <label for="floatingInput">Data de entrada</label>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </fieldset>
                                             </div>
                                             <br>
                                             <div class="text-center">
                                                 <button type="submit" class="btn btn-primary">Matricular</button>
                                                 <button type="reset" class="btn btn-secondary">Reset</button>
                                             </div>
                                         </form>
                                     <?php } ?>
                                 <?php } else { ?>
                                     <button type="button" class="btn btn-outline-success">Matriculado</button>
                                 <?php } ?>
                             </div>

                         </div><!-- End Bordered Tabs -->

                     </div>
                 </div>

             </div>
         </div>
     </section>

 </main><!-- End #main -->