<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php if($tipo == "Admin"):?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'show']) ?></li>
        <li><?= $this->Html->link(__('List Pracas'), ['controller' => 'Pracas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Praca'), ['controller' => 'Pracas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<?php endif;?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('email');
            echo $this->Form->control('ativo');
            echo $this->Form->control('role',['options' => ['' => 'Escolha o tipo de usuário','Admin'=>'Administrador','Gestor' => 'Gestor de Praça'],'class' => 'form-control']);
            echo $this->Form->control('pracas._ids', ['options' => $pracas,'class' => 'form-control select2']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<?php $this->Html->script('/js/selectOptions', ['block' => 'scriptBottom']); ?>
