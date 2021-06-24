<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;


class Praca extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'prefixo' => true,
        'nome' => true,
        'ativa' => true,
        'created' => true,
        'updated' => true,
        'users' => true,
    ];

    protected function _setNome($nome)
    {
        return mb_strtoupper($nome);
    }
    protected function _setPrefixo($prefixo)
    {
        return mb_strtoupper($prefixo);
    }
}
