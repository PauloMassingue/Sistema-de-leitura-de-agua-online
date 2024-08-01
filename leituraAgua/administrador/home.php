<!-- Jumbotron -->
<div class="jumbotron text-center">
    <h1 class="display-4">Bem-vindo, Administrador</h1>
    <p class="lead">Gerencie o sistema, usuários, e tome decisões estratégicas com base em relatórios detalhados.</p>
</div>

<!-- Container -->
<div class="container">
    <!-- Carousel Section -->
    <section id="overview">
        <div id="overviewCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#overviewCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#overviewCarousel" data-slide-to="1"></li>
                <li data-target="#overviewCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../imagens/14.png" class="d-block w-100 carousel-image" alt="Visão Geral 1" loading="lazy">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Gerenciamento de Usuários</h5>
                        <p>Controle e gerencie os usuários do sistema.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../imagens/18.png" class="d-block w-100 carousel-image" alt="Visão Geral 2" loading="lazy">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Alertas de Clientes Irregulares</h5>
                        <p>Receba notificações sobre clientes com irregularidades no consumo de água.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../imagens/19.png" class="d-block w-100 carousel-image" alt="Visão Geral 3" loading="lazy">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Relatórios Estratégicos</h5>
                        <p>Acesse relatórios detalhados para tomada de decisões estratégicas.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#overviewCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#overviewCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="mt-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <img src="../imagens/20.png" class="card-img-top service-image" alt="Serviço 1" loading="lazy">
                    <div class="card-body">
                        <h5 class="card-title">Gestão de Usuários</h5>
                        <p class="card-text">Gerencie os usuários do sistema e suas permissões.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="../imagens/17.png" class="card-img-top service-image" alt="Serviço 2" loading="lazy">
                    <div class="card-body">
                        <h5 class="card-title">Alertas e Notificações</h5>
                        <p class="card-text">Receba alertas sobre clientes irregulares e tome as medidas necessárias.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="../imagens/15.jpg" class="card-img-top service-image" alt="Serviço 3" loading="lazy">
                    <div class="card-body">
                        <h5 class="card-title">Relatórios de Desempenho</h5>
                        <p class="card-text">Acesse relatórios detalhados para análises e decisões estratégicas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Footer -->
<footer class="bg-light text-center mt-5 py-4">
    <p>&copy; 2024 Leitura de Água Online. Todos os direitos reservados.</p>
</footer>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.getElementById('learnMoreBtn').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('overview').scrollIntoView({ behavior: 'smooth' });
    });
</script>

<!-- CSS -->
<style>
    .carousel-image {
        max-height: 500px;
        object-fit: cover;
    }

    .service-image {
        height: 200px;
        object-fit: cover;
    }

    .text-highlight {
        background-color: rgba(0, 0, 0, 0.5);
        padding: 10px;
        border-radius: 10px;
    }

    .text-highlight h5,
    .text-highlight p {
        color: white;
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }
</style>