<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => 'Controller',
            'authenticate' => [
                'Form' => [
                    'finder' => 'auth'
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'resumos',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            // If unauthorized, return them to page they were just on
            // 'unauthorizedRedirect' => $this->referer()
        ]);
    }

    public function beforeFilter(Event $event)
    {
        $dataUser = array(
            'user_id' => $this->Auth->user('id'),
            'username' => $this->Auth->user('username'),
            'name' => $this->Auth->user('name'),
            'created' =>  $this->Auth->user('created'),
            'tipo' =>  $this->Auth->user('role'),
        );
        $this->set($dataUser);
        Configure::write('user_id',$this->Auth->user('id'));
        Configure::write('user_tipo',$this->Auth->user('role'));
    }
    public function isAuthorized($user)
    {
        return true;
    }
}
