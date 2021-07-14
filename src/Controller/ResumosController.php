<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Http\Exception\MethodNotAllowedException;
use Cake\Http\Exception\NotFoundException;


class ResumosController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Pracas');
        $this->loadModel('Users');
    }


    public function view()
    {
        if($this->request->is('post') and $this->request->getData('numero_etapa') != null){
            $numero_etapa = $this->request->getData('numero_etapa');
            $praca = $this->request->getData('praca_prefixo');
        }else{
            $praca = $this->request->getData('prefixo');
            $numero_etapa = $this->Resumos->find('MaxEtapa', ['praca' => $praca]);
        }

        $options = ['praca' => $praca, 'etapa' => $numero_etapa];
        #busca os totais distribuídos, vendidos e devolvidos
        $totais = $this->Resumos->find('TotalsOfEtapa', $options);
        $inforPraca = $this->Resumos->find('inforPraca',$options);
        #busca as linhas da referida etapa e praça para montar tabela
        $dataEtapa = $this->Resumos->find('SummaryCurrentEtapa', $options)->first()->DATAETAPA;
        $resumos = $this->Resumos->find('SummaryCurrentEtapa', $options);
        $etapas = $this->Resumos->find('EtapasOfPraca',$options);

        $this->set(compact(['totais', 'resumos','inforPraca','dataEtapa','etapas']));
    }

    public function index()
    {
        $query = $this->Resumos->find('ActiveUserAndPracas', ['id' => 1]);
        $this->set(compact('query'));
    }
}
