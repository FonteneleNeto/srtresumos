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
        $etapa = $this->request->getData('etapa');
        $prefixo = $this->request->getData('prefixo');
        /*if ($this->request->getData('DATAETAPA') == '') {
            $dataEtapa = 'MAX(dataetapa)';
        }*/
        $verificaDataEtapa = $this->Resumos->find('all')
            ->where(['Resumos.praca' => $prefixo])
            ->where(['Resumos.ETAPA' => $etapa]);
        if ($this->request->is('post')) {
            if ($verificaDataEtapa->first() == NULL) {
                $this->Flash->error(__('Não foram encontrados registros para esta data'));
                return $this->redirect(['controller' => 'Users', 'action' => 'index']);
            }
        }

        #---------------------------------------------------------------
        #Carrega dados da praça para visualiações
        $pracaInfors = $this->Pracas->find()
            ->select(['id', 'prefixo', 'nome'])
            ->where(['prefixo' => $prefixo])->first();
        $resumos = $this->Resumos->find()
            #->select(['praca', 'dataepa' => 'MAX(dataetapa)'])
            ->select(['praca', 'dataepa' => $dataEtapa])
            ->where(['Resumos.praca' => $prefixo]);
        $praca = $resumos->first()->praca;
        $dataEtapa = $resumos->first()->dataepa;
        if ($praca == null) {
            throw new NotFoundException(__('Praça não encontrada'));
        }
        #---------------------------------------------------------------
        #busca dos dados do resumo
        $etapaAtual = $this->Resumos->find()
            ->where(['Resumos.praca' => $praca])
            ->where(['Resumos.DATAETAPA' => $dataEtapa]);
        #---------------------------------------------------------------
        #busca os totais distribuídos, vendidos e devolvidos
        $totais = $this->Resumos->find();
        $totais
            ->select([
                'qtd_distribuidor' => $totais->func()->count('DISTRIBUIDOR'),
                'qtd_distribuidos' => $totais->func()->sum('DISTRIBUIDOS'),
                'qtd_vendidos' => $totais->func()->sum('VENDIDOS'),
                'qtd_devolvidos' => $totais->func()->sum('DEVOLVIDOS')
            ])
            ->where(['Resumos.praca' => $praca])
            ->where(['Resumos.DATAETAPA' => $dataEtapa]);
        $this->set(compact(['pracaInfors', 'resumos', 'etapaAtual', 'totais']));
        $this->set('title', $pracaInfors->nome);
    }

    public function index()
    {
        $query = $this->Resumos->find('ActiveUserAndPracas',['id' => 1]);
        $this->set(compact('query'));
    }
}
