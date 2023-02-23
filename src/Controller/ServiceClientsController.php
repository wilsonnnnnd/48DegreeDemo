<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ServiceClients Controller
 *
 * @property \App\Model\Table\ServiceClientsTable $ServiceClients
 * @method \App\Model\Entity\ServiceClient[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServiceClientsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->checkRole();
        //$serviceClients = $this->paginate($this->ServiceClients);
        $serviceClients = $this->ServiceClients->find('all',['contain'=>'Users'])->toList();
        $this->set(compact('serviceClients'));
    }

    /**
     * View method
     *
     * @param string|null $id Service Client id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->checkRole();
        $serviceClient = $this->ServiceClients->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('serviceClient'));
    }

    /**
     * Check the user role
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function checkRole(){
        if ($this->request->getSession()->read('Auth.User.role') != 'Staff'){
            $this->Flash->error(__('No Access.'));
            return $this->redirect(['action' => 'dashboard','controller'=>'Users']);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->checkRole();
        $serviceClient = $this->ServiceClients->newEmptyEntity();
        if ($this->request->is('post')) {
            $serviceClient = $this->ServiceClients->patchEntity($serviceClient, $this->request->getData());
            $phone=$serviceClient->getPhoneNum();
            $this->loadModel('Inspectors');
            $this->loadModel('Subcontractors');
            $query=$this->Inspectors->find('all')->where(['phone_no'=>$phone]);
            $query2=$this->ServiceClients->find('all')->where(['phone_no'=>$phone]);
            $query3=$this->Subcontractors->find('all')->where(['phone_no'=>$phone]);
            $result=$query->first();
            $result2=$query2->first();
            $result3=$query3->first();
            if(is_null($result)&&is_null($result2)&&is_null($result3)) {
                if ($this->ServiceClients->save($serviceClient)) {
                    $this->Flash->success(__('The service client has been saved.'));

                    return $this->redirect(['controller' => 'Properties', 'action' => 'add2', $serviceClient->id]);
                }
                $this->Flash->error(__('The service client could not be saved. Please, try again.'));
            }
            else{
                $this->Flash->error(__('Duplicate Phone number, please change a new one.'));
            }
        }
        $users = $this ->ServiceClients ->Users ->find() ->all();
        $arr_serviceClient =[];
        foreach($users as $users){
            $arr_serviceClient[$users->id] = $users->email;
        }
        $this->set(compact('serviceClient', 'arr_serviceClient'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Service Client id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->checkRole();
        $serviceClient = $this->ServiceClients->get($id, [
            'contain' => [],
        ]);
        $phone2=$serviceClient["phone_no"];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $serviceClient = $this->ServiceClients->patchEntity($serviceClient, $this->request->getData());
            $phone=$serviceClient->getPhoneNum();
            $this->loadModel('Inspectors');
            $this->loadModel('Subcontractors');
            $query=$this->Inspectors->find('all')->where(['phone_no'=>$phone]);
            $query2=$this->ServiceClients->find('all')->where(['phone_no'=>$phone]);
            $query3=$this->Subcontractors->find('all')->where(['phone_no'=>$phone]);
            $result=$query->first();
            $result2=$query2->first();
            $result3=$query3->first();
            if(is_null($result)&&((!is_null($result2)&&$phone2==$phone)||(is_null($result2)))&&is_null($result3)) {
                if ($this->ServiceClients->save($serviceClient)) {
                    $this->Flash->success(__('The service client has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The service client could not be saved. Please, try again.'));
            }
            else{
                $this->Flash->error(__('Duplicate Phone number, please change a new one.'));
            }
        }
        $this->set(compact('serviceClient'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Service Client id.
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
            $serviceClient = $this->ServiceClients->get($id);
            try {
                if ($this->ServiceClients->delete($serviceClient)) {
                    $this->Flash->success(__('The service client has been deleted.'));
                } else {
                    $this->Flash->error(__('It cannot be deleted as the property of this client is under maintenance.'));
                }
            }catch (\Exception $e) {
                $this->Flash->error(__('It cannot be deleted as the property of this client is under maintenance.'));
            }


            return $this->redirect(['action' => 'index']);
        }
    }
}
