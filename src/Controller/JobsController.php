<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Jobs Controller
 *
 * @property \App\Model\Table\JobsTable $Jobs
 * @method \App\Model\Entity\Job[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JobsController extends AppController
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
            'contain' => ['Properties', 'Inspectors'],
        ];
        $jobs = $this->paginate($this->Jobs);

        $this->set(compact('jobs'));
    }

    /**
     * View method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->checkRole();
        $job = $this->Jobs->get($id, [
            'contain' => ['Properties', 'Inspectors', 'Reports'],
        ]);

        $this->set(compact('job'));
    }

    /**
     * Check the user role
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function checkRole(){
        if ($this->request->getSession()->read('Auth.User.role') == 'Staff' || $this->request->getSession()->read('Auth.User.role') == 'Inspector'|| $this->request->getSession()->read('Auth.User.role') == 'Client') {
        }
        else{
            $this->Flash->error(__('No Access.'));
            return $this->redirect(['action' => 'dashboard', 'controller' => 'Users']);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->request->getSession()->read('Auth.User.role') == 'Staff') {
        }
        else{
            $this->Flash->error(__('No Access.'));
            return $this->redirect(['action' => 'dashboard', 'controller' => 'Users']);
        }
        $job = $this->Jobs->newEmptyEntity();
        if ($this->request->is('post')) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $arr_properties =[];
//        $properties = $this->Jobs->Properties->find('all', ['limit' => 200])->contain(['ServiceClients'])->all();
        /*foreach($properties as $property_name){
            $arr_properties[$property_name->id] = $property_name->service_client->full_name;
        }*/
        $this->loadModel('Properties');
        $arr_properties = $this->Properties->find('list', ['keyField' => 'id','valueField' => function ($row) {return $row->street.",  ".$row->city;},'limit' => 200]);
        $arr_inspectors =[];
        $inspectors = $this->Jobs->Inspectors->find('all', ['limit' => 200]);
        foreach($inspectors as $inspector_name){
            $arr_inspectors[$inspector_name->id] = $inspector_name->full_name;
        }

//        $status =array('Pending' => 'Pending', 'Ongoing' => 'Ongoing','Completed'=>'Completed');

        $this->set(compact('job',  'arr_properties', 'arr_inspectors'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->checkRole();
        $job = $this->Jobs->get($id, [
            'contain' => ['Properties', 'Inspectors', 'Reports'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $this->loadModel('Properties');
        $arr_properties = $this->Properties->find('list', ['keyField' => 'id','valueField' => function ($row) {return $row->street.",  ".$row->city;},'limit' => 200]);
        $arr_inspectors =[];
        $inspectors = $this->Jobs->Inspectors->find('all', ['limit' => 200]);
        foreach($inspectors as $inspector_name){
            $arr_inspectors[$inspector_name->id] = $inspector_name->full_name;
        }

//        $status =array('Pending' => 'Pending', 'Ongoing' => 'Ongoing','Completed'=>'Completed');

        $this->set(compact('job',  'arr_properties', 'arr_inspectors'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Job id.
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
            $job = $this->Jobs->get($id);
            try {
                if ($this->Jobs->delete($job)) {
                    $this->Flash->success(__('The job has been deleted.'));
                }else {
                    $this->Flash->error(__('It cannot be deleted as the job still in process.'));
                }
            }catch (\Exception $e) {
                $this->Flash->error(__('It cannot be deleted as the job still in process.'));
            }
            return $this->redirect(['action' => 'index']);
        }

    }


}
