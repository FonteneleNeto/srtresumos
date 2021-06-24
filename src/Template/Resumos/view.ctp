<?php

use Cake\I18n\Number;

$distribuidos = $totais->first()->qtd_distribuidos;
$vendidos = $totais->first()->qtd_vendidos;
$devolvidos = $totais->first()->qtd_devolvidos;
$extravios = $distribuidos - $vendidos - $devolvidos;
$progresso = ($extravios / $distribuidos) * 100;
$status = 100 - $progresso;
#$status = 26;
$cor = "progress-bar-primary";
switch ($status) {
    case ($status < 25):
        $cor = "progress-bar-red";
        break;
    case ($status >= 25 and $status < 50):
        $cor = "progress-bar-yellow";
        break;
    case ($status >= 50 and $status < 90):
        $cor = "progress-bar-aqua";
        break;
    case ($status >= 90):
        $cor = "progress-bar-green";
        break;
}
?>
<div class="row">
    <div class="col-lg-10">
        <h3><?= $pracaInfors->prefixo ?> <i class="fa fa-hand-o-right"></i> <?= $pracaInfors->nome ?></h3>
    </div>
    <div class="col-lg-2">
        <div class="pull-right">
            <button class="btn btn-block btn-success hidden-print" onClick="window.location.reload();">Atualizar</button>
        </div>
    </div>
</div>
<br>
<div class="progress progress active hidden-print">
    <div class="progress-bar <?= $cor ?> progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0"
         aria-valuemax="100" style="width: <?= $status ?>%">
        <?= $this->Number->precision($status, 1); ?>% processados
    </div>
</div>
<!-- Small boxes (Stat box) -->
<div class="row">
    <!-- VENDIDOS -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= number_format($totais->first()->qtd_vendidos, 0, ',', '.'); ?></h3>
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
                <h3><?= $totais->first()->qtd_distribuidos - $totais->first()->qtd_vendidos - $totais->first()->qtd_devolvidos; ?></h3>
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
                <h3><?= number_format($totais->first()->qtd_devolvidos, 0, ',', '.'); ?></h3>
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
                <h3><?= number_format($totais->first()->qtd_distribuidos, 0, ',', '.'); ?></h3>
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
<!-- TABELA RESUMO-->
<div class="table-responsive">
    <table class="table no-margin table-striped">
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
                <?= $pracaInfors->prefixo ?> <i class="fa fa-hand-o-right"></i> <?= $pracaInfors->nome ?>
            </td>
            <td><i class="fa fa-calendar-check-o"></i>
                <?php
                $data = new DateTime($resumos->first()->dataepa);
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
        <?php foreach ($etapaAtual as $etapa): ?>
            <tr>
                <td><?= $etapa->DISTRIBUIDOR ?></td>
                <td><?= number_format($etapa->VENDIDOS, 0, ',', '.') ?></td>
                <td><?= $etapa->DISTRIBUIDOS - $etapa->VENDIDOS - $etapa->DEVOLVIDOS ?></td>
                <td><?= number_format($etapa->DEVOLVIDOS, 0, ',', '.') ?></td>
                <td><?= number_format($etapa->DISTRIBUIDOS, 0, ',', '.') ?></td>
                <td width="200" class="hidden-xs">
                    <?php
                    # echo $this->Number->precision($statusDistribuidor, 0);
                    $extraviosDistribuidor = ($etapa->DISTRIBUIDOS - $etapa->VENDIDOS - $etapa->DEVOLVIDOS);
                    $progressoDistribuidor = ($extraviosDistribuidor / $etapa->DISTRIBUIDOS) * 100;
                    $statusDistribuidor = 100 - $progressoDistribuidor;
                    $result = $this->Number->precision($statusDistribuidor, 0);
                    $cor = "red";
                    switch ($result) {
                        case ($result === 0):
                            $cor = "red";
                            break;
                        case ($result < 25):
                            $cor = "red";
                            break;
                        case ($result >= 25 and $result < 50):
                            $cor = "yellow";
                            break;
                        case ($result >= 50 and $result < 90):
                            $cor = "aqua";
                            break;
                        case ($result >= 90):
                            $cor = "green";
                            break;
                    }
                    ?>
                    <div class="progress progress-xs progress-striped active">
                        <div class="progress-bar progress-bar-<?= $cor ?>"
                             style="width:<?= $result ?>%"></div>
                    </div>
                </td>
                <td class="hidden-xs">
                    <?php
                    $extraviosDistribuidor = ($etapa->DISTRIBUIDOS - $etapa->VENDIDOS - $etapa->DEVOLVIDOS);
                    $progressoDistribuidor = ($extraviosDistribuidor / $etapa->DISTRIBUIDOS) * 100;
                    $statusDistribuidorFinal = 100 - $progressoDistribuidor; ?>
                    <span
                        class="badge bg-<?=$cor ?>"><?php echo $this->Number->precision($statusDistribuidorFinal, 0); ?>%</span>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr class="bg-gray-active">
            <th>TOTAL</th>
            <th><?= $this->Number->precision($totais->first()->qtd_vendidos, 0) ?></th>
            <th>
                <?php
                $totalExtravios = $totais->first()->qtd_distribuidos - $totais->first()->qtd_vendidos - $totais->first()->qtd_devolvidos;
                echo $this->Number->precision($totalExtravios, 0);
                ?>
            </th>
            <th><?= $this->Number->precision($totais->first()->qtd_devolvidos, 0) ?></th>
            <th><?= $this->Number->precision($totais->first()->qtd_distribuidos, 0) ?></th>
            <th colspan="2" class="hidden-xs"> <span
                    class="badge bg-<?= $cor ?>"><?php
                    $totalExtravios = $totais->first()->qtd_distribuidos - $totais->first()->qtd_vendidos - $totais->first()->qtd_devolvidos;
                    $progressoDistribuidorTotal = ($totalExtravios / $totais->first()->qtd_distribuidos) * 100;
                    $progressoTotal = 100 - $progressoDistribuidorTotal;
                    echo $this->Number->precision($progressoTotal, 1);
                    #echo $this->Number->precision($statusDistribuidor, 0); ?>%</span>
            </th>
        </tr>
        </tfoot>
    </table>
</div>
<script>
    setTimeout(function () {
        window.location.reload();
    }, 300000);
</script>

