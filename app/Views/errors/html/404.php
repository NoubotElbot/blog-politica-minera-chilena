<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>404 Not Found Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="icon" type="image/jpg" href="<?= base_url('logo.jpg') ?>" />
    <!-- Fontawesome -->
    <link type="text/css" href="<?= base_url('fontawesome/css/all.css') ?>" rel="stylesheet">
    <!-- Volt CSS -->
    <link type="text/css" href="<?= base_url('css/volt.css') ?>" rel="stylesheet">

<body>
    <main>
        <section class="vh-100 d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center d-flex align-items-center justify-content-center">
                        <div>
                            <img class="img-fluid w-75" src="<?=base_url('img/illustrations/404.svg')?>" alt="404 not found">
                            <h1 class="mt-5">Pagina no <span class="fw-bolder text-primary">Encontrada</span></h1>
                            <p class="lead my-4">¡UPS! Parece que estas perdido. Si crees que esto es un problema con nosotros, por favor díganos.</p>
                            <a class="btn btn-dark animate-hover" href="<?= base_url()?>"><i class="fas fa-chevron-left me-3 ps-2 animate-left-3"></i>Volver al Inicio</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>