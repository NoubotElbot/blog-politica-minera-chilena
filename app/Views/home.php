<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
<div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
  <div class="col-md-6 px-0">
    <h1 class="display-4 fst-italic">Este es un titúlo interesante para mi noticia</h1>
    <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
    <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
  </div>
</div>

<div class="row mb-2">
  <?php foreach ($lastPostsByCategory as $post) : ?>
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success"><?= ucwords($post['categoria_nombre']) ?></strong>
          <h3 class="mb-0"><?= $post['titulo'] ?></h3>
          <div class="mb-1 text-muted"><?= date('d F Y', strtotime($post['create_at'])) ?></div>

          <a href="#" class="stretched-link">Continuar leyendo</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="<?= $post['imagen'] ?>" class="images" width="200" height="250">
        </div>
      </div>
    </div>

  <?php endforeach; ?>
</div>

<div class="row">
  <div class="col-md-8">
    <h3 class="pb-4 mb-4 fst-italic border-bottom">
      Noticias mas recientes
    </h3>
    <?php foreach ($lastPosts as $post) : ?>
      <article class="blog-post">
        <h2 class="blog-post-title"><?= $post['titulo'] ?></h2>
        <p class="blog-post-meta"><?= date('d F Y', strtotime($post['create_at'])) ?></p>
        <p><?= $post['subtitulo'] ?></p>
        <hr>
        <?= $post['cuerpo'] ?>
      </article><!-- /.blog-post -->
    <?php endforeach; ?>

    <nav class="blog-pagination" aria-label="Pagination">
      <a class="btn btn-outline-primary" href="#">Older</a>
      <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
    </nav>

  </div>

  <div class="col-md-4">
    <div class="p-4">
      <h4 class="fst-italic">Siguenos</h4>
      <ol class="list-unstyled">
        <li>Facebook <a href="https://www.facebook.com/politica.minerachilena"><i class="fab fa-facebook text-primary"></i></a>
        </li>
        <li>LinkendIn <a href="https://www.linkedin.com/in/politica-minera-chilena-b85996201/"><i class="fab fa-linkedin" style="color:blue;"></i></a>
        </li>
        <li>Instagram <a href="https://www.instagram.com/politica_minera_chilena/"><i class="fab fa-instagram text-danger"></i></a>
        </li>
      </ol>
    </div>
    <div class="p-4 bg-light rounded">
      <iframe src="https://calendar.google.com/calendar/embed?height=375&amp;wkst=2&amp;bgcolor=%23ffffff&amp;ctz=America%2FSantiago&amp;showTitle=1&amp;showPrint=0&amp;showTz=0&amp;showCalendars=0&amp;showTabs=1&amp;mode=MONTH&amp;src=b3BzbW9ocDU3Y3VoZWpnbmRmOTY0cXRiZmNAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%23A79B8E&amp;showDate=1" style="border:solid 1px #777" width="100%" height="375" frameborder="0" scrolling="yes"></iframe>
    </div>
    <div class="p-4">
      <div class="infogram-embed" data-id="72884f85-1150-4e86-89ca-7882ea1b64d9" data-type="interactive" data-title="Precio Cobre"></div>
    </div>
  </div>
</div><!-- /.row -->
<?= $this->endSection(); ?>
<?= $this->section('script') ?>
<script>
  ! function(e, i, n, s) {
    var t = "InfogramEmbeds",
      d = e.getElementsByTagName("script")[0];
    if (window[t] && window[t].initialized) window[t].process && window[t].process();
    else if (!e.getElementById(n)) {
      var o = e.createElement("script");
      o.async = 1, o.id = n, o.src = "https://e.infogram.com/js/dist/embed-loader-min.js", d.parentNode.insertBefore(o, d)
    }
  }(document, 0, "infogram-async");
</script>

<?= $this->endSection() ?>