<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
<div class="justfy-items-center p3">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php foreach ($posts as $p) : ?>
            <div class="col">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img class="img-card" src="<?= base_url($p['imagen']) ?>" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $p['titulo'] ?></h5>
                                <p class="card-text"><?= $p['subtitulo'] ?></p>
                                <p class="card-text"><small class="text-muted"><?= date('d-m-Y H:i:s', strtotime($p['create_at'])) ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?= $pager->links() ?>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<?= $this->endSection() ?>