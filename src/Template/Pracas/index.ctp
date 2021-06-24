<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Praca[]|\Cake\Collection\CollectionInterface $pracas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Praca'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'show']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pracas index large-9 medium-8 columns content">
    <h3><?= __('Pracas') ?></h3>
    <table class="table table-condensed">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('prefixo') ?></th>
            <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
            <th scope="col"><?= $this->Paginator->sort('ativa') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($pracas as $praca): ?>
            <tr>
                <td><?= $this->Number->format($praca->id) ?></td>
                <td><?= h($praca->prefixo) ?></td>
                <td><?= h($praca->nome) ?></td>
                <td>
                    <?php
                    $type = ($praca->ativa == true) ? 'success' : 'danger';
                    echo $this->ViewService->label($type, $this->ViewService->active($praca->ativa))
                    ?>
                </td>
                <td><?= h($praca->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $praca->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $praca->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $praca->id], ['confirm' => __('Are you sure you want to delete # {0}?', $praca->id)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
