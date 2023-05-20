<main id="main" class="main">

    <div class="pagetitle">
        <h1>Nova Campanha</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/candidaturas/vagas">Campanhas</a></li>
                <li class="breadcrumb-item active">Nova</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dados da campanha</h5>

                        <!-- Multi Columns Form -->
                        <form class="row g-3" method="post" onsubmit="event.preventDefault();vue_app.addVaga()">
                            <div class="col-md-6">
                                <label for="inputName5" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" placeholder="Nome da candidatura">
                            </div>
                            <div class="col-6">
                                <label for="inputAddress5" class="form-label">Limite de Vagas</label>
                                <input type="number" class="form-control" id="maximo_candidados" placeholder="Número de vagas">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail5" class="form-label">Inicio</label>
                                <input type="date" class="form-control" id="inicio">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword5" class="form-label">Fim</label>
                                <input type="date" class="form-control" id="fim">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <button type="reset" class="btn btn-secondary">Limpar</button>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->