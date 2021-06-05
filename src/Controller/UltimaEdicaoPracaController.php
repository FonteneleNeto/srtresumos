<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UltimaEdicaoPraca Controller
 *
 * @property \App\Model\Table\UltimaEdicaoPracaTable $UltimaEdicaoPraca
 *
 * @method \App\Model\Entity\UltimaEdicaoPraca[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UltimaEdicaoPracaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $ultimaEdicaoPraca = $this->UltimaEdicaoPraca->get($id);
        die($ultimaEdicaoPraca);
        $this->set(compact('ultimaEdicaoPraca'));
    }

    /**
     * View method
     *
     * @param string|null $id Ultima Edicao Praca id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ultimaEdicaoPraca = $this->UltimaEdicaoPraca->get($id, [
            'contain' => [],
        ]);

        $this->set('ultimaEdicaoPraca', $ultimaEdicaoPraca);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ultimaEdicaoPraca = $this->UltimaEdicaoPraca->newEntity();
        if ($this->request->is('post')) {
            $ultimaEdicaoPraca = $this->UltimaEdicaoPraca->patchEntity($ultimaEdicaoPraca, $this->request->getData());
            if ($this->UltimaEdicaoPraca->save($ultimaEdicaoPraca)) {
                $this->Flash->success(__('The ultima edicao praca has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ultima edicao praca could not be saved. Please, try again.'));
        }
        $this->set(compact('ultimaEdicaoPraca'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ultima Edicao Praca id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ultimaEdicaoPraca = $this->UltimaEdicaoPraca->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ultimaEdicaoPraca = $this->UltimaEdicaoPraca->patchEntity($ultimaEdicaoPraca, $this->request->getData());
            if ($this->UltimaEdicaoPraca->save($ultimaEdicaoPraca)) {
                $this->Flash->success(__('The ultima edicao praca has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ultima edicao praca could not be saved. Please, try again.'));
        }
        $this->set(compact('ultimaEdicaoPraca'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ultima Edicao Praca id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ultimaEdicaoPraca = $this->UltimaEdicaoPraca->get($id);
        if ($this->UltimaEdicaoPraca->delete($ultimaEdicaoPraca)) {
            $this->Flash->success(__('The ultima edicao praca has been deleted.'));
        } else {
            $this->Flash->error(__('The ultima edicao praca could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
