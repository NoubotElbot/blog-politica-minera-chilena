<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(2);
?>

<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
    <ul class="pagination justify-content-center py-3">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
                    <span aria-hidden="true">Primero</span>
                </a>
            </li>
        <?php endif ?>
        <li class="page-item <?= !$pager->hasPreviousPage() ? 'disabled':'' ?>">
            <a class="page-link" href="<?= $pager->getPreviousPage() ?>" aria-label="<?= lang('Pager.previous') ?>">
                <span aria-hidden="true">Anterior</span>
            </a>
        </li>
        <?php foreach ($pager->links() as $link) : ?>
            <li <?= $link['active'] ? 'class="page-item active"' : 'class="page-item"' ?>>
                <a class="page-link" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>
        <li class="page-item <?= !$pager->hasNextPage() ? 'disabled':'' ?>">
            <a class="page-link" href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('Pager.next') ?>">
                <span aria-hidden="true">Siguiente</span>
            </a>
        </li>
        <?php if ($pager->hasNext()) : ?>        
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
                    <span aria-hidden="true">Último</span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>

