<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>
<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item active" aria-current="page">Usuario</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Usuarios</h1>
            <p class="mb-0">Aquí puedes administrar tus Usuarios.</p>
        </div>
        <div>
            <!-- <a href="<?= base_url('usuario/new') ?>" class="btn btn-sm btn-primary"><span class="fas fa-plus"></span> Nuevo Usuario</a> -->
        </div>
    </div>
</div>
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<div class="card border-light shadow-sm mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded text-justify">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0">#</th>
                        <th class="border-0">Username</th>
                        <th class="border-0">Email</th>
                        <th class="border-0">Estado</th>
                        <th class="border-0">Registrado</th>
                        <th class="border-0">Última Modificacion</th>
                        <th class="border-0">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($usuarios)) : ?>
                        <?php foreach ($usuarios as $usuario) : ?>
                            <tr>
                                <td>
                                    <a href="#" class="text-primary fw-bold"><?= $usuario['id'] ?></a>
                                </td>
                                <td class="fw-bold">
                                    <?= $usuario['username'] ?>
                                </td>
                                <td>
                                    <?= $usuario['email'] ?>
                                </td>
                                <td>
                                    <?= $usuario['activo'] == 1 ? 'Activo' : 'Desactivado' ?>
                                </td>
                                <td>
                                    <?= date('d-m-Y H:i:s', strtotime($usuario['create_at'])) ?>
                                </td>
                                <td>
                                    <?= date('d-m-Y H:i:s', strtotime($usuario['update_at'])) ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('usuario/' . $usuario['id'] . '/edit') ?>" class="btn btn-sm btn-secondary" title="Editar"><i class="fas fa-pen-square"></i></a>
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
        <?= $pager->links() ?>
    </div>
</div>
<!-- Modal -->
<!-- <div class="modal fade" id="modal-borrar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
</div> -->
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<!-- <script type="text/javascript">
    function borrar(id, estado) {
        var myModal = new bootstrap.Modal(document.getElementById('modal-borrar'), {
            keyboard: false
        });
        var form = document.getElementById('formborrar');
        form.setAttribute('action', `usuario/${id}`);
        document.getElementById("p-text").innerHTML = `Esta seguro de que desea ${estado == 1 ? 'Desactivar' : 'Activar'} el Usuario #${id}`;
        myModal.show();
    }
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
    var popover = new bootstrap.Popover(document.querySelector('.popover-dismiss'), {
        trigger: 'focus'
    })
</script> -->
<?= $this->endSection() ?>