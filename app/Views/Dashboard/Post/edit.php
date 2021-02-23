<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>
<link href="<?= base_url('css/quill.snow.css') ?>" rel="stylesheet">
<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('post') ?>">Post</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Editar Post #<?= $post['id'] ?></h1>
            <p class="mb-0">Aquí podras editar tu post.</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-light shadow-sm components-section">
            <div class="card-body">
                <h1 class="h4">Formulario de edicion de noticias</h1>
                <?php if (session()->get('validator')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show pb-0" role="alert">
                        <?= session()->get('validator')->listErrors() ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
                <?= form_open('post/update/' . $post['id'], 'id= "form" class="row g-3" enctype="multipart/form-data"') ?>
                <div class="col-md-6 mb-3">
                    <label for="portada" class="form-label">Portada</label>
                    <input class="form-control" accept="image/png,image/jpeg" id="portada" name="portada" type="file">
                </div>
                <div class="col-md-6 mb-3  contenedor-img">
                    <img id="img-prev" class="img-prev" src="<?= base_url($post['imagen']) ?>" alt="Tu imagen" />
                </div>
                <div class="col-md-8 mb-3">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $post['titulo'] ?>" required>
                </div>
                <div class="col-md-8 mb-3">
                    <label for="subtitulo">Subtítulo</label>
                    <input type="text" class="form-control" id="subtitulo" name="subtitulo" value="<?= $post['subtitulo'] ?>" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="contenido">Contenido</label>
                    <input name="contenido" type="hidden">
                    <div id="contenido" style="height: 180px;">
                        <?= $post['cuerpo'] ?>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="<?= base_url('post') ?>" class="btn btn-warning">Cancelar</a>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="<?= base_url('js/quill.js') ?>"></script>
<script>
    var quill = new Quill('#contenido', {
        theme: 'snow'
    });
    var form = document.getElementById('form');
    form.onsubmit = function(e) {
        // Populate hidden form on submit
        var about = document.querySelector('input[name=contenido]');
        let contenido = quill.container.firstChild;
        if (contenido.textContent !== "") {
            about.value = quill.container.firstChild.innerHTML;
        } else {
            about.value = "";
        }
    };

    function readImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#img-prev').attr('src', e.target.result); // Renderizamos la imagen
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#portada").change(function() {
        // Código a ejecutar cuando se detecta un cambio de archivO
        readImage(this);
    });
</script>
<?= $this->endSection() ?>