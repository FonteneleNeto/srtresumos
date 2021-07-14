<!-- FORM BUSCAR ETAPA -->
<div class="row">
    <div class="col-lg-offset-8 col-lg-4">
        <div class=" pull-right">
            <?php echo $this->Form->create($resumos, ['type' => 'post']); ?>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">Buscar etapa</label>
                <div class="col-sm-7">
                    <div class="input-group input-group-sm">
                        <select name="numero_etapa" class="form-control">
                            <?php
                            foreach ($etapas as $etapa => $praca) {
                                ?>
                                <option value="<?= $praca->ETAPA ?>"><?= $praca->ETAPA ?></option>
                            <?php } ?>
                        </select>
                        <?php echo $this->Form->hidden('praca_prefixo', ['value' => $praca->PRACA]); ?>
                        <span class="input-group-btn">
                            <input type="submit" class="btn btn-success btn-flat" value="Buscar">
                    </span>
                    </div>
                </div>
            </div>
            <?php echo $this->Form->end() ?>
        </div>
    </div>
</div>
<br>
<?php
$progressorGeral = $this->ViewService->progressoDistribuidor($totais->qtd_distribuidos, $totais->qtd_vendidos, $totais->qtd_devolvidos);
$statusGeral = $this->ViewService->statusDistribuidor($progressorGeral);
?>
<!-- BARRA PROGRESSO GERAL-->
<div class="progress progress active hidden-print">
    <div class="progress progress">
        <div class="progress-bar progress-bar-<?= $this->ViewService->progressColor($statusGeral) ?>"
             style="width:<?= $statusGeral ?>%">
            <?= $this->Number->precision($statusGeral, 1); ?>% processados
        </div>
    </div>
</div>
<!-- Small boxes (Stat box) -->
<div class="row">
    <!-- VENDIDOS -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= $this->Number->precision($totais->qtd_vendidos, 0); ?></h3>
                <p>VENDIDOS</p>
            </div>
            <div class="icon">
                <i class="fa fa-dollar"></i>
            </div>
        </div>
    </div><!-- ./col -->
    <!-- FALTAS -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?= $this->ViewService->calcExtravios($totais->qtd_distribuidos, $totais->qtd_vendidos, $totais->qtd_devolvidos) ?></h3>
                <p>FALTAS</p>
            </div>
            <div class="icon">
                <i class="fa fa-times-circle-o"></i>
            </div>
        </div>
    </div><!-- ./col -->
    <!-- DEVOLVIDOS -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= $this->Number->precision($totais->qtd_devolvidos, 0); ?></h3>
                <p>DEVOLUÇÕES</p>
            </div>
            <div class="icon">
                <i class="fa fa-retweet"></i>
            </div>
        </div>
    </div><!-- ./col -->
    <!-- DISTRIBUIDOS -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= number_format($totais->qtd_distribuidos, 0, ',', '.'); ?></h3>
                <p>SAÍDAS</p>
            </div>
            <div class="icon">
                <!-- <i class="ion ion-stats-bars"></i>-->
                <i class="fa fa-exchange"></i>
            </div>
        </div>
    </div><!-- ./col -->
</div>
<!-- Small boxes (fim) -->
<div class="table-responsive">
    <table class="table no-margin table-striped table-condensed">
        <thead>
        <tr class="bg-gray-active">
            <th colspan="2">
                PRAÇA
            </th>
            <th>
                Resumos da Etapa
            </th>
            <th colspan="4">

            </th>
        </tr>
        <tr>
            <td colspan="2">
                <?= $inforPraca->prefixo ?> <i class="fa fa-hand-o-right"></i> <?= $inforPraca->nome ?>
            </td>
            <td><i class="fa fa-calendar-check-o"></i>
                <?php

                $data = new DateTime($dataEtapa);
                echo $data->format('d-m-Y');
                ?>
            </td>
            <td colspan="4"></td>
        </tr>
        <tr class="bg-gray-active">
            <th>DISTRIBUIDORES</th>
            <th>VENDIDOS</th>
            <th>FALTAS</th>
            <th>DEVOLUÇÕES</th>
            <th>SAÍDAS</th>
            <th class="hidden-xs">PROGRESSO</th>
            <th class="hidden-xs">Status</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($resumos as $resumo): ?>
            <tr>
                <td><?= $resumo->NOMEDIS ?></td>
                <td><?= $this->Number->format($resumo->VENDIDOS); ?></td>
                <td><?= $resumo->DISTRIBUIDOS - $resumo->VENDIDOS - $resumo->DEVOLVIDOS ?></td>
                <td><?= $this->Number->format($resumo->DEVOLVIDOS) ?></td>
                <td><?= $this->Number->format($resumo->DISTRIBUIDOS) ?></td>
                <td width="200" class="hidden-xs">
                    <?php $progressoDistribuidor = $this->ViewService->statusDistribuidor($this->ViewService->progressoDistribuidor($resumo->DISTRIBUIDOS, $resumo->VENDIDOS, $resumo->DEVOLVIDOS)); ?>
                    <div class="progress progress-xs active">
                        <div
                            class="progress-bar progress-bar-<?= $this->ViewService->progressColor($progressoDistribuidor) ?>"
                            style="width:<?= $progressoDistribuidor ?>%"></div>
                    </div>
                </td>
                <td class="hidden-xs">
                    <span class="badge bg-<?= $this->ViewService->progressColor($progressoDistribuidor) ?>">
                        <?php echo $progressoDistribuidor; ?>%</span>
                </td>
            </tr>
        <?php endforeach; ?>
        <tfoot>
        <tr class="bg-gray-active">
            <td>TOTAL <?= $totais->PRACA ?></td>
            <td><?= $totais->qtd_vendidos ?></td>
            <td><?= $this->ViewService->calcExtravios($totais->qtd_distribuidos, $totais->qtd_vendidos, $totais->qtd_devolvidos) ?></td>
            <td><?= $totais->qtd_devolvidos ?></td>
            <td><?= $totais->qtd_distribuidos ?></td>
            <td class="hidden-xs">
                <div class="progress progress-xs active">
                    <div
                        class="progress-bar progress-bar-<?= $this->ViewService->progressColor($statusGeral) ?> progress-bar-striped"
                        style="width: <?= $statusGeral ?>%">
                        <span class="sr-only"></span>
                    </div>
                </div>
            </td>
            <td class="hidden-xs"><span class="badge bg-<?= $this->ViewService->progressColor($statusGeral) ?>">
                        <?php echo $statusGeral; ?>%</span></td>
        </tr>
        </tfoot>
        </tbody>
    </table>
</div>
<script>
    setTimeout(function () {
        window.location.reload();
    }, 300000);
</script>

