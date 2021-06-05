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
    }


    public function view($prefixo = null,$id = null)
    {
        #Recebe o prefixo + ID_usuário vindo da URL em Base64 e decodifica
        $prefixo = base64_decode($prefixo.Configure::read('user_id'));
        #Elimina o ID do usuário da string do prefixo
        $prefixo = substr($prefixo,0,3);
        if ($prefixo == null) {
            throw new NotFoundException(__('Prefixo não encontrado'));
        }
        #---------------------------------------------------------------
        #Carrega dados da praça para visualiações
        $pracaInfors = $this->Pracas->find()
                        ->select(['id','prefixo','nome'])
                        ->where(['prefixo' => $prefixo])->first();
        $resumos = $this->Resumos->find()
            ->select(['praca', 'dataepa' => 'MAX(dataetapa)'])
            ->where(['Resumos.praca' => $prefixo]);
        $praca = $resumos->first()->praca;
        $dataEtapa = $resumos->first()->dataepa;
        if($praca == null){
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
        $this->set(compact(['pracaInfors','resumos', 'etapaAtual','totais']));
    }
}
