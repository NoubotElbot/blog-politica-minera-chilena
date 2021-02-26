<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
        <li class="breadcrumb-item"><a href="<?= base_url() ?>"><span class="fas fa-home text-dark"></span></a></li>
        <li class="breadcrumb-item active" aria-current="page">Somos</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-8">
        <article class="blog-post" style="text-align: justify;">
            <h2 class="blog-post-title">Somos</h2>
            <p class="blog-post-meta"></p>
            <hr>
            <p>
                Somos una agrupación comprometida por el buen desarrollo de la minera Chilena, entablando acciones, conversaciones e informando a los distintos sectores mineros y al público en general.
            </p>
            <p>
                La conformación de Política Minera Chilena es sin duda un aporte significativo a la política Chilena, destacando la oportuna información de destacados proyectos o noticias a fines.
            </p>
            <p>
                El desempeño correcto de nuestro sector minero lo hacemos juntos y por eso les pedimos como comunidad contactarnos a las distintas redes sociales en caso de dudas, sugerencias o aportes.
            </p>
            <p>
                ¡Sus opiniones siempre serán muy bien bienvenidas!
            </p>
            <div class="row mt-2">
                <div class="col-md-6">
                    <div class="card h-100">
                        <img src="<?=base_url('logo.jpg')?>" width="100%" class="card-img-top" alt="...">
                    </div>
                </div>
            </div>
        </article>
    </div>

    <?= $this->include('layouts/calendario') ?>
</div><!-- /.row -->
<?= $this->endSection(); ?>
<?= $this->section('script') ?>
<?= $this->endSection() ?>