<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>
<h1>Bienvenido <em><?= session()->get('username') ?></em> </h1>
<div class="row">
    <div class="col-12 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">Tus ultimos post</h5>
                    </div>
                    <div class="col text-end">
                        <a title="Agregar nuevo Post" href="<?= base_url('post/new') ?>" class="btn btn-sm btn-info rounded"><i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="table-responsive mb-2">
                    <table class="table table-centered table-nowrap mb-0 rounded text-justify">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-0">#</th>
                                <th class="border-0">Título</th>
                                <th class="border-0">Categorias</th>
                                <th class="border-0">Registrado</th>
                                <th class="border-0">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($posts)) : ?>
                                <?php foreach ($posts as $post) : ?>
                                    <tr>
                                        <td>
                                            <a href="#" class="text-primary fw-bold"><?= $post['id'] ?></a>
                                        </td>
                                        <td class="fw-bold">
                                            <?= $post['titulo'] ?>
                                        </td>
                                        <td>
                                            <?php foreach ($categorias_post as $c) : ?>
                                                <?= $c['post_id'] == $post['id'] ? $c['categoria_nombre'] . '<br>' : '' ?>
                                            <?php endforeach; ?>
                                        </td>
                                        <td>
                                            <?= date('d-m-Y H:i:s', strtotime($post['create_at'])) ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('post/' . $post["slug"]) ?>" class="btn btn-sm btn-info" target="_blank" rel="noopener noreferrer"><i class="fas fa-search"></i></a>
                                            <a href="<?= base_url('post/' . $post['id'] . '/edit') ?>" class="btn btn-sm btn-secondary" title="Editar"><i class="fas fa-pen-square"></i></a>
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
                <a href="<?= base_url('post') ?>" class="btn btn-primary">Ir a Post</a>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">Tus ultimas Categorias</h5>
                    </div>
                    <div class="col text-end">
                        <a title="Agregar nueva Categoría" href="<?= base_url('categoria/new') ?>" class="btn btn-sm btn-info rounded"><i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="table-responsive mb-3">
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-0">#</th>
                                <th class="border-0">Nombre</th>
                                <th class="border-0">Estado</th>
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
                                            <a href="<?= base_url('categoria/' . $categoria["slug"]) ?>" class="btn btn-sm btn-info" target="_blank" rel="noopener noreferrer">Ver Posts</a>
                                            <a href="<?= base_url('categoria/' . $categoria['id'] . '/edit') ?>" class="btn btn-sm btn-secondary" title="Editar"><i class="fas fa-pen-square"></i></a>
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
                <a href="<?= base_url('categoria') ?>" class="btn btn-primary">Ir a Categorias</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<?= $this->endSection() ?>s