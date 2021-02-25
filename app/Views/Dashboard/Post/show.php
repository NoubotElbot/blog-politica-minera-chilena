<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="px-4 pt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><span class="fas fa-home text-dark"></span></a></li>
                    <?php if (!empty($categorias_post)) : ?>
                        <?php foreach ($categorias_post as $c) : ?>
                            <li class="breadcrumb-item">
                                <a class="link-secondary" href="<?= base_url('categoria/' . $c['slug']) ?>"><?= $c['categoria_nombre'] ?></a>
                            </li>
                        <?php endforeach ?>
                    <?php endif; ?>
                </ol>
            </nav>
        </div>
    </div>
    <div class="col-md-8 px-4">
        <?php if (!empty($post)) : ?>
            <article class="blog-post">
                <h2 class="blog-post-title"><?= $post['titulo'] ?></h2>
                <p class="blog-post-meta"><?= date('d F Y', strtotime($post['create_at'])) ?></p>
                <p><?= $post['subtitulo'] ?></p>
                <img src="<?= base_url($post['imagen']) ?>" class="img-portada" alt="" srcset="">
                <hr>
                <div style="text-align: justify;">
                    <?= $post['cuerpo'] ?>
                </div>
            </article>
        <?php else : ?>
            <div class="card text-center p-0">
                <div class="card-body py-5">
                    <h5 class="card-title">Mmm... Creo que no encotraste lo que buscabas</h5>
                    <p class="card-text">Prueba buscado por categoría arriba en la barra de navegación.</p>
                </div>
                <div class="card-footer text-muted p-3">
                    <a href="<?= base_url() ?>" class="btn btn-outline-dark">Ir al inicio</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <?= $this->include('layouts/calendario') ?>
</div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
<?= $this->endSection() ?>