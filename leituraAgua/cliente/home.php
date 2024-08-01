

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Sobre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Serviços</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contato</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Jumbotron -->
<div class="jumbotron text-center">
    <h1 class="display-4">Bem-vindo ao Sistema de Leitura de Água Online</h1>
    <p class="lead">Monitore o consumo de água de forma prática e eficiente.</p>
    <a id="learnMoreBtn" class="btn btn-primary btn-lg" href="#" role="button">Saiba mais</a>
</div>

<!-- Container -->
<div class="container">
    <!-- Carousel Section -->
    <section id="about">
        <div id="aboutCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#aboutCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#aboutCarousel" data-slide-to="1"></li>
                <li data-target="#aboutCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../imagens/blue-2178639_1280.jpg" class="d-block w-100 carousel-image" alt="Imagem 1" loading="lazy">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Sobre Nós</h5>
                        <p>Somos uma empresa dedicada a fornecer soluções inovadoras para o monitoramento do consumo de água.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../imagens/water-4967843_1280.jpg" class="d-block w-100 carousel-image" alt="Imagem 2" loading="lazy">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Monitoramento em Tempo Real</h5>
                        <p>Acompanhe o consumo de água em tempo real através de nosso painel online.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../imagens/water-1632785_1920.jpg" class="d-block w-100 carousel-image" alt="Imagem 3" loading="lazy">
                    <div class="carousel-caption d-none d-md-block text-highlight">
                        <h5>Economia e Sustentabilidade</h5>
                        <p>Nosso sistema ajuda a economizar recursos e reduzir custos.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#aboutCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#aboutCarousel" role="button" data-slide="next">
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
                    <img src="../imagens/3.jpg" class="card-img-top service-image" alt="Serviço 1" loading="lazy">
                    <div class="card-body">
                        <h5 class="card-title">Monitoramento em Tempo Real</h5>
                        <p class="card-text">Acompanhe o consumo de água em tempo real através de nosso painel online.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="../imagens/1.jpg" class="card-img-top service-image" alt="Serviço 2" loading="lazy">
                    <div class="card-body">
                        <h5 class="card-title">Alertas e Notificações</h5>
                        <p class="card-text">Receba alertas e notificações sobre seu consumo de água e possíveis vazamentos.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="../imagens/2.jpg" class="card-img-top service-image" alt="Serviço 3" loading="lazy">
                    <div class="card-body">
                        <h5 class="card-title">Relatórios Detalhados</h5>
                        <p class="card-text">Acesse relatórios detalhados sobre o consumo de água em sua residência ou empresa.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="mt-5">
        <h2>Contacto</h2>
        <p>Entre em contato conosco para mais informações sobre nossos serviços e reclamações.</p>
        <form action="?page=msg" method="POST">
        <input type="hidden" name="acao" value="mensagem">
            <div class="form-group">
                <label for="message">Mensagem</label>
                <textarea class="form-control" id="message" name="message" rows="3" placeholder="Sua mensagem"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </section>
</div>

<!-- Footer -->
<footer class="bg-light text-center mt-5 py-4">
    <p>&copy; 2024 Leitura de Água Online. Todos os direitos reservados.</p>
</footer>

<!-- JavaScript -->
<script>
    document.getElementById('learnMoreBtn').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('services').scrollIntoView({ behavior: 'smooth' });
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

    .text-highlight h5,
    .text-highlight p {
        color: white;
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }
</style>