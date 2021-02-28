<?= $this->extend('layouts/master', $categorias) ?>

<?= $this->section('content') ?>
<?php if (isset($posts)) : ?>
  <div class="py-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
        <li class="breadcrumb-item"><a href="<?= base_url() ?>"><span class="fas fa-home text-dark"></span></a></li>
        <li class="breadcrumb-item active" aria-current="page">"<?= $key ?>"</li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-md-8">
      <?php if (!empty($posts)) : ?>
        <?php foreach ($posts as $p) : ?>
          <div class="col-12">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0"><?= $p['titulo'] ?></h3>
                <div class="mb-1 text-muted"><?= date('d F Y', strtotime($p['create_at'])) ?></div>
                <p class="mb-auto"><?= substr($p['subtitulo'], 0, 15) . '...' ?></p>
                <a href="<?= base_url('post/' . $p['slug']) ?>" class="stretched-link">Continuar leyendo</a>
              </div>
              <div class="col-auto d-none d-lg-block">
                <img src="<?= $p['imagen'] ?>" class="images" width="200" height="250">
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <h5>No se encontro resultado para "<?= $key ?>"</h5>

        <img src="<?= base_url('no_results_found.png') ?>" width="100%" alt="no se encontraro resultados">
      <?php endif; ?>
    </div>
    <?= $this->include('layouts/calendario') ?>
    <?= $pager->simpleLinks() ?>
  </div><!-- /.row -->

<?php else : ?>
  <?php if (!empty($lastPost)) : ?>
    <style>
      .bg-img {
        position: relative;
        height: 50vh;
        width: 100%;
        display: flex;
        background-image: url(<?= base_url($lastPost['imagen']) ?>);
        background-size: cover;
      }

      .bg-img::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        background-color: rgba(0, 0, 0, 0.45);
      }

      .texto-position {
        position: relative;
        color: #ffffff;
      }
    </style>
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark bg-img">
      <div class="col-md-6 px-0 texto-position">
        <h1 class="display-4 fst-italic"><?= $lastPost['titulo'] ?></h1>
        <p class="lead my-3"><?= $lastPost['subtitulo'] ?></p>
        <p class="lead mb-0"><a href="<?= base_url('post/' . $lastPost['slug']) ?>" class="text-white fw-bold">Continuar leyendo...</a></p>
      </div>
    </div>
  <?php endif; ?>
  <div class="row mb-2">
    <?php foreach ($postSegundoTercero as $p) : ?>
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <h3 class="mb-0"><?= strlen($p['titulo']) > 55 ?  substr($p['titulo'], 0, 55).'...' : $p['titulo']  ?></h3>
            <div class="mb-1 text-muted"><?= date('d F Y', strtotime($p['create_at'])) ?></div>
            <a href="<?= base_url('post/' . $p['slug']) ?>" class="stretched-link">Continuar leyendo</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img src="<?= $p['imagen'] ?>" class="images" width="200" height="250">
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="row">
    <div class="col-md-8">
      <h3 class="pb-4 mb-4 fst-italic border-bottom">
        Noticias mas antiguas
      </h3>
      <?php if (!empty($postCuartoQuinto)) : ?>
        <?php foreach ($postCuartoQuinto as $p) : ?>
          <article class="blog-post">
            <h2 class="blog-post-title"><?= $p['titulo'] ?></h2>
            <p class="blog-post-meta"><?= date('d F Y', strtotime($p['create_at'])) ?></p>
            <p><?= $p['subtitulo'] ?></p>
            <hr>
            <div style="text-align: justify;">
              <?= $p['cuerpo'] ?>
            </div>
          </article><!-- /.blog-post -->
        <?php endforeach; ?>
      <?php else : ?>
        <h4>Aun no sean realizado mas post</h4>
      <?php endif; ?>
    </div>
    <?= $this->include('layouts/calendario') ?>
  </div><!-- /.row -->
<?php endif; ?>
<?= $this->endSection(); ?>
<?= $this->section('script') ?>
<?= $this->endSection() ?>