<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectsController extends AppController
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
            'contain' => ['Properties', 'Subcontractors'],
        ];
        $projects = $this->paginate($this->Projects);

        $this->set(compact('projects'));
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->checkRole();
        $project = $this->Projects->get($id, [
            'contain' => ['Properties', 'Subcontractors'],
        ]);

        $this->set(compact('project'));
    }

    /**
     * Check the user role
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function checkRole(){
        if ($this->request->getSession()->read('Auth.User.role') == 'Staff' ||$this->request->getSession()->read('Auth.User.role') == 'Subcontractor') {
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
        if ($this->request->getSession()->read('Auth.User.role') != 'Staff') {
            $this->Flash->error(__('No Access.'));
            return $this->redirect(['action' => 'dashboard', 'controller' => 'Users']);
        }
        $project = $this->Projects->newEmptyEntity();
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $properties = $this->Projects->Properties->find('list', ['keyField' => 'id', 'valueField' => function ($row) {return $row->street.",  ".$row->city;},
'limit' => 200]);
        $subcontractors = $this->Projects->Subcontractors->find('list', ['keyField' => 'id', 'valueField' =>function ($row) {return $row->business.",  ".$row->speciality;},
'limit' => 200]);
        $this->set(compact('project', 'properties', 'subcontractors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->checkRole();
        $project = $this->Projects->get($id, [
            'contain' => ['Properties', 'Subcontractors'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $properties = $this->Projects->Properties->find('list', ['keyField' => 'id', 'valueField' => function ($row) {return $row->street.",  ".$row->city;},
            'limit' => 200]);
        $subcontractors = $this->Projects->Subcontractors->find('list', ['keyField' => 'id', 'valueField' =>function ($row) {return $row->business.",  ".$row->speciality;},
            'limit' => 200]);


        $this->set(compact('project', 'properties', 'subcontractors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($this->request->getSession()->read('Auth.User.role') != 'Staff') {
            $this->Flash->error(__('No Access.'));
            return $this->redirect(['action' => 'dashboard', 'controller' => 'Users']);
        } else {
            $this->checkRole();
            $this->request->allowMethod(['post', 'delete']);
            $project = $this->Projects->get($id);


            try {
                if ($this->Projects->delete($project)) {
                    $this->Flash->success(__('The project has been deleted.'));
                } else {
                    $this->Flash->error(__('It cannot be deleted as the project still in process.'));
                }
            }catch (\Exception $e) {
                $this->Flash->error(__('It cannot be deleted as the project still in process.'));
            }

            return $this->redirect(['action' => 'index']);
    }


    }
}
