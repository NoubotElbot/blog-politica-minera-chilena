<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>
<link href="<?= base_url('css/quill.snow.css') ?>" rel="stylesheet">
<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('post') ?>">Post</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nuevo</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Nuevo Post</h1>
            <p class="mb-0">Aquí podras agregar un nuevo post.</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-light shadow-sm components-section">
            <div class="card-body">
                <h1 class="h4">Formulario de noticias</h1>
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger alert-dismissible fade show pb-0 mb-4" role="alert">
                        <?= $validation->listErrors() ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
                <?= form_open_multipart('post/new', ['id' => 'form', 'class' => 'row g-3']) ?>
                <div class="col-lg-4 mb-3">
                    <label for="portada" class="form-label">Portada</label>
                    <input class="form-control" accept="image/*" id="portada" name="portada" type="file">
                </div>
                <div class="col-lg-8 mb-3  contenedor-img">
                    <img id="img-prev" class="img-prev" src="https://via.placeholder.com/300x300.png" alt="Tu imagen" />
                </div>
                <div class="col-md-6 col-sm-12 mb-3">
                    <label for="categoria">Categorias</label>
                    <select name="categoria[]" id="categoria" size="4" class="form-select" multiple required>
                        <?php foreach ($categorias as $categoria) : ?>
                            <option value="<?= $categoria['id'] ?>" <?= set_select('categoria', $categoria['id']) ?>> <?= $categoria['categoria_nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-8 mb-3">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?= set_value('titulo') ?>" required>
                </div>
                <div class="col-md-8 mb-3">
                    <label for="subtitulo">Subtítulo</label>
                    <input type="text" class="form-control" id="subtitulo" name="subtitulo" value="<?= set_value('subtitulo') ?>" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="contenido">Contenido</label>
                    <input name="contenido" type="hidden">
                    <div id="contenido" style="height: 180px;">
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