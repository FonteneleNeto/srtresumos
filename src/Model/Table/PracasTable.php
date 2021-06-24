<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class PracasTable extends Table
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

        $this->setTable('pracas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Users', [
            'foreignKey' => 'praca_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'pracas_users',
        ]);
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('prefixo')
            ->maxLength('prefixo', 3)
            ->allowEmptyString('prefixo');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 30)
            ->allowEmptyString('nome');

        $validator
            ->boolean('ativa')
            ->allowEmptyString('ativa');

        return $validator;
    }
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['prefixo'],'Este Prefixo já está em uso'));
        return $rules;
    }
}
