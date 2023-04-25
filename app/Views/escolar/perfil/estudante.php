 <main id="main" class="main">

     <div class="pagetitle">
         <h1>Profile</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="/">Home</a></li>
                 <li class="breadcrumb-item"><a href="/escolar/estudantes">Alunos</a></li>
                 <li class="breadcrumb-item active">Perfil</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->

     <section class="section profile">
         <div class="row">
             <div class="col-xl-4">

                 <div class="card">
                     <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                         <img src="/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                         <h2>Kevin Anderson - (numero)</h2>
                         <h3>teste@gmail.com</h3>
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
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Documentos</button>
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
                                     <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Nº de estudante</div>
                                     <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">BI</div>
                                     <div class="col-lg-9 col-md-8">00536790392SA83</div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Sexo</div>
                                     <div class="col-lg-9 col-md-8">Masculino</div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">E-mail</div>
                                     <div class="col-lg-9 col-md-8">teste@gmail.com</div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Telefone</div>
                                     <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Data de entrada</div>
                                     <div class="col-lg-9 col-md-8">93/64/3244</div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Data de nascimento</div>
                                     <div class="col-lg-9 col-md-8">93/64/3244</div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Pai</div>
                                     <div class="col-lg-9 col-md-8">93/64/3244</div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Mãe</div>
                                     <div class="col-lg-9 col-md-8">93/64/3244</div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Nome do Encarregado</div>
                                     <div class="col-lg-9 col-md-8">93/64/3244</div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Telefene do Encarregado</div>
                                     <div class="col-lg-9 col-md-8">93/64/3244</div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Endereço</div>
                                     <div class="col-lg-9 col-md-8">Luanda, reiu, rieur, 23</div>
                                 </div>

                             </div>

                             <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                 <!-- Profile Edit Form -->
                                 <form>
                                     <div class="row mb-3">
                                         <label for="nome" class="col-md-4 col-lg-3 col-form-label">Nome Completo</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="id" type="hidden" class="form-control" id="id" value="Kevin Anderson">
                                             <input name="nome" type="text" class="form-control" id="nome" value="Kevin Anderson">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="numero" class="col-md-4 col-lg-3 col-form-label">Nº de estudante</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input type="text" class="form-control" name="numero" id="numero" value="Kevin Anderson">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="bi" class="col-md-4 col-lg-3 col-form-label">BI</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input type="text" class="form-control" name="bi" id="bi" value="Kevin Anderson">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="bi" class="col-md-4 col-lg-3 col-form-label">Sexo</label>
                                         <div class="col-md-8 col-lg-9">
                                             <select type="text" class="form-control" name="bi" id="bi" value="Kevin Anderson">
                                                 <option value="">Selecionar Sexo</option>
                                                 <option value="F">Feminino</option>
                                                 <option value="M">Masculino</option>
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
                                             <input name="email" type="email" class="form-control" id="email" value="k.anderson@example.com">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="telefone" class="col-md-4 col-lg-3 col-form-label">Telefone</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="telefone" type="text" class="form-control" id="telefone" value="(436) 486-3538 x29071">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="dataentrada" class="col-md-4 col-lg-3 col-form-label">Data de Entrada</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="dataentrada" type="date" class="form-control" id="dataentrada" value="Web Designer">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="datanascimento" class="col-md-4 col-lg-3 col-form-label">Data de Nascimento</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="datanascimento" type="date" class="form-control" id="datanascimento" value="Web Designer">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="nome_pai" class="col-md-4 col-lg-3 col-form-label">Nome do Pai</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="nome_pai" type="date" class="form-control" id="nome_pai" value="Web Designer">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="nome_mae" class="col-md-4 col-lg-3 col-form-label">Nome da Mão</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="nome_mae" type="date" class="form-control" id="nome_mae" value="Web Designer">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="nome_encarregado" class="col-md-4 col-lg-3 col-form-label">Nome do ecarregado</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="nome_encarregado" type="date" class="form-control" id="nome_encarregado" value="Web Designer">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="municipio" class="col-md-4 col-lg-3 col-form-label">Município</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="municipio" type="date" class="form-control" id="municipio" value="Web Designer">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="bairro" class="col-md-4 col-lg-3 col-form-label">Bairro</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="bairro" type="date" class="form-control" id="bairro" value="Web Designer">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="rua" class="col-md-4 col-lg-3 col-form-label">Rua</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="rua" type="date" class="form-control" id="rua" value="Web Designer">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="n_casa" class="col-md-4 col-lg-3 col-form-label">Nº de casa</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="n_casa" type="date" class="form-control" id="n_casa" value="Web Designer">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="foto_tipo_pass" class="col-md-4 col-lg-3 col-form-label">Fotografia Tipo Pass</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="foto_tipo_pass" type="file" class="form-control" id="foto_tipo_pass">
                                         </div>
                                     </div>

                                     <div class="text-center">
                                         <button type="submit" class="btn btn-primary">Salvar</button>
                                     </div>
                                 </form><!-- End Profile Edit Form -->

                             </div>

                             <div class="tab-pane fade pt-3" id="profile-settings">

                                 <!-- Settings Form -->
                                 <form>

                                     <div class="row mb-3">
                                         <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                                         <div class="col-md-8 col-lg-9">
                                             <div class="form-check">
                                                 <input class="form-check-input" type="checkbox" id="changesMade" checked>
                                                 <label class="form-check-label" for="changesMade">
                                                     Changes made to your account
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="checkbox" id="newProducts" checked>
                                                 <label class="form-check-label" for="newProducts">
                                                     Information on new products and services
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="checkbox" id="proOffers">
                                                 <label class="form-check-label" for="proOffers">
                                                     Marketing and promo offers
                                                 </label>
                                             </div>
                                             <div class="form-check">
                                                 <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                                                 <label class="form-check-label" for="securityNotify">
                                                     Security alerts
                                                 </label>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="text-center">
                                         <button type="submit" class="btn btn-primary">Save Changes</button>
                                     </div>
                                 </form><!-- End settings Form -->

                             </div>

                             <div class="tab-pane fade pt-3" id="profile-change-password">
                                 <!-- Change Password Form -->
                                 <form>

                                     <div class="row mb-3">
                                         <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Palavra pass actual</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="currentPassword" type="password" class="form-control" id="currentPassword">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nova palavra pass</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="newpassword" type="password" class="form-control" id="newpassword">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Repetir nova palavra pass</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                         </div>
                                     </div>

                                     <div class="text-center">
                                         <button type="submit" class="btn btn-primary">Salvar</button>
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