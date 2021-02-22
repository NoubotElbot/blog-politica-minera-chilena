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
    <div class="p-4 mb-3 bg-light rounded">
      <h4 class="fst-italic">About</h4>
      <p class="mb-0">Saw you downtown singing the Blues. Watch you circle the drain. Why don't you let me stop by? Heavy is the head that <em>wears the crown</em>. Yes, we make angels cry, raining down on earth from up above.</p>
    </div>

    <div class="p-4">
      <h4 class="fst-italic">Archives</h4>
      <ol class="list-unstyled mb-0">
        <li><a href="#">March 2014</a></li>
        <li><a href="#">February 2014</a></li>
        <li><a href="#">January 2014</a></li>
        <li><a href="#">December 2013</a></li>
        <li><a href="#">November 2013</a></li>
        <li><a href="#">October 2013</a></li>
        <li><a href="#">September 2013</a></li>
        <li><a href="#">August 2013</a></li>
        <li><a href="#">July 2013</a></li>
        <li><a href="#">June 2013</a></li>
        <li><a href="#">May 2013</a></li>
        <li><a href="#">April 2013</a></li>
      </ol>
    </div>
    <div class="p-4">
      <h4 class="fst-italic">Donde mas</h4>
      <ol class="list-unstyled">
        <li>Facebook <a href="https://www.facebook.com/politica.minerachilena"><i class="fab fa-facebook text-primary"></i></a>
        </li>
        <li>LinkendIn <a href="https://www.linkedin.com/in/politica-minera-chilena-b85996201/"><i class="fab fa-linkedin" style="color:blue;"></i></a>
        </li>
        <li>Instagram <a href="https://www.instagram.com/politica_minera_chilena/"><i class="fab fa-instagram text-danger"></i></a>
        </li>
      </ol>
    </div>
    <div class="p-4">
      <div class="infogram-embed" data-id="72884f85-1150-4e86-89ca-7882ea1b64d9" data-type="interactive" data-title="Precio Cobre"></div>
    </div>
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
    <div class="p-4">
    <iframe src="https://calendar.google.com/calendar/embed?height=300&amp;wkst=2&amp;bgcolor=%23ffffff&amp;ctz=America%2FSantiago&amp;src=ZWxjb3JyZW9kZWNyaXMyNEBnbWFpbC5jb20&amp;src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;src=b3BzbW9ocDU3Y3VoZWpnbmRmOTY0cXRiZmNAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=ZXMuY2wjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%237986CB&amp;color=%2333B679&amp;color=%23A79B8E&amp;color=%230B8043&amp;showTitle=0&amp;showPrint=0&amp;showNav=0&amp;showTabs=1&amp;showTz=0&amp;showCalendars=0" style="border:solid 1px #777" width="300" height="300" frameborder="0" scrolling="no"></iframe>    </div>
  </div>
</div><!-- /.row -->
<?= $this->endSection(); ?>