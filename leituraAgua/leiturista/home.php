<div class="jumbotron text-center">
    <h1 class="display-4">Bem-vindo, Leiturista</h1>
    <p class="lead">Acompanhe suas tarefas e atualize as leituras dos clientes.</p>
    <a id="learnMoreBtn" class="btn btn-primary btn-lg" href="#" role="button">Saber mais</a>
</div>

<!-- Container -->
<div class="container">
    <!-- Carousel Section -->
    <section id="tasks">
        <div id="tasksCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#tasksCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#tasksCarousel" data-slide-to="1"></li>
                <li data-target="#tasksCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../imagens/9.jpg" class="d-block w-100 carousel-image" alt="Tarefa 1" loading="lazy">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Leitura em Andamento</h5>
                        <p>Acompanhe as leituras que estão sendo feitas.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../imagens/8.jpg" class="d-block w-100 carousel-image" alt="Tarefa 2" loading="lazy">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Clientes Atendidos</h5>
                        <p>Veja os clientes que já foram atendidos.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../imagens/10.jpg" class="d-block w-100 carousel-image" alt="Tarefa 3" loading="lazy">
                    <div class="carousel-caption d-none d-md-block text-highlight">
                        <h5>Relatórios Detalhados</h5>
                        <p>Acesse relatórios detalhados sobre as leituras realizadas.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#tasksCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#tasksCarousel" role="button" data-slide="next">
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
                    <img src="../imagens/11.jpg" class="card-img-top service-image" alt="Serviço 1" loading="lazy">
                    <div class="card-body">
                        <h5 class="card-title">Tarefas</h5>
                        <p class="card-text">Veja a lista de tarefas que precisam ser completadas.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="../imagens/12.jpg" class="card-img-top service-image" alt="Serviço 2" loading="lazy">
                    <div class="card-body">
                        <h5 class="card-title">Clientes Pendentes</h5>
                        <p class="card-text">Visualize os clientes que ainda precisam ser atendidos.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="../imagens/6.jpg" class="card-img-top service-image" alt="Serviço 3" loading="lazy">
                    <div class="card-body">
                        <h5 class="card-title">Relatórios de Leitura</h5>
                        <p class="card-text">Acesse relatórios detalhados sobre as leituras realizadas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="mt-5">
        <h2>Contato</h2>
        <p>Entre em contato com a administração para mais informações ou suporte.</p>

        <!-- formulario para comunicar o administrador -->
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.getElementById('learnMoreBtn').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('tasks').scrollIntoView({ behavior: 'smooth' });
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