<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * ViewService helper
 */
class ViewServiceHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array
     */
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
}
