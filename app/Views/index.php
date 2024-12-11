<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfica Moderna</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            color: #333;
        }

        .navbar {
            background-color: #343a40;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: 700;
        }

        .hero-section {
            background: url('https://via.placeholder.com/1920x600') no-repeat center center;
            background-size: cover;
            color: #fff;
            text-align: center;
            padding: 150px 0;
            position: relative;
            margin-top: 56px;
            /* Para compensar a altura do navbar */
        }

        .hero-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero-section .container {
            position: relative;
            z-index: 1;
        }

        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero-section p {
            font-size: 1.5rem;
            font-weight: 300;
        }

        .products-section {
            padding: 50px 0;
            background-color: #f8f9fa;
        }

        .products-section .card {
            border: none;
            transition: transform 0.3s;
            margin-bottom: 30px;
        }

        .products-section .card:hover {
            transform: scale(1.05);
        }

        .products-section .card-title {
            font-weight: 500;
        }

        .contact-section {
            padding: 50px 0;
        }

        .contact-section h2,
        .info-section h2 {
            font-weight: 700;
            margin-bottom: 30px;
        }

        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .footer p {
            margin: 0;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Gráfica Moderna</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#products">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contato</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#info">Informações</a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <h1>Bem-vindo à Gráfica Moderna</h1>
            <p>Qualidade e eficiência em todos os nossos serviços</p>
            <a href="#products" class="btn btn-primary btn-lg mt-4">Conheça nossos produtos</a>
        </div>
    </section>

    <section id="products" class="products-section">
        <div class="container">
            <h2 class="text-center mb-5">Nossos Produtos</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/350x250" class="card-img-top" alt="Cartões de Visita">
                        <div class="card-body">
                            <h5 class="card-title">Cartões de Visita</h5>
                            <p class="card-text">Cartões de visita personalizados para você e sua empresa.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/350x250" class="card-img-top" alt="Folders">
                        <div class="card-body">
                            <h5 class="card-title">Folders</h5>
                            <p class="card-text">Folders de alta qualidade para divulgação de produtos e serviços.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/350x250" class="card-img-top" alt="Banners">
                        <div class="card-body">
                            <h5 class="card-title">Banners</h5>
                            <p class="card-text">Banners para eventos, promoções e muito mais.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/350x250" class="card-img-top" alt="Flyers">
                        <div class="card-body">
                            <h5 class="card-title">Flyers</h5>
                            <p class="card-text">Flyers promocionais para divulgação de eventos e ofertas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/350x250" class="card-img-top" alt="Adesivos">
                        <div class="card-body">
                            <h5 class="card-title">Adesivos</h5>
                            <p class="card-text">Adesivos personalizados para diversas finalidades.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/350x250" class="card-img-top" alt="Panfletos">
                        <div class="card-body">
                            <h5 class="card-title">Panfletos</h5>
                            <p class="card-text">Panfletos informativos e promocionais.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/350x250" class="card-img-top" alt="Convites">
                        <div class="card-body">
                            <h5 class="card-title">Convites</h5>
                            <p class="card-text">Convites personalizados para eventos especiais.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/350x250" class="card-img-top" alt="Calendários">
                        <div class="card-body">
                            <h5 class="card-title">Calendários</h5>
                            <p class="card-text">Calendários personalizados para brindes e promoções.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/350x250" class="card-img-top" alt="Posters">
                        <div class="card-body">
                            <h5 class="card-title">Posters</h5>
                            <p class="card-text">Posters para decoração e eventos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Contato</h2>
                    <p>Entre em contato conosco através do formulário abaixo:</p>
                    <form>
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" placeholder="Seu nome">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Seu email">
                        </div>
                        <div class="form-group">
                            <label for="message">Mensagem</label>
                            <textarea class="form-control" id="message" rows="4" placeholder="Sua mensagem"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h2>Informações</h2>
                    <p>Endereço: Rua Exemplo, 123, Cidade, Estado</p>
                    <p>Telefone: (11) 1234-5678</p>
                    <p>Email: contato@graficamoderna.com</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Gráfica Moderna. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $('form').on('submit', function(event) {
            event.preventDefault();
            alert('Formulário enviado com sucesso!');
        });
    </script>
</body>

</html>