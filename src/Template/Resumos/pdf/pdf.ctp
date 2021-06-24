<!DOCTYPE html>
<html>
<head>
    <title>PDF</title>
    <style>
        @page {
            margin: 0px 0px 0px 0px !important;
            padding: 0px 0px 0px 0px !important;
        }
    </style>
</head>
<body>
<?php
echo $distribuidos = $totais->first()->qtd_distribuidos;
$vendidos = $totais->first()->qtd_vendidos;
$devolvidos = $totais->first()->qtd_devolvidos;
?>
</body>
</html>
