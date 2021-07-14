<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;


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

        $validator
            ->integer('ETAPA')
            ->requirePresence('ETAPA', 'create')
            ->notEmptyString('ETAPA');

        return $validator;
    }

    public function findActiveUserAndPracas(Query $query, array $options)
    {
        $user = TableRegistry::getTableLocator()->get('Users');
        return $user->find('all', [
            'conditions' => ['id' => $options['id']],
        ])->contain([
            'Pracas' => function ($q) {
                return $q
                    ->select(['prefixo', 'nome'])
                    ->where(['Pracas.ativa' => true])
                    ->order(['Pracas.nome' => 'ASC']);
            }
        ])->first();
    }

    public function findMaxEtapa(Query $query, $options)
    {
        $maxEtapa = $this->find();
        $maxEtapa->select(['ETAPA' => $maxEtapa->func()->max('ETAPA')
        ])->where(['PRACA' => $options['praca']]);
        return $maxEtapa->first()->ETAPA;
    }
    public function findEtapa(Query $query, $options)
    {
        $maxEtapa = $this->find();
        $maxEtapa->select('ETAPA')
            ->where(['PRACA' => $options['praca'],'ETAPA' => $options['numero_etapa']]);
        return $maxEtapa->first()->ETAPA;
    }
    public function findEtapasOfPraca(Query $query, $options)
    {
        $etapas = $this->find();
        $query = $etapas->select(['PRACA','ETAPA'])
                ->where(['PRACA' => $options['praca']])->distinct('ETAPA')->orderDesc('ETAPA');
        return $query->toList();
    }

    public function findTotalsOfEtapa(Query $query, $options)
    {
        if (!empty($options)) {
            $totais = $this->find();
            return $totais
                ->select([
                    'qtd_distribuidor' => $totais->func()->count('DISTRIBUIDOR'),
                    'qtd_distribuidos' => $totais->func()->sum('DISTRIBUIDOS'),
                    'qtd_vendidos' => $totais->func()->sum('VENDIDOS'),
                    'qtd_devolvidos' => $totais->func()->sum('DEVOLVIDOS'),
                ])
                ->where(['Resumos.PRACA' => $options['praca']])
                ->where(['Resumos.ETAPA' => $options['etapa']])->first();
        }
        return null;
    }

    public function findSummaryCurrentEtapa(Query $query, $options)
    {
        return $this->find()
            ->where(['Resumos.praca' => $options['praca']])
            ->where(['Resumos.ETAPA' => $options['etapa']]);
    }

    public function findInforPraca(Query $query, $options)
    {
        $prefixo = $options['praca'];
        $praca = TableRegistry::getTableLocator()->get('Pracas');
        $query = $praca->find()
            ->select(['id', 'prefixo', 'nome'])
            ->where(['prefixo' => $prefixo])->first();
        return $query;
    }
}
