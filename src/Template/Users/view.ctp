<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php if ($tipo == "Admin"): ?>
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
        <ul class="side-nav">
            <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
            <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
            <li><?= $this->Html->link(__('List Pracas'), ['controller' => 'Pracas', 'action' => 'show']) ?> </li>
            <li><?= $this->Html->link(__('New Praca'), ['controller' => 'Pracas', 'action' => 'add']) ?> </li>
        </ul>
    </nav>
<?php endif; ?>
<div class="users view ">
    <div class="row">
        <div class="col-xs-5">
            <table class="table table-bordered">
                <h3><?= h($user->name) ?></h3>
                <table class="table table-bordered">
                    <tr>
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($user->name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Username') ?></th>
                        <td><?= h($user->username) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Email') ?></th>
                        <td><?= h($user->email) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Role') ?></th>
                        <td><?= h($user->role) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($user->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($user->created) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Updated') ?></th>
                        <td><?= h($user->updated) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Ativo') ?></th>
                        <td>
                            <?php
                            $type = ($user->ativo == true) ? 'success' : 'danger';
                            echo $this->ViewService->label($type, $this->ViewService->active($user->ativo))
                            ?>
                        </td>
                    </tr>
                </table>
        </div>
    </div>
    <div class="related">
        <h4><?= __('Related Pracas') ?></h4>
        <?php if (!empty($user->pracas)): ?>
            <table class="table table-condensed">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Prefixo') ?></th>
                    <th scope="col"><?= __('Nome') ?></th>
                    <th scope="col"><?= __('Ativa') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Updated') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($user->pracas as $pracas): ?>
                    <tr>
                        <td><?= h($pracas->id) ?></td>
                        <td><?= h($pracas->prefixo) ?></td>
                        <td><?= h($pracas->nome) ?></td>
                        <td>
                            <?php
                            $type = ($pracas->ativa == true) ? 'success' : 'danger';
                            echo $this->ViewService->label($type, $this->ViewService->active($pracas->ativa ))
                            ?>
                        </td>
                        <td><?= h($pracas->created) ?></td>
                        <td><?= h($pracas->updated) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Pracas', 'action' => 'view', $pracas->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Pracas', 'action' => 'edit', $pracas->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pracas', 'action' => 'delete', $pracas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pracas->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
