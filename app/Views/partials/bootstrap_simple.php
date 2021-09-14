<?php
/**
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */

$pager->setSurroundCount(0);
?>
<nav aria-lable="Page navigation ">
    <ul class="pagination">
        <li class="page-item" <?= $pager->hasPrevious() ? '' : 'class="disabled"' ?>>
            <a class="page-link" href="<?= $pager->getPrevious() ?? '#' ?>" aria-label="<?= lang('Pager.previous') ?>">
                <span aria-hidden="true"><?= lang('Pager.newer') ?></span>
            </a>
        </li>
        <li class="page-item <?= $pager->hasNext() ? '' : 'disabled' ?>">
            <a class="page-link" href="<?= $pager->getnext() ?? '#' ?>" aria-label="<?= lang('Pager.next') ?>">
                <span aria-hidden="true"><?= lang('Pager.older') ?></span>
            </a>
        </li>
    </ul>
</nav>
