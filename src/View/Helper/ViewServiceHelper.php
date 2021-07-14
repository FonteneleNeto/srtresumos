<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\I18n\Number;

/**
 * ViewService helper
 */
class ViewServiceHelper extends Helper
{
    public $helpers = ['Number'];
    protected $_defaultConfig = [];

    public function active($check)
    {
        return $check == 1 ? 'Ativo' : 'Inativo';
    }

    public function label($type,$text)
    {
        #label-success
        #label-danger
        return "<span class='label label-{$type}'>{$text}</span>";
    }
    public function progressColor($check)
    {
        $cor = "red";
        switch ($check) {
            case ($check < 25):
            case ($check === 0):
                $cor = "red";
                break;
            case ($check >= 25 and $check < 50):
                $cor = "yellow";
                break;
            case ($check >= 50 and $check < 90):
                $cor = "aqua";
                break;
            case ($check >= 90):
                $cor = "green";
                break;
        }
        return $cor;
    }
    public function extraviosDistribuidor($resumo)
    {
        if($resumo->DISTRIBUIDOS and $resumo->VENDIDOS and $resumo->DEVOLVIDOS){
            return ($resumo->DISTRIBUIDOS - $resumo->VENDIDOS - $resumo->DEVOLVIDOS);
        }
        return null;
    }
    public function progressoDistribuidor($distribuidos,$vendidos,$devolvidos)
    {
        if(isset($distribuidos) and isset($vendidos) and isset($devolvidos)){
            $extravios = ($distribuidos - $vendidos - $devolvidos);
        }
        if(isset($distribuidos)){
            return ($extravios / $distribuidos) * 100;
        }
    }
    public function statusDistribuidor($progresso)
    {
        $calc =  100 - $progresso;
        return $this->Number->precision($calc, 0);
    }
    public function calcExtravios($distribuidos,$vendidos,$devolvidos)
    {
        if($distribuidos and $vendidos and $devolvidos){
            $calc = $distribuidos - $vendidos - $devolvidos;
            return $this->Number->precision($calc, 0);
        }
    }
}
