<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Praca $praca
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pracas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pracas form large-9 medium-8 columns content">
    <?= $this->Form->create($praca) ?>
    <fieldset>
        <legend><?= __('Add Praca') ?></legend>
        <?php
            echo $this->Form->control('prefixo',['placeholder' => 'Digite um prefixo com 3 letras']);
            echo $this->Form->control('nome',['placeholder' => 'Digite o nome da praça']);
            echo $this->Form->control('ativa');
            echo $this->Form->control('users._ids', ['options' => $users,'class' => 'form-control select2']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<?php $this->Html->script('/js/selectOptions', ['block' => 'scriptBottom']); ?>
