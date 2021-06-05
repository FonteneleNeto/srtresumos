<div class="resumos index large-9 medium-8 columns content">
    <h3><?= __('Praças') ?></h3>
    <?php if (!empty($user->pracas)): ?>
        <table class="table table-condensed">
            <tr>
                <th scope="col"><?= __('Prefixo') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
            </tr>
            <?php foreach ($user->pracas as $pracas): ?>
                <tr>
                    <td>
                        <?= $this->Html->link($this->Html->tag('i', '',
                            ['class' => 'fa fa-line-chart'])."$pracas->prefixo",
                            ['controller' => 'Resumos', 'action' => 'view',
                                    base64_encode($pracas->prefixo.$user->id)],
                            ['class' => 'btn btn-info btn-app','target' => '_blanck','title' =>  "Visualizar ".strtolower($pracas->nome),'escape' => false]) ?>
                    </td>
                    <td>
                        <h4 style="margin-top: 25px;"><?= h($pracas->nome) ?></h4>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
