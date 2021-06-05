<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resumo $resumo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $resumo->CHAVE],
                ['confirm' => __('Are you sure you want to delete # {0}?', $resumo->CHAVE)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Resumos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="resumos form large-9 medium-8 columns content">
    <?= $this->Form->create($resumo) ?>
    <fieldset>
        <legend><?= __('Edit Resumo') ?></legend>
        <?php
            echo $this->Form->control('PRACA');
            echo $this->Form->control('DISTRIBUIDOR');
            echo $this->Form->control('DATAETAPA');
            echo $this->Form->control('NOMEDIS');
            echo $this->Form->control('NUMDIS');
            echo $this->Form->control('DISTRIBUIDOS');
            echo $this->Form->control('VENDIDOS');
            echo $this->Form->control('DEVOLVIDOS');
            echo $this->Form->control('DataHora');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
