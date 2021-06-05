<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Resumos Model
 *
 * @method \App\Model\Entity\Resumo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Resumo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Resumo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Resumo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Resumo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Resumo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Resumo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Resumo findOrCreate($search, callable $callback = null, $options = [])
 */
class ResumosTable extends Table
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

        $this->setTable('resumos');
        $this->setDisplayField('CHAVE');
        $this->setPrimaryKey('CHAVE');
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
            ->scalar('PRACA')
            ->maxLength('PRACA', 3)
            ->allowEmptyString('PRACA');

        $validator
            ->scalar('DISTRIBUIDOR')
            ->maxLength('DISTRIBUIDOR', 10)
            ->allowEmptyString('DISTRIBUIDOR');

        $validator
            ->scalar('DATAETAPA')
            ->maxLength('DATAETAPA', 8)
            ->allowEmptyString('DATAETAPA');

        $validator
            ->scalar('NOMEDIS')
            ->maxLength('NOMEDIS', 40)
            ->allowEmptyString('NOMEDIS');

        $validator
            ->integer('NUMDIS')
            ->allowEmptyString('NUMDIS');

        $validator
            ->scalar('DISTRIBUIDOS')
            ->maxLength('DISTRIBUIDOS', 16777215)
            ->allowEmptyString('DISTRIBUIDOS');

        $validator
            ->scalar('VENDIDOS')
            ->maxLength('VENDIDOS', 16777215)
            ->allowEmptyString('VENDIDOS');

        $validator
            ->scalar('DEVOLVIDOS')
            ->maxLength('DEVOLVIDOS', 16777215)
            ->allowEmptyString('DEVOLVIDOS');

        $validator
            ->scalar('CHAVE')
            ->maxLength('CHAVE', 15)
            ->allowEmptyString('CHAVE', null, 'create');

        $validator
            ->scalar('DataHora')
            ->maxLength('DataHora', 20)
            ->allowEmptyString('DataHora');

        return $validator;
    }
}
