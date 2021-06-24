<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Praca $praca
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Praca'), ['action' => 'edit', $praca->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Praca'), ['action' => 'delete', $praca->id], ['confirm' => __('Are you sure you want to delete # {0}?', $praca->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pracas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Praca'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'show']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pracas view">
    <h3><?= h($praca->prefixo) ?></h3>
    <div class="row">
        <div class="col-xs-5">
            <table class="table table-bordered">
        <tr>
            <th scope="row"><?= __('Prefixo') ?></th>
            <td><?= h($praca->prefixo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($praca->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($praca->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($praca->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($praca->updated) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ativa') ?></th>
            <td><?= $praca->ativa ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
        </div>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($praca->users)): ?>
        <table class="table table-condensed">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Role') ?></th>
                <th scope="col"><?= __('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($praca->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->name) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->role) ?></td>
                <td><?= h($users->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
