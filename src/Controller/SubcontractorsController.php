<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Subcontractors Controller
 *
 * @property \App\Model\Table\SubcontractorsTable $Subcontractors
 * @method \App\Model\Entity\Subcontractor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubcontractorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->checkRole();
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $subcontractors = $this->paginate($this->Subcontractors);

        $this->set(compact('subcontractors'));
    }

    /**
     * View method
     *
     * @param string|null $id Subcontractor id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->checkRole();
        $subcontractor = $this->Subcontractors->get($id, [
            'contain' => ['Users', 'Projects'],
        ]);

        $this->set(compact('subcontractor'));
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
        $subcontractor = $this->Subcontractors->newEmptyEntity();
        if ($this->request->is('post')) {
            $subcontractor = $this->Subcontractors->patchEntity($subcontractor, $this->request->getData());
            $phone=$subcontractor->getPhoneNum();
            $this->loadModel('Inspectors');
            $this->loadModel('ServiceClients');
            $query=$this->Inspectors->find('all')->where(['phone_no'=>$phone]);
            $query2=$this->ServiceClients->find('all')->where(['phone_no'=>$phone]);
            $query3=$this->Subcontractors->find('all')->where(['phone_no'=>$phone]);
            $result=$query->first();
            $result2=$query2->first();
            $result3=$query3->first();
            if(is_null($result)&&is_null($result2)&&is_null($result3)) {
                if ($this->Subcontractors->save($subcontractor)) {
                    $this->Flash->success(__('The subcontractor has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The subcontractor could not be saved. Please, try again.'));
            }
            else{
                $this->Flash->error(__('Duplicate Phone number, please change a new one.'));
            }
        }
        $users = $this->Subcontractors->Users->find('list', ['keyField' => 'id', 'valueField' => 'email'
,'limit' => 200]);
        $this->set(compact('subcontractor', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Subcontractor id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->checkRole();
        $subcontractor = $this->Subcontractors->get($id, [
            'contain' => [],
        ]);
        $phone2=$subcontractor["phone_no"];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subcontractor = $this->Subcontractors->patchEntity($subcontractor, $this->request->getData());
            $phone=$subcontractor->getPhoneNum();
            $this->loadModel('Inspectors');
            $this->loadModel('ServiceClients');
            $query=$this->Inspectors->find('all')->where(['phone_no'=>$phone]);
            $query2=$this->ServiceClients->find('all')->where(['phone_no'=>$phone]);
            $query3=$this->Subcontractors->find('all')->where(['phone_no'=>$phone]);
            $result=$query->first();
            $result2=$query2->first();
            $result3=$query3->first();
            if(is_null($result)&&is_null($result2)&&((!is_null($result3)&&$phone2==$phone)||is_null($result3))) {
                if ($this->Subcontractors->save($subcontractor)) {
                    $this->Flash->success(__('The subcontractor has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The subcontractor could not be saved. Please, try again.'));
            }
            else{
                $this->Flash->error(__('Duplicate Phone number, please change a new one.'));
            }
        }
        $users = $this->Subcontractors->Users->find('list', ['limit' => 200]);
        $this->set(compact('subcontractor', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Subcontractor id.
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
            $subcontractor = $this->Subcontractors->get($id);
            try {
                if ($this->Subcontractors->delete($subcontractor)) {
                    $this->Flash->success(__('The subcontractor has been deleted.'));
                } else {
                    $this->Flash->error(__('It cannot be deleted as the subcontractor still has a project.'));
                }
            }catch (\Exception $e) {
                $this->Flash->error(__('It cannot be deleted as the subcontractor still has a project.'));;
            }

            return $this->redirect(['action' => 'index']);
        }
    }
}
