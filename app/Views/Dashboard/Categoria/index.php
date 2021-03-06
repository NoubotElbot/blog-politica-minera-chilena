<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>
<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item active" aria-current="page">Categoria</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Categorias</h1>
            <p class="mb-0">Aqui puedes administrar las categorias de tus posts.</p>
        </div>
        <div>
            <button class="btn btn-lg btn-outline-gray" data-bs-toggle="tooltip" data-bs-placement="left" title="Las categorías desactivadas no podrán ser incluidas en nuevos post, pero no afectarán los post existentes.">
                <i class="far fa-question-circle me-1"></i>
            </button>
            <a href="<?= base_url('categoria/new') ?>" class="btn btn-sm btn-primary"><span class="fas fa-plus"></span> Nueva Categoría</a>

        </div>
    </div>
</div>
<?php if (session()->get('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->get('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<div class="card border-light shadow-sm mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0">#</th>
                        <th class="border-0">Nombre</th>
                        <th class="border-0">Estado</th>
                        <th class="border-0">Registrado</th>
                        <th class="border-0">Ultima Modificacion</th>
                        <th class="border-0">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($categorias)) : ?>
                        <?php foreach ($categorias as $categoria) : ?>
                            <tr>
                                <td>
                                    <a href="#" class="text-primary fw-bold"><?= $categoria['id'] ?></a>
                                </td>
                                <td class="fw-bold">
                                    <?= $categoria['categoria_nombre'] ?>
                                <td>
                                    <?= $categoria['activo'] == 1 ? 'Activo' : 'Desactivado' ?>
                                </td>
                                <td>
                                    <?= $categoria['create_at'] ?>
                                </td>
                                <td>
                                    <?= $categoria['update_at'] ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('categoria/' . $categoria["slug"]) ?>" class="btn btn-sm btn-info" target="_blank" rel="noopener noreferrer">Ver Posts</a>
                                    <a href="<?= base_url('categoria/' . $categoria['id'] . '/edit') ?>" class="btn btn-sm btn-secondary" title="Editar"><i class="fas fa-pen-square"></i></a>
                                    <button class="btn btn-sm btn-<?= $categoria['activo'] == 1 ? 'danger' : 'outline-primary' ?>" onclick="borrar(<?= $categoria['id'] ?>,'<?= $categoria['categoria_nombre'] ?>',<?= $categoria['activo'] ?>)" title="<?= $categoria['activo'] == 1 ? 'Desactivar' : 'Activar' ?>"><?= $categoria['activo'] == 1 ? '<i class="fas fa-trash"></i>' : '<i class="fas fa-trash-restore"></i>' ?></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="text-center">No hay datos en esta tabla</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal-borrar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">¡Atención!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open('', ['id' => 'formborrar']) ?>
                <input type="hidden" name="_method" value="DELETE" />
                <?= form_close() ?>
                <p id="p-text" class="h6"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" form="formborrar" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script type="text/javascript">
    function borrar(id, nombre, estado) {
        var myModal = new bootstrap.Modal(document.getElementById('modal-borrar'), {
            keyboard: false
        });
        var form = document.getElementById('formborrar');
        form.setAttribute('action', `categoria/${id}`);
        document.getElementById("p-text").innerHTML = `Esta seguro de que desea ${estado == 1 ? 'Desactivar' : 'Activar'} la categoría "${nombre}"`;
        myModal.show();
    }
</script>
<?= $this->endSection() ?>