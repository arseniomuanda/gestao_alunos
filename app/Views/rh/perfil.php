 <main id="main" class="main">

     <div class="pagetitle">
         <h1>Profile</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="/">Home</a></li>
                 <li class="breadcrumb-item"><a href="/rh/funcionarios">Funcionários</a></li>
                 <li class="breadcrumb-item active">Perfil</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->

     <section class="section profile">
         <div class="row">
             <div class="col-xl-4">

                 <div class="card">
                     <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                         <img src="<?= $funcionario->foto ?>" alt="Profile" class="rounded-circle">
                         <h2><?= $funcionario->nome ?> - <?= $funcionario->numero ?></h2>
                         <h3><?= $funcionario->email ?></h3>
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
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Dados</button>
                             </li>

                             <li class="nav-item">
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Utilizador</button>
                             </li>

                         </ul>
                         <div class="tab-content pt-2">

                             <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                 <h5 class="card-title">Descrição</h5>
                                 <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                                 <h5 class="card-title">Dados do cadidato</h5>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Nome Completo</div>
                                     <div class="col-lg-9 col-md-8"><?= $funcionario->nome ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Nº de Funcionario</div>
                                     <div class="col-lg-9 col-md-8"><?= $funcionario->numero ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">BI</div>
                                     <div class="col-lg-9 col-md-8"><?= $funcionario->bi ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Sexo</div>
                                     <div class="col-lg-9 col-md-8"><?= $funcionario->sexo ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">E-mail</div>
                                     <div class="col-lg-9 col-md-8"><?= $funcionario->email ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Telefone</div>
                                     <div class="col-lg-9 col-md-8"><?= $funcionario->telefone ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Endereço</div>
                                     <div class="col-lg-9 col-md-8"><?= $funcionario->municipio ?>, <?= $funcionario->bairro ?></div>
                                 </div>

                             </div>

                             <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                 <!-- Profile Edit Form -->
                                 <form onsubmit="event.preventDefault();vue_app.editFuncionario(<?= $funcionario->id ?>)">
                                     <div class="row mb-3">
                                         <label for="nome" class="col-md-4 col-lg-3 col-form-label">Nome Completo</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="nome" type="text" required class="form-control" id="nome" value="<?= $funcionario->nome ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="numero" class="col-md-4 col-lg-3 col-form-label">Nº de Funcionário</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input type="text" required class="form-control" name="numero" id="numero" value="<?= $funcionario->numero ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="bi" class="col-md-4 col-lg-3 col-form-label">BI</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input type="text" required class="form-control" name="bi" id="bi" value="<?= $funcionario->bi ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="sexo" class="col-md-4 col-lg-3 col-form-label">Sexo</label>
                                         <div class="col-md-8 col-lg-9">
                                             <select class="form-control" required name="sexo" id="sexo">
                                                 <option value="">Selecionar Sexo</option>
                                                 <option <?= $funcionario->sexo == 'F' ? 'selected' : '' ?> value="F">Feminino</option>
                                                 <option <?= $funcionario->sexo == 'M' ? 'selected' : '' ?> value="M">Masculino</option>
                                             </select>
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="about" class="col-md-4 col-lg-3 col-form-label">Descrição</label>
                                         <div class="col-md-8 col-lg-9">
                                             <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="email" class="col-md-4 col-lg-3 col-form-label">E-mail</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="email" required type="email" class="form-control" id="email" value="<?= $funcionario->email ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="telefone" class="col-md-4 col-lg-3 col-form-label">Telefone</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="telefone" required type="text" class="form-control" id="telefone" value="<?= $funcionario->telefone ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="municipio" class="col-md-4 col-lg-3 col-form-label">Município</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="municipio" type="text" class="form-control" id="municipio" value="<?= $funcionario->municipio ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="bairro" class="col-md-4 col-lg-3 col-form-label">Bairro</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="bairro" type="text" class="form-control" id="bairro" value="<?= $funcionario->bairro ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="rua" class="col-md-4 col-lg-3 col-form-label">Rua</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="rua" type="text" class="form-control" id="rua" value="<?= $funcionario->rua ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="n_casa" class="col-md-4 col-lg-3 col-form-label">Nº de casa</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="n_casa" type="text" class="form-control" id="n_casa" value="<?= $funcionario->n_casa ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="foto" class="col-md-4 col-lg-3 col-form-label">Fotografia Tipo Pass</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="foto" type="file" class="form-control" id="foto">
                                         </div>
                                     </div>

                                     <div class="text-center">
                                         <button type="submit" class="btn btn-primary">Salvar</button>
                                     </div>
                                 </form><!-- End Profile Edit Form -->

                             </div>

                             <div class="tab-pane fade pt-3" id="profile-change-password">
                                 <!-- Change Password Form -->
                                 <form onsubmit="event.preventDefault();vue_app.editPass(<?= $funcionario->id ?>)">

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
                                         <button type="button" onclick="vue_app.resetPass(<?= $funcionario->id ?>)" class="btn btn-danger"><i class="bi bi-unlock"></i> Reset Password</button>
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