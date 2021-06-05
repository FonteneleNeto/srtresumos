<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UltimaEdicaoPraca Model
 *
 * @method \App\Model\Entity\UltimaEdicaoPraca get($primaryKey, $options = [])
 * @method \App\Model\Entity\UltimaEdicaoPraca newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UltimaEdicaoPraca[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UltimaEdicaoPraca|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UltimaEdicaoPraca saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UltimaEdicaoPraca patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UltimaEdicaoPraca[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UltimaEdicaoPraca findOrCreate($search, callable $callback = null, $options = [])
 */
class UltimaEdicaoPracaTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('ultima_edicao_praca');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->scalar('DATAETAPA')
            ->maxLength('DATAETAPA', 8)
            ->allowEmptyString('DATAETAPA');

        $validator
            ->scalar('PRACA')
            ->maxLength('PRACA', 3)
            ->allowEmptyString('PRACA');

        return $validator;
    }
}
