<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Resumo Entity
 *
 * @property string|null $PRACA
 * @property string|null $DISTRIBUIDOR
 * @property string|null $DATAETAPA
 * @property string|null $NOMEDIS
 * @property int|null $NUMDIS
 * @property string|null $DISTRIBUIDOS
 * @property string|null $VENDIDOS
 * @property string|null $DEVOLVIDOS
 * @property string $CHAVE
 * @property string|null $DataHora
 * @property int $ETAPA
 */
class Resumo extends Entity
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
        'PRACA' => true,
        'DISTRIBUIDOR' => true,
        'DATAETAPA' => true,
        'NOMEDIS' => true,
        'NUMDIS' => true,
        'DISTRIBUIDOS' => true,
        'VENDIDOS' => true,
        'DEVOLVIDOS' => true,
        'DataHora' => true,
        'ETAPA' => true,
    ];
}
