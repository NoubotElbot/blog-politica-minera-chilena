<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politica Minera Chilena</title>
    <link rel="icon" type="image/jpg" href="<?= base_url('logo.jpg') ?>" />
    <link rel="stylesheet" href="<?= base_url('bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css') ?>">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?= base_url('css/blog.css') ?>" rel="stylesheet">
    <!-- Fontawesome -->
    <link href="<?= base_url('fontawesome/css/all.css') ?>" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <?php if (session()->get('isLoggedIn')) : ?>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-secondary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle"></i> <?= session()->get('username') ?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="<?= base_url('dashboard') ?>">Ir al Dashboard</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Cerrar Sesión</a></li>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <!-- <a class="link-secondary" href="#">Subscribe</a> Proximamente-->
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="<?= base_url() ?>">Politica Minera Chilena</a>
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <div class="search-bar">
                        <form role="search" method="get" id="searchform" action="">
                            <label for="search-input" id="search-input-label">
                                <i class="fas fa-search"></i>
                            </label>
                            <input type="text" value="" placeholder="buscar.." name="search" id="search-input" />
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 px-3 mb-2 bg-light">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 link-secondary" href="<?= base_url('categoria/empresas') ?>">Empresas</a>
                <a class="p-2 link-secondary" href="<?= base_url('categoria/politica') ?>">Politica</a>
                <a class="p-2 link-secondary" href="<?= base_url('categoria/tecnologia') ?>">Tecnología</a>
                <a class="p-2 link-secondary" href="<?= base_url('categoria/medio-ambiente') ?>">Medio Ambiente</a>
                <a class="p-2 link-secondary" href="<?= base_url('categoria/economia') ?>">Economía</a>
                <a class="p-2 link-secondary" href="<?= base_url('somos') ?>">Somos</a>
                <a class="p-2 link-secondary" href="<?= base_url('contacto') ?>">Contacto</a>
            </nav>
        </div>
    </div>

    <main class="container">
        <?= $this->renderSection('content') ?>
    </main><!-- /.container -->

    <footer class="blog-footer">
        <p>Siguenos
            <a href="https://www.instagram.com/politica_minera_chilena/"><i class="fab fa-instagram text-danger"></i></a>
            <a href="https://www.facebook.com/politica.minerachilena"><i class="fab fa-facebook text-primary"></i></a>
            <a href="https://www.linkedin.com/in/politica-minera-chilena-b85996201/"><i class="fab fa-linkedin" style="color:blue;"></i></a>
        </p>
        <p>
            <a href="#">Volver arriba</a>
        </p>
    </footer>
    <script src="<?= base_url('bootstrap-5.0.0-beta2-dist/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>