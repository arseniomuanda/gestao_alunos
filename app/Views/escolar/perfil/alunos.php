 <main id="main" class="main">

     <div class="pagetitle">
         <h1>Perfil</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="/">Home</a></li>
                 <li class="breadcrumb-item"><a href="/escolar/alunos">Alunos</a></li>
                 <li class="breadcrumb-item active">Perfil</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->

     <section class="section profile">
         <div class="row">
             <div class="col-xl-4">

                 <div class="card <?= ($aluno->foto_tipo_pass == '' ||
                                        $aluno->atestado_medico == '' ||
                                        $aluno->certificado == '' ||
                                        $aluno->declaracao_notas == '' ||
                                        $aluno->copia_bi == '') ? 'bg-warning' : 'bg-success' ?>">
                     <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                         <img src="<?= $aluno->foto_tipo_pass ?>" alt="Perfil" class="rounded-circle">
                         <h2><?= $aluno->nome ?> - (<?= $aluno->numero ?>)</h2>
                         <h3><?= $aluno->email ?></h3>
                         <?= ($aluno->foto_tipo_pass == '' ||
                                $aluno->atestado_medico == '' ||
                                $aluno->certificado == '' ||
                                $aluno->declaracao_notas == '' ||
                                $aluno->copia_bi == '') ? '<h3 class="text-white">Dados imcompleto</h3>' : '' ?>
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
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Dados</button>
                             </li>

                             <li class="nav-item">
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#list-provas">Notas</button>
                             </li>

                             <li class="nav-item">
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Documentos</button>
                             </li>

                             <li class="nav-item">
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Utilizador</button>
                             </li>

                             <li class="nav-item">
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-options">Opções</button>
                             </li>

                         </ul>
                         <div class="tab-content pt-2">

                             <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                 <h5 class="card-title">Descrição</h5>
                                 <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                                 <h5 class="card-title">Dados do cadidato</h5>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Nome Completo</div>
                                     <div class="col-lg-9 col-md-8"><?= $aluno->nome ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Nº de estudante</div>
                                     <div class="col-lg-9 col-md-8"><?= $aluno->numero ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">BI</div>
                                     <div class="col-lg-9 col-md-8"><?= $aluno->bi ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Sexo</div>
                                     <div class="col-lg-9 col-md-8"><?= $aluno->sexo == 'M' ? 'Masculino' : 'Feminino' ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">E-mail</div>
                                     <div class="col-lg-9 col-md-8"><?= $aluno->email ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Telefone</div>
                                     <div class="col-lg-9 col-md-8"><?= $aluno->telefone ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Data de entrada</div>
                                     <div class="col-lg-9 col-md-8"><?= $aluno->dataentrada ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Data de nascimento</div>
                                     <div class="col-lg-9 col-md-8"><?= $aluno->datanascimento ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Pai</div>
                                     <div class="col-lg-9 col-md-8"><?= $aluno->nome_pai ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Mãe</div>
                                     <div class="col-lg-9 col-md-8"><?= $aluno->nome_mae ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Nome do Encarregado</div>
                                     <div class="col-lg-9 col-md-8"><?= $aluno->nome_encarregado ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Telefene do Encarregado</div>
                                     <div class="col-lg-9 col-md-8"><?= $aluno->telefone_encarregado ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Endereço</div>
                                     <div class="col-lg-9 col-md-8"><?= $aluno->municipio ?>, <?= $aluno->bairro ?>, <?= $aluno->rua ?>, <?= $aluno->n_casa ?></div>
                                 </div>

                             </div>

                             <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                 <!-- Perfil Edit Form -->
                                 <form method="post" onsubmit="event.preventDefault();vue_app.editAluno(<?= $aluno->id ?>)">
                                     <div class="row mb-3">
                                         <label for="nome" class="col-md-4 col-lg-3 col-form-label">Nome Completo</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="nome" type="text" class="form-control" id="nome" value="<?= $aluno->nome ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="numero" class="col-md-4 col-lg-3 col-form-label">Nº de estudante</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input type="text" class="form-control" name="numero" id="numero" value="<?= $aluno->numero ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="bi" class="col-md-4 col-lg-3 col-form-label">BI</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input type="text" class="form-control" name="bi" id="bi" value="<?= $aluno->bi ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="bi" class="col-md-4 col-lg-3 col-form-label">Sexo</label>
                                         <div class="col-md-8 col-lg-9">
                                             <select type="text" class="form-control" name="sexo" id="sexo">
                                                 <option value="">Selecionar Sexo</option>
                                                 <option <?= $aluno->sexo == 'F' ? 'selected' : '' ?> value="F">Feminino</option>
                                                 <option <?= $aluno->sexo == 'M' ? 'selected' : '' ?> value="M">Masculino</option>
                                             </select>
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="email" class="col-md-4 col-lg-3 col-form-label">E-mail</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="email" type="email" class="form-control" id="email" value="<?= $aluno->email ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="telefone" class="col-md-4 col-lg-3 col-form-label">Telefone</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="telefone" type="text" class="form-control" id="telefone" value="<?= $aluno->telefone ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="dataentrada" class="col-md-4 col-lg-3 col-form-label">Data de Entrada</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="dataentrada" type="date" class="form-control" id="dataentrada" value="<?= $aluno->dataentrada ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="datanascimento" class="col-md-4 col-lg-3 col-form-label">Data de Nascimento</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="datanascimento" type="date" class="form-control" id="datanascimento" value="<?= $aluno->datanascimento ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="nome_pai" class="col-md-4 col-lg-3 col-form-label">Nome do Pai</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="nome_pai" type="text" class="form-control" id="nome_pai" value="<?= $aluno->nome_pai ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="nome_mae" class="col-md-4 col-lg-3 col-form-label">Nome da Mão</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="nome_mae" type="text" class="form-control" id="nome_mae" value="<?= $aluno->nome_mae ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="nome_encarregado" class="col-md-4 col-lg-3 col-form-label">Nome do ecarregado</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="nome_encarregado" type="text" class="form-control" id="nome_encarregado" value="<?= $aluno->nome_encarregado ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="telefone_encarregado" class="col-md-4 col-lg-3 col-form-label">Telefone do ecarregado</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="telefone_encarregado" type="text" class="form-control" id="telefone_encarregado" value="<?= $aluno->telefone_encarregado ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="municipio" class="col-md-4 col-lg-3 col-form-label">Município</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="municipio" type="text" class="form-control" id="municipio" value="<?= $aluno->municipio ?>">
                                         </div>
                                     </div>

                                     <div class=" row mb-3">
                                         <label for="bairro" class="col-md-4 col-lg-3 col-form-label">Bairro</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="bairro" type="text" class="form-control" id="bairro" value="<?= $aluno->bairro ?>">
                                         </div>
                                     </div>

                                     <div class=" row mb-3">
                                         <label for="rua" class="col-md-4 col-lg-3 col-form-label">Rua</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="rua" type="text" class="form-control" id="rua" value="<?= $aluno->rua ?>">
                                         </div>
                                     </div>

                                     <div class=" row mb-3">
                                         <label for="n_casa" class="col-md-4 col-lg-3 col-form-label">Nº de casa</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="n_casa" type="text" class="form-control" id="n_casa" value="<?= $aluno->n_casa ?>">
                                         </div>
                                     </div>

                                     <div class=" text-center">
                                         <button type="submit" class="btn btn-primary">Salvar</button>
                                     </div>
                                 </form><!-- End Perfil Edit Form -->

                             </div>

                             <div class="tab-pane fade profile-edit pt-3" id="list-provas">
                                 <p class="btn-outline-secondary">Primeiro Trimestre</p>
                                 <table class="table table-striped">
                                     <thead>
                                         <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Disciplina</th>
                                             <th scope="col">Nome da prova</th>
                                             <th scope="col">Valor</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php $i = 0;
                                            foreach ($notas_primeiro as $key => $value) { ?>
                                             <tr>
                                                 <th scope="row"><?= ++$i ?></th>
                                                 <td><?= $value->disciplina ?></td>
                                                 <td><?= $value->nome ?></td>
                                                 <td><?= $value->valor ?></td>
                                             </tr>
                                         <?php } ?>
                                     </tbody>
                                 </table>

                                 <p class="btn-outline-secondary">Segundo Trimestre</p>
                                 <table class="table table-striped">
                                     <thead>
                                         <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Disciplina</th>
                                             <th scope="col">Nome da prova</th>
                                             <th scope="col">Valor</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php $i = 0;
                                            foreach ($notas_segundo as $key => $value) { ?>
                                             <tr>
                                                 <th scope="row"><?= ++$i ?></th>
                                                 <td><?= $value->disciplina ?></td>
                                                 <td><?= $value->nome ?></td>
                                                 <td><?= $value->valor ?></td>
                                             </tr>
                                         <?php } ?>
                                     </tbody>
                                 </table>

                                 <p class="btn-outline-secondary">Terceiro Trimestre</p>
                                 <table class="table table-striped">
                                     <thead>
                                         <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Disciplina</th>
                                             <th scope="col">Nome da prova</th>
                                             <th scope="col">Valor</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php $i = 0;
                                            foreach ($notas_terceiro as $key => $value) { ?>
                                             <tr>
                                                 <th scope="row"><?= ++$i ?></th>
                                                 <td><?= $value->disciplina ?></td>
                                                 <td><?= $value->nome ?></td>
                                                 <td><?= $value->valor ?></td>
                                             </tr>
                                         <?php } ?>
                                     </tbody>
                                 </table>
                             </div>

                             <div class="tab-pane fade pt-3" id="profile-settings">
                                 <!-- Settings Form -->
                                 <form method="post" onsubmit="event.preventDefault();vue_app.updateDocumentos(<?= $aluno->id ?>)">
                                     <div class="row mb-3">
                                         <label for="foto_tipo_pass" class="col-md-4 col-lg-3 col-form-label <?= $aluno->foto_tipo_pass == '' ? 'text-danger' : 'text-success' ?>">Fotografia Tipo Pass</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="foto_tipo_pass" type="file" class="form-control" id="foto_tipo_pass">
                                         </div>
                                     </div>
                                     <div class="row mb-3">
                                         <label for="atestado_medico" class="col-md-4 col-lg-3 col-form-label <?= $aluno->atestado_medico == '' ? 'text-danger' : 'text-success' ?>">Atestado Médico</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="atestado_medico" type="file" class="form-control" id="atestado_medico">
                                         </div>
                                     </div>
                                     <div class="row mb-3">
                                         <label for="certificado" class="col-md-4 col-lg-3 col-form-label <?= $aluno->certificado == '' ? 'text-danger' : 'text-success' ?>">Certificado</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="certificado" type="file" class="form-control" id="certificado">
                                         </div>
                                     </div>
                                     <div class="row mb-3">
                                         <label for="declaracao_notas" class="col-md-4 col-lg-3 col-form-label <?= $aluno->declaracao_notas == '' ? 'text-danger' : 'text-success' ?>">Declaração da Nona</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="declaracao_notas" type="file" class="form-control" id="declaracao_notas">
                                         </div>
                                     </div>
                                     <div class="row mb-3">
                                         <label for="copia_bi" class="col-md-4 col-lg-3 col-form-label <?= $aluno->copia_bi == '' ? 'text-danger' : 'text-success' ?>">Cópia do BI</label>
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
                                 <form onsubmit="event.preventDefault();vue_app.editPass(<?= $aluno->utilizador ?>)">

                                     <div class="row mb-3">
                                         <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Palavra pass actual</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="currentPassword" required id="currentPassword" type="password" class="form-control" id="currentPassword">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nova palavra pass</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="newpassword" required id="newpassword" type="password" class="form-control" id="newpassword">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Repetir nova palavra pass</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="renewpassword" required id="renewpassword" type="password" class="form-control" id="renewPassword">
                                         </div>
                                     </div>

                                     <div class="text-center">
                                         <button type="submit" class="btn btn-primary">Salvar</button>
                                         <button type="button" onclick="vue_app.resetPass(<?= $aluno->utilizador  ?>)" class="btn btn-danger"><i class="bi bi-unlock"></i> Reset Password</button>
                                     </div>
                                 </form><!-- End Change Password Form -->

                             </div>

                             <div class="tab-pane fade pt-3" id="profile-options">
                                 <button type="submit" class="btn <?= $aluno->estado == 'Activo' ? 'btn-success' : 'btn-outline-secondary' ?>">Activo</button>
                                 <button type="submit" class="btn <?= $aluno->estado == 'Desistente' ? 'btn-danger' : 'btn-outline-secondary' ?>">Desistente</button>
                             </div>

                         </div><!-- End Bordered Tabs -->

                     </div>
                 </div>

             </div>
         </div>
     </section>

 </main><!-- End #main -->