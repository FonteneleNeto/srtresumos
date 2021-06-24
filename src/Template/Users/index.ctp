<div class="resumos index large-9 medium-8 columns content">
    <h3><?= __('Praças') ?></h3>
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-info"></i> Atenção!</h4>
        Selecione a data da Etapa que deseja visualizar e clique no botão para buscar
    </div>
    <?php if (!empty($user->pracas)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Data Edição') ?></th>
                    <th scope="col"><?= __('Nome') ?></th>
                </tr>
                <?php foreach ($user->pracas as $pracas): ?>
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
                            <div class="input-group date margin" style="width: 125px;">
                                <input type="text" style="font-size: 12px" class="form-control data-etapa" name="DATAETAPA" autocomplete="off"
                                        required="required" placeholder="Selecione data">
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
</div>
