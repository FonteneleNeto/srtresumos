<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resumo[]|\Cake\Collection\CollectionInterface $resumos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Resumo'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="resumos index large-9 medium-8 columns content">
    <h3><?= __('Resumos') ?></h3>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('PRACA') ?></th>
                <th scope="col"><?= $this->Paginator->sort('DISTRIBUIDOR') ?></th>
                <th scope="col"><?= $this->Paginator->sort('DATAETAPA') ?></th>
                <th scope="col"><?= $this->Paginator->sort('NOMEDIS') ?></th>
                <th scope="col"><?= $this->Paginator->sort('NUMDIS') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CHAVE') ?></th>
                <th scope="col"><?= $this->Paginator->sort('DataHora') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resumos as $resumo): ?>
            <tr>
                <td><?= h($resumo->PRACA) ?></td>
                <td><?= h($resumo->DISTRIBUIDOR) ?></td>
                <td><?= h($resumo->DATAETAPA) ?></td>
                <td><?= h($resumo->NOMEDIS) ?></td>
                <td><?= $this->Number->format($resumo->NUMDIS) ?></td>
                <td><?= h($resumo->CHAVE) ?></td>
                <td><?= h($resumo->DataHora) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $resumo->CHAVE]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $resumo->CHAVE]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $resumo->CHAVE], ['confirm' => __('Are you sure you want to delete # {0}?', $resumo->CHAVE)]) ?>
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
