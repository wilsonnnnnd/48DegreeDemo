<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Enquiries Controller
 *
 * @property \App\Model\Table\EnquiriesTable $Enquiries
 * @method \App\Model\Entity\Enquiry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EnquiriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $enquiries = $this->paginate($this->Enquiries);

        $this->set(compact('enquiries'));
    }

    /**
     * View method
     *
     * @param string|null $id Enquiry id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $enquiry = $this->Enquiries->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('enquiry'));
    }

     /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $enquiry = $this->Enquiries->newEmptyEntity();
        if ($this->request->is('post')) {
            $enquiry = $this->Enquiries->patchEntity($enquiry, $this->request->getData());
            if ($this->Enquiries->save($enquiry)) {
                $this->Flash->success(__('The enquiry has been saved.'));

                return $this->redirect(['controller' => 'pages','action' => 'display', 'home']);
            }
            $this->Flash->error(__('The enquiry could not be saved. Please, try again.'));
            
        }
        $this->set(compact('enquiry'));
    }

     /**
     * Mark as sent method
     *
     * @param string|null $id Enquiry id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function mark($id = null)
    {
        $enquiry = $this->Enquiries->get($id);
        if($enquiry->email_sent){
            $this->Flash->error(__('The enquiry is already marked as sent.'));
        }else{
            $enquiry->email_sent = true;
            if ($this->Enquiries->save($enquiry)) {
                $this->Flash->success(__('The enquiry has been marked as sent.'));
            } else {
                $this->Flash->error(__('The enquiry could not be marked as sent. Please, try again.'));
            }
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Enquiry id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $enquiry = $this->Enquiries->get($id);
        if ($this->Enquiries->delete($enquiry)) {
            $this->Flash->success(__('The enquiry has been deleted.'));
        } else {
            $this->Flash->error(__('The enquiry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
       {
          parent::beforeFilter($event);
            $this->Auth->allow(['add']);
    
           //Allow all views (including layouts) to get user information
          // $this->set('AuthUser', $this->Auth->user());
       }
   
    
}
