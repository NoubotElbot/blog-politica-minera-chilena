<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="icon" type="image/jpg" href="<?= base_url('logo.jpg') ?>" />
    <!-- Fontawesome -->
    <link type="text/css" href="<?= base_url('fontawesome/css/all.css') ?>" rel="stylesheet">
    <!-- Volt CSS -->
    <link type="text/css" href="<?= base_url('css/volt.css') ?>" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-md-none">
        <a class="navbar-brand me-lg-5" href="<?= base_url() ?>">
            <img class="navbar-brand-dark" src="<?= base_url('logo.jpg') ?>" alt="Volt logo" /> <img class="navbar-brand-light" src="<?= base_url() ?>/img/brand/dark.svg" alt="Volt logo" />
        </a>
        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <nav id="sidebarMenu" class="sidebar d-md-block bg-dark text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
                <div class="d-flex align-items-center">
                    <div class="user-avatar lg-avatar me-4">
                        <img src="<?= base_url() ?>/user-logo.png" class="card-img-top rounded-circle border-white" alt="<?= session()->get('username') ?>">
                    </div>
                    <div class="d-block">
                        <h2 class="h6">Hi, <?= session()->get('username') ?></h2>
                        <a href="<?= base_url('logout') ?>" class="btn btn-secondary text-dark btn-xs"><span class="me-2"><span class="fas fa-sign-out-alt"></span></span>Cerrar Sesión</a>
                    </div>
                </div>
                <div class="collapse-close d-md-none">
                    <a href="#sidebarMenu" class="fas fa-times" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation"></a>
                </div>
            </div>
            <ul class="nav flex-column pt-3 pt-md-0">
                <li class="nav-item">
                    <a href="<?= base_url() ?>" class="nav-link d-flex align-items-center">
                        <span class="sidebar-icon">
                            <img src="<?= base_url() ?>/img/brand/light.svg" height="20" width="20" alt="Volt Logo">
                        </span>
                        <span class="mt-1 ms-1 sidebar-text">Politica Minera Chilena</span>
                    </a>
                </li>
                <li class="nav-item <?= $vista == 'dashboard' ? 'active' : '' ?>">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link">
                        <span class="sidebar-icon"><span class="fas fa-chart-pie"></span></span>
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item <?= $vista == 'categoria' ? 'active' : '' ?>">
                    <a href="<?= base_url('categoria') ?>" class="nav-link">
                        <span class="sidebar-icon"><span class="fas fa-table"></span></span>
                        <span class="sidebar-text">Categorias</span>
                    </a>
                </li>
                <li class="nav-item <?= $vista == 'post' ? 'active' : '' ?>">
                    <a href="<?= base_url('post') ?>" class="nav-link">
                        <span class="sidebar-icon"><span class="fas fa-file-alt"></span></span>
                        <span class="sidebar-text">Posts</span>
                    </a>
                </li>
                <li class="nav-item <?= $vista == 'usuario' ? 'active' : '' ?>">
                    <a href="<?= base_url('usuario') ?>" class="nav-link">
                        <span class="sidebar-icon"><span class="fas fa-user-cog"></span></span>
                        <span class="sidebar-text">Usuarios</span>
                    </a>
                </li>
                <li role="separator" class="dropdown-divider mt-4 mb-3 border-black"></li>
            </ul>
        </div>
    </nav>
    <main class="content">
        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
            <div class="container-fluid px-0">
                <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                    <div class="d-flex align-items-center">

                    </div>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="media d-flex align-items-center">
                                    <img class="user-avatar md-avatar rounded-circle" alt="Image placeholder" src="<?= base_url() ?>/user-logo.png">
                                    <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                        <span class="mb-0 font-small fw-bold"><?= session()->get('username') ?></span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-0">
                                <a class="dropdown-item rounded-top fw-bold" href="<?= base_url('usuario/' . session()->get('id') . '/edit') ?>"><span class="far fa-user-circle"></span>Mi Perfil</a>
                                <div role="separator" class="dropdown-divider my-0"></div>
                                <a class="dropdown-item rounded-bottom fw-bold" href="<?= base_url('logout') ?>"><span class="fas fa-sign-out-alt text-danger"></span>Salir</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?= $this->renderSection('content') ?>
        <footer class="footer section py-5">
            <div class="row">
                <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                    <p class="mb-0 text-center text-xl-left">Ir a<span class="current-year"></span> <a class="text-primary fw-normal" href="<?= base_url() ?>" target="_blank">Politica Minera Chilena</a></p>
                </div>

                <div class="col-12 col-lg-6">
                    <!-- List -->
                    <ul class="list-inline list-group-flush list-group-borderless text-center text-xl-right mb-0">
                        <li class="list-inline-item px-0 px-sm-2">
                            <a>Soporte +569 73382229</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </main>
    <!-- Core -->
    <script src="<?= base_url('js/jquery-3.5.1.min.js') ?>"></script>

    <script src="<?= base_url('bootstrap-5.0.0-beta2-dist/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- Volt JS -->

    <?= $this->renderSection('script') ?>
</body>

</html>