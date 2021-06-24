<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Event\EventInterface;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Exception\MethodNotAllowedException;

class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Resumos');
        $this->Auth->allow(['login', 'logout', 'add', 'edit']);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }

    public function index()
    {
        $title = "Praças";
        $id = configure::read('user_id');
        /*$user = $this->Users->get(configure::read('user_id'), [
            'contain' => ['Pracas']
        ]);*/
        $user = $this->Users->find('all',[
            'conditions' => ['id' => $id],
        ])->contain([
            'Pracas' => function ($q) {
                return $q
                    ->select(['prefixo', 'nome'])
                    ->where(['Pracas.ativa' => true])
                    ->order(['Pracas.nome' => 'ASC']);
            }
        ])->first();
        $this->set(compact(['user','title']));
    }

    public function show()
    {

        if(Configure::read('user_tipo') != 'Admin'){
            throw new MethodNotAllowedException(__('Conflito de parâmetros'));
        }
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
    }

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Pracas'],
        ]);

        $this->set('user', $user);
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'show']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $pracas = $this->Users->Pracas->find('list', ['keyField' => 'id',
            'valueField' => 'nome'])->where(['ativa' => 1]);;
        $this->set(compact('user', 'pracas'));
    }


    public function edit($id = null)
    {
        #se o valor passado por url for diferente da ID do usuário, trava o uso do metodo
        if ($id != Configure::read('user_id') and Configure::read('user_tipo') != 'Admin') {
            throw new MethodNotAllowedException(__('Conflito de parâmetros'));
        }
        if (empty($id)) {
            throw new NotFoundException;
        }
        $user = $this->Users->get($id, [
            'contain' => ['Pracas'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'show']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $pracas = $this->Users->Pracas->find('list', ['keyField' => 'id',
            'valueField' => 'nome'])->where(['ativa' => 1]);;
        $this->set(compact('user', 'pracas'));
    }

    public function delete($id = null)
    {
        #se o valor passado por url for diferente da ID do usuário, trava o uso do metodo
        if ($id != Configure::read('user_id') and Configure::read('user_tipo') != 'Admin') {
            throw new MethodNotAllowedException(__('Conflito de parâmetros'));
        }
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'show']);
    }

    public function login()
    {
        #$this->layout = 'login';
        $this->viewBuilder()->setLayout('login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Usuário ou Senha inválidos, Verifique!'));
        }
    }

    public function logout()
    {
        Configure::delete('user_id');
        Configure::delete('user_tipo');
        return $this->redirect($this->Auth->logout());
    }
}
