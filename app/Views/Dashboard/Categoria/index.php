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
                                    <a href="<?= base_url('categoria/' . strtolower($categoria["categoria_nombre"])) ?>" class="btn btn-sm btn-info" target="_blank" rel="noopener noreferrer">Ver Posts</a>
                                    <a href="<?= base_url('categoria/' . $categoria['id'] . '/edit') ?>" class="btn btn-sm btn-secondary" title="Editar"><i class="fas fa-pen-square"></i></a>
                                    <button class="btn btn-sm btn-danger" title="Desactivar"><i class="fas fa-trash"></i></button>

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
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<?= $this->endSection() ?>s