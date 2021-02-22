<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>
<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('categoria') ?>">Categoria</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Editar Categoría "<?= $categoria['categoria_nombre'].' #'.$categoria['id'] ?>"</h1>
            <p class="mb-0">Aquí podras editar una categoría.</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-light shadow-sm components-section">
            <div class="card-body">
                <h1 class="h4">Formulario de categorias</h1>
                <?php if (session()->get('validator')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show pb-0" role="alert">
                        <?= session()->get('validator')->listErrors() ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
                <div class="row mb-4">
                    <?= form_open('categoria/'.$categoria['id']) ?>
                    <input type="hidden" name="_method" value="PUT"/>
                    <div class="col-lg-6 col-sm-12">
                        <div class="mb-4">
                            <label for="categoria_nombre">Nombre de la categoria</label>
                            <input type="text" class="form-control" id="categoria_nombre" name="categoria_nombre" value="<?= $categoria['categoria_nombre'] ?>" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Modificar</button>
                    <a href="<?=base_url('categoria')?>" class="btn btn-warning">Cancelar</a>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<?= $this->endSection() ?>