<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>
<link href="<?= base_url('css/quill.snow.css') ?>" rel="stylesheet">
<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('usuario') ?>">Usuario</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Editar Usuario #<?= $usuario['id'] ?></h1>
            <p class="mb-0">Aquí podras editar tu usuario.</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-light shadow-sm components-section">
            <div class="card-body">
                <h1 class="h4">Formulario de edicion de noticias</h1>
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger alert-dismissible fade show pb-0 mb-4" role="alert">
                        <?= $validation->listErrors() ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
                <?= form_open('usuario/' . $usuario['id'] . '/edit', ['id' => 'form', 'class' => 'row g-3']) ?>
                <div class="col-md-8 mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input class="form-control" id="username" name="username" type="text" value="<?= $usuario['username'] ?>" readonly>
                </div>
                <div class="col-md-8 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $usuario['email'] ?>" required>
                </div>
                <div class="col-md-8 mb-3">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="new-password">Confirmar Contraseña</label>
                    <input type="password" class="form-control" id="new-password" name="new-password">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password-confirm">Confirmar Contraseña</label>
                    <input type="password" class="form-control" id="password-confirm" name="password-confirm">
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="<?= base_url('usuario') ?>" class="btn btn-warning">Cancelar</a>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<?= $this->endSection() ?>