<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Properties Controller
 *
 * @property \App\Model\Table\PropertiesTable $Properties
 * @method \App\Model\Entity\Property[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropertiesController extends AppController
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
            'contain' => ['ServiceClients'],
        ];
        $properties = $this->paginate($this->Properties);

        $this->set(compact('properties'));
    }

    /**
     * View method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->checkRole();
        $property = $this->Properties->get($id, [
            'contain' => ['ServiceClients', 'Jobs'],
        ]);

        $this->set(compact('property'));
    }

    /**
     * Check the user role
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function checkRole()
    {
        if ($this->request->getSession()->read('Auth.User.role') == 'Staff' || $this->request->getSession()->read('Auth.User.role') == 'Inspector') {

        }else{
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
        if ($this->request->getSession()->read('Auth.User.role') != 'Staff') {
            $this->Flash->error(__('No Access.'));
            return $this->redirect(['action' => 'dashboard', 'controller' => 'Users']);
        }
        $property = $this->Properties->newEmptyEntity();
        if ($this->request->is('post')) {

            $date_start = $this->request->getData("warranty_start");
            $date_end = $this->request->getData("warranty_end");

            if ($date_start > $date_end) {
                $this->Flash->error(__('Warranty End cannot occur before Warranty Start.'));}
            else{

            $property = $this->Properties->patchEntity($property, $this->request->getData());
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been saved.'));

                return $this->redirect(['action' => 'index']);
            }}
            $this->Flash->error(__('The property could not be saved. Please, try again.'));
        }
        $serviceClients = $this ->Properties ->ServiceClients ->find() ->all();
        $arr_serviceClients =[];
        //$arr_combine_name=[]
        foreach($serviceClients as $u){
            //$arr_serviceClients[$u->client_id] = $u->combine(first_name, last_name);
            $arr_serviceClients[$u->id] = $u->full_name;
        }


        //$serviceClients = $this->Properties->ServiceClients->find('list', ['limit' => 200]);
        //$this->set(compact('property', 'serviceClients'));
        $this->set(compact('property', 'arr_serviceClients'));
    }
    public function add2($id)
    {
        if ($this->request->getSession()->read('Auth.User.role') != 'Staff') {
            $this->Flash->error(__('No Access.'));
            return $this->redirect(['action' => 'dashboard', 'controller' => 'Users']);
        }
        $this->loadModel('ServiceClients');
        $client = $this->ServiceClients->get($id);
        $this->set('client',$client);
        $property = $this->Properties->newEmptyEntity();

        if ($this->request->is('post')) {

            $date_start = $this->request->getData("warranty_start");
            $date_end = $this->request->getData("warranty_end");

            if ($date_start > $date_end) {
                $this->Flash->error(__('Warranty End cannot occur before Warranty Start.'));}
            else{

                $property = $this->Properties->patchEntity($property, $this->request->getData());
                $property->client_id=$id;
                if ($this->Properties->save($property)) {
                    $this->Flash->success(__('The property has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }}
            $this->Flash->error(__('The property could not be saved. Please, try again.'));
        }
        $serviceClients = $this ->Properties ->ServiceClients ->find() ->all();
        $arr_serviceClients =[];
        //$arr_combine_name=[]
        foreach($serviceClients as $u){
            //$arr_serviceClients[$u->client_id] = $u->combine(first_name, last_name);
            $arr_serviceClients[$u->id] = $u->full_name;
        }


        //$serviceClients = $this->Properties->ServiceClients->find('list', ['limit' => 200]);
        //$this->set(compact('property', 'serviceClients'));
        $this->set(compact('property', 'arr_serviceClients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->checkRole();
        $property = $this->Properties->get($id, [
            'contain' => ['ServiceClients'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $property = $this->Properties->patchEntity($property, $this->request->getData());

            $date_start = $this->request->getData("warranty_start");
            $date_end = $this->request->getData("warranty_end");

            if ($date_start > $date_end) {
                $this->Flash->error(__('Warranty End cannot occur before Warranty Start.'));}
            else{
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been saved.'));

                return $this->redirect(['action' => 'index']);
            }}
            $this->Flash->error(__('The property could not be saved. Please, try again.'));
        }
        $serviceClients = $this ->Properties ->ServiceClients ->find() ->all();
        $arr_serviceClients =[];
        //$arr_combine_name=[]
        foreach($serviceClients as $u){
            //$arr_serviceClients[$u->client_id] = $u->combine(first_name, last_name);
            $arr_serviceClients[$u->id] = $u->full_name;
        }


        $serviceClients = $this->Properties->ServiceClients->find('list', ['limit' => 200]);
        $this->set(compact('property', 'arr_serviceClients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Property id.
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
            $property = $this->Properties->get($id);

            try {
                if ($this->Properties->delete($property)) {
                    $this->Flash->success(__('The property has been deleted.'));
                } else {
                    $this->Flash->error(__('It cannot be deleted as the property still in process.'));
                }
            }catch (\Exception $e) {
                $this->Flash->error(__('It cannot be deleted as the property still in process.'));
            }
            return $this->redirect(['action' => 'index']);
        }

    }
}
