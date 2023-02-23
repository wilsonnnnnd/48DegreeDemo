<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Report;

/**
 * Reports Controller
 *
 * @property \App\Model\Table\ReportsTable $Reports
 * @method \App\Model\Entity\Report[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($id = null)
    {
//        $this->Reports->get($id, ['contain' => ['Properties', 'Inspectors']]);
        $this->paginate = [
            'contain' => ['Jobs'=>['Properties', 'Inspectors']],
        ];
        $reports = $this->paginate($this->Reports);
        //var_dump($reports);
        $this->set(compact('reports'));
    }

    /**
     * View method
     *
     * @param string|null $id Report id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $report = $this->Reports->get($id, [
            'contain' => ['Jobs'=>['Properties', 'Inspectors']],
        ]);

        $this->set(compact('report'));
    }

    /**
     * Check the user role
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function checkRole(){
        if ($this->request->getSession()->read('Auth.User.role') == 'Staff' || $this->request->getSession()->read('Auth.User.role') == 'Inspector') {

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
        $this->checkRole();
        $report = $this->Reports->newEmptyEntity();
        if ($this->request->is('post')) {
            $report = $this->Reports->patchEntity($report, $this->request->getData());
            $report->job_id=$this->request->getData()['job_Name'];
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The report has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The report could not be saved. Please, try again.'));
        }
        $jobs = $this->Reports->Jobs->find('list', ['keyField' => 'id', 'valueField' => function ($row) {return "Address: ".$row->property->street." Inspector: ".$row->inspector->first_name." ".$row->inspector->last_name;},
            'limit' => 200])->contain(['Properties', 'Inspectors']);
        //$jobs = $this->Reports->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('report', 'jobs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Report id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->checkRole();
        $report = $this->Reports->get($id, [
            'contain' => ['Jobs'=>['Properties', 'Inspectors']],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $report = $this->Reports->patchEntity($report, $this->request->getData());
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The report has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The report could not be saved. Please, try again.'));
        }
//        $jobs = $this->Reports->Jobs->find('list', ['limit' => 200]);
        $jobs = $this->Reports->Jobs->find('list', ['keyField' => 'id', 'valueField' => function ($row) {return "Address: ".$row->property->street." Inspector: ".$row->inspector->first_name." ".$row->inspector->last_name;},
            'limit' => 200])->contain(['Properties', 'Inspectors']);
        $this->set(compact('report', 'jobs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Report id.
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
            $report = $this->Reports->get($id);
            try {
                if ($this->Reports->delete($report)) {
                    $this->Flash->success(__('The report has been deleted.'));
                } else {
                    $this->Flash->error(__('It cannot be deleted as the report still in process.'));
                }
            }catch (\Exception $e) {
                $this->Flash->error(__('It cannot be deleted as the report still in process.'));
            }


            return $this->redirect(['action' => 'index']);
        }
    }
}
