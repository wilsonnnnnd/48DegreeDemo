<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Inspectors Controller
 *
 * @property \App\Model\Table\InspectorsTable $Inspectors
 * @method \App\Model\Entity\Inspector[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InspectorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->checkRole();
       // $inspectors = $this->paginate($this->Inspectors);
        $inspectors = $this->Inspectors->find('all',['contain'=>'Users'])->toList();
        $this->set(compact('inspectors'));
    }

    /**
     * View method
     *
     * @param string|null $id Inspector id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->checkRole();
        $inspector = $this->Inspectors->get($id, [
            'contain' => ['Jobs'],
        ]);

        $this->set(compact('inspector'));
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
        $inspector = $this->Inspectors->newEmptyEntity();
        if ($this->request->is('post')) {
            $inspector = $this->Inspectors->patchEntity($inspector, $this->request->getData());
            $phone=$inspector->getPhoneNum();
            $this->loadModel('ServiceClients');
            $this->loadModel('Subcontractors');
            $query=$this->Inspectors->find('all')->where(['phone_no'=>$phone]);
            $query2=$this->ServiceClients->find('all')->where(['phone_no'=>$phone]);
            $query3=$this->Subcontractors->find('all')->where(['phone_no'=>$phone]);
            $result=$query->first();
            $result2=$query2->first();
            $result3=$query3->first();
            if(is_null($result)&&is_null($result2)&&is_null($result3)){
                $unique_phone=true;
                if($unique_phone==true){
                    if ($this->Inspectors->save($inspector)) {
                        $this->Flash->success(__('The inspector has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('The inspector could not be saved. Please, try again.'));
                }
                else{
                    $this->Flash->error(__('Your phone number is not unique.Please try again.'));
                }
            }
            else{
                $this->Flash->error(__('Duplicate Phone number, please change a new one.'));
            }
        }
        $users = $this ->Inspectors ->Users ->find() ->all();
        $group =[];
        foreach($users as $u){
            $group[$u->id] = $u->email;
        }
        $this->set(compact('inspector','group'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Inspector id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->checkRole();
        $inspector = $this->Inspectors->get($id, [
            'contain' => [],
        ]);
        $phone2=$inspector["phone_no"];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inspector = $this->Inspectors->patchEntity($inspector, $this->request->getData());
            $phone=$inspector->_getPhoneNum();
            $this->loadModel('ServiceClients');
            $this->loadModel('Subcontractors');
            $query=$this->Inspectors->find('all')->where(['phone_no'=>$phone]);
            $query2=$this->ServiceClients->find('all')->where(['phone_no'=>$phone]);
            $query3=$this->Subcontractors->find('all')->where(['phone_no'=>$phone]);
            $result=$query->first();
            $result2=$query2->first();
            $result3=$query3->first();
            if((!is_null($result)&&$phone2==$phone)||(is_null($result))&&is_null($result2)&&is_null($result3)) {
                if ($this->Inspectors->save($inspector)) {
                    $this->Flash->success(__('The inspector has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The inspector could not be saved. Please, try again.'));
            }
            else{
                $this->Flash->error(__('Duplicate Phone number, please change a new one.'));
            }
        }
        $this->set(compact('inspector'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Inspector id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($this->request->getSession()->read('Auth.User.role') != 'Staff'){
            $this->Flash->error(__('No Access.'));
            return $this->redirect(['action' => 'dashboard','controller'=>'Users']);
        }else{
            $this->request->allowMethod(['post', 'delete']);
            $inspector = $this->Inspectors->get($id);
            try {
                if ($this->Inspectors->delete($inspector)) {
                    $this->Flash->success(__('The inspector has been deleted.'));
                } else {
                    $this->Flash->error(__('It cannot be deleted as the inspector still has a job.'));
                }
            }catch (\Exception $e) {
                $this->Flash->error(__('It cannot be deleted as the inspector still has a job.'));
            }

            return $this->redirect(['action' => 'index']);
        }

    }







}
