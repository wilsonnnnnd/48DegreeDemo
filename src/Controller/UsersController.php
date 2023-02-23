<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\I18n\Date;
use Cake\I18n\Time;
use http\Client\Curl\User;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->checkRole();
        $users = $this->Users->find();

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if ($this->request->getSession()->read('Auth.User.role') == 'Staff'){
            $user = $this->Users->get($id, [
                'contain' => [],
            ]);
            $this->set(compact('user'));
        }
        elseif($this->request->getSession()->read('Auth.User.id')!=$id ){
            $this->Flash->error(__('No Access.'));
            return $this->redirect(['action' => 'dashboard', 'controller' => 'Users']);
        }
//        $this->checkRole();
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }


    /**
     * Check the user role
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function checkRole()
    {
        if ($this->request->getSession()->read('Auth.User.role') != 'Staff') {
            $this->Flash->error(__('No Access.'));
            return $this->redirect(['action' => 'dashboard', 'controller' => 'Users']);
        }
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function addInspector()
    {
        //        $loggedInUser = $this->request->getAttribute('authentication')->getIdentity()->get('role');
        $this->checkRole();
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function addClient()
    {
        //        $loggedInUser = $this->request->getAttribute('authentication')->getIdentity()->get('role');
        $this->checkRole();
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['controller'=>'Properties','action' => 'add2',$user->service_client->id]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function addSubcontractor()
    {
        //        $loggedInUser = $this->request->getAttribute('authentication')->getIdentity()->get('role');
        $this->checkRole();
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->checkRole();
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($this->request->getSession()->read('Auth.User.role') != 'Staff') {
            $this->Flash->error(__('No Access.'));
            return $this->redirect(['action' => 'dashboard', 'controller' => 'Users']);
        } else {
            $this->request->allowMethod(['post', 'delete']);
            $user = $this->Users->get($id);
            $email = $user["email"];
            try {
                if ($this->request->getSession()->read('Auth.User.role') != 'Staff') {
                    $this->Flash->error(__('Staff cannot be deleted.'));
                } elseif ($user->role == 'Staff'){
                    $this->Flash->error(__('It cannot be deleted as Yourself.'));
                } elseif ($this->Users->delete($user)){
                    $this->Flash->success(__('The user ' . $email . ' has been deleted.'));
                }else {
                    if ($user->role == 'Client') {
                        $this->Flash->error(__('It cannot be deleted as the property of this client is under maintenance.'));
                    } elseif ($user->role == 'Inspector') {
                        $this->Flash->error(__('It cannot be deleted as the inspector still has a job.'));
                    } else {
                        $this->Flash->error(__('It cannot be deleted as the subcontractor still has a project.'));
                    }
                }

            }catch (\Exception $e) {
                if ($user->role == 'Client') {
                    $this->Flash->error(__('It cannot be deleted as the property of this client is under maintenance.'));
                } elseif ($user->role == 'Inspector') {
                    $this->Flash->error(__( 'It cannot be deleted as the inspector still has a job.'));
                } else {
                    $this->Flash->error(__('It cannot be deleted as the subcontractor still has a project.'));
                }

            }

            return $this->redirect(['action' => 'index']);
        }
    }

    public function login()
    {

        $this->viewBuilder()->setLayout('default2');


        if ($this->getRequest()->is('post')) {
            $user = $this->Auth->identify();
            $this->Auth->user('email');
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['action' => 'dashboard']);
            }else{
                $this->Flash->error('Your username or password is incorrect.');

            }
        }
    }



    public function logout()
    {
        $this->Flash->success('You are now logged out');
        $this->Auth->logout();
        return  $this->redirect(['action' => 'login', 'controller' => 'Users']);
    }

    public function dashboard($id = null)
    {
        $this->loadModel('Jobs');
        $date=Time::now()->modify('+7 days');
        $date->setTimezone('Australia/Melbourne');
        $newDate=$date->i18nFormat('yyyy-MM-dd');
        $jobduedate=$this->Jobs->find('all',['conditions'=>['and'=>['expected_completion_date <'=>$newDate,'status !='=>2]]])->contain(['Properties', 'Inspectors'])->toList();
        $this->set('jobduedate',$jobduedate);

        $this->loadModel('Projects');
        $projectduedate=$this->Projects->find('all',['conditions'=>['and'=>['expected_completion_date <'=>$newDate,'status !='=>2]]])->contain(['Properties', 'Subcontractors'])->toList();
        $this->set('projectduedate',$projectduedate);

//        $user = $this->Users->get($id, [
//            'contain' => ['Users'],
//        ]);
//        $userno = count($this->Users->id);
//        $this->set(compact('user','userno'));


    }
    public function manual()
    {
    }
}
