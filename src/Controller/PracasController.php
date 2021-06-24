<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pracas Controller
 *
 * @property \App\Model\Table\PracasTable $Pracas
 *
 * @method \App\Model\Entity\Praca[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PracasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $pracas = $this->paginate($this->Pracas);
        $this->set(compact('pracas'));
    }

    /**
     * View method
     *
     * @param string|null $id Praca id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $praca = $this->Pracas->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('praca', $praca);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $praca = $this->Pracas->newEntity();
        if ($this->request->is('post')) {
            $praca = $this->Pracas->patchEntity($praca, $this->request->getData());
            if ($this->Pracas->save($praca)) {
                $this->Flash->success(__('The praca has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The praca could not be saved. Please, try again.'));
        }
        $users = $this->Pracas->Users->find('list')->where(['ativo' => 1]);
        $this->set(compact('praca', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Praca id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $praca = $this->Pracas->get($id, [
            'contain' => ['Users'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $praca = $this->Pracas->patchEntity($praca, $this->request->getData());
            if ($this->Pracas->save($praca)) {
                $this->Flash->success(__('The praca has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The praca could not be saved. Please, try again.'));
        }
        $users = $this->Pracas->Users->find('list')->where(['ativo' => 1]);;
        $this->set(compact('praca', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Praca id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $praca = $this->Pracas->get($id);
        if ($this->Pracas->delete($praca)) {
            $this->Flash->success(__('The praca has been deleted.'));
        } else {
            $this->Flash->error(__('The praca could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
