<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
<div class="justfy-items-center p-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>"><span class="fas fa-home text-dark"></span></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $vista['categoria_nombre'] ?></li>
        </ol>
    </nav>
    <?php if (!empty($posts)) : ?>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php foreach ($posts as $p) : ?>
                <div class="col">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img class="img-card" src="<?= base_url($p['imagen']) ?>" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $p['titulo'] ?></h5>
                                    <p class="card-text"><?= $p['subtitulo'] ?></p>
                                    <p class="card-text"><small class="text-muted"><?= date('d-m-Y H:i:s', strtotime($p['create_at'])) ?></small></p>
                                    <a href="<?= base_url('post/' . $p['slug']) ?>" class="stretched-link">Continuar leyendo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?= $pager->links() ?>
    <?php else : ?>
        <div class="row m-3">
            <div class="card text-center p-0">
                <div class="card-body py-5">
                    <h5 class="card-title">¡Vaya! aún no hay noticias para esta categoría.</h5>
                    <p class="card-text">Pero no desesperéis, pronto habrán novedades.</p>
                </div>
                <div class="card-footer text-muted p-3">
                    <a href="<?= base_url() ?>" class="btn btn-outline-dark">Ir al inicio</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<?= $this->endSection() ?>