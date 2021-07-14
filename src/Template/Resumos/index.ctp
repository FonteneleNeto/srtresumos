<?php
//debug($query->pracas);
?>
<?php if (!empty($query->pracas)): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="col"><?= __('Buscar') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
            </tr>
            <?php foreach ($query->pracas as $pracas): ?>
                <tr>
                    <td>
                        <?php
                        echo $this->Form->create(null, [
                            'url' => [
                                'controller' => 'Resumos',
                                'action' => 'view'
                            ],
                            'id' => $pracas->prefixo
                        ]);
                        echo $this->Form->hidden('prefixo', ['value' => $pracas->prefixo]); ?>
                        <div class="input-group date margin">
                            <span class="input-group-btn" data-toggle="tooltip" data-placement="top" title="Buscar">
                                     <?php
                                     echo $this->Form->submit($pracas->prefixo,['class' => 'btn btn-success btn-flat']);
                                     echo $this->Form->end();
                                     ?>
                                </span>
                        </div>
                    </td>
                    <td>
                        <p style="margin-top: 20px"><?= $pracas->nome ?></p>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php endif; ?>
