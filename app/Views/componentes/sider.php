  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">
          <li class="nav-item">
              <a class="nav-link " href="/">
                  <i class="bi bi-grid"></i>
                  <span>Início</span>
              </a>
          </li><!-- End Dashboard Nav -->
          <li class="nav-item" v-if="acesso == 1">
              <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-menu-button-wide"></i><span>Candidaturas</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="/candidaturas/vagas">
                          <i class="bi bi-circle"></i><span>Campanhas</span>
                      </a>
                  </li>
                  <li>
                      <a href="/candidaturas/candidatos">
                          <i class="bi bi-circle"></i><span>Candidatos</span>
                      </a>
                  </li>
              </ul>
          </li><!-- End Components Nav -->
          <li class="nav-item" v-if="acesso <= 3">
              <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-journal-text"></i><span>Escolar</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="/escolar/disciplinas">
                          <i class="bi bi-circle"></i><span>Disciplinas</span>
                      </a>
                  </li>
                  <li>
                      <a href="/escolar/alunos">
                          <i class="bi bi-circle"></i><span>Alunos</span>
                      </a>
                  </li>
                  <li>
                      <a href="/escolar/provas">
                          <i class="bi bi-circle"></i><span>Provas</span>
                      </a>
                  </li>
              </ul>
          </li><!-- End Forms Nav -->
          <li class="nav-item" v-if="acesso == 1 || acesso == 3">
              <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-layout-text-window-reverse"></i><span>Gestão</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="/rh/funcionarios">
                          <i class="bi bi-circle"></i><span>Funcionários</span>
                      </a>
                  </li>
                  <li>
                      <a href="/config/salas">
                          <i class="bi bi-circle"></i><span>Salas</span>
                      </a>
                  </li>
                  <li>
                      <a href="/escolar/cursos">
                          <i class="bi bi-circle"></i><span>Cursos</span>
                      </a>
                  </li>
                  <li>
                      <a href="/config/turmas">
                          <i class="bi bi-circle"></i><span>Turmas</span>
                      </a>
                  </li>
              </ul>
          </li><!-- End Tables Nav -->
          <li class="nav-item" v-if="acesso == 4">
              <a class="nav-link " :href="'/escolar/alunos/' + aluno">
                  <i class="bi bi-grid"></i>
                  <span>Perfil do Aluno</span>
              </a>
          </li><!-- End Dashboard Nav -->
      </ul>

  </aside><!-- End Sidebar-->