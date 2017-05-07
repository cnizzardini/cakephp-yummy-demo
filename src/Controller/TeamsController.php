<?php
namespace YummyDemo\Controller;

use YummyDemo\Controller\AppController;
use Cake\Utility\Security;

/**
 * Teams Controller
 *
 * @property \YummyDemo\Model\Table\TeamsTable $Teams
 */
class TeamsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->loadComponent('Yummy.YummySearch',[
            'model' => 'Teams',
            'allow' => [
                'Conferences' => ['name'],
                'Divisions' => ['name'],
            ],
            'deny' => [
                'Teams' => ['id','division_id']
            ]
        ]);
        
        $this->paginate = [
            'contain' => [
                'Divisions' => [
                    'Conferences'
                ]
            ]
        ];
        
        $this->YummySearch->search();
        
        $teams = $this->paginate($this->Teams);

        $this->set(compact('teams'));
        $this->set('_serialize', ['teams']);
    }

    /**
     * View method
     *
     * @param string|null $id Team id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $team = $this->Teams->get($id, [
            'contain' => ['Divisions']
        ]);

        $this->set('team', $team);
        $this->set('_serialize', ['team']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $team = $this->Teams->newEntity();
        if ($this->request->is('post')) {
            $this->Flash->success(__('The team has been saved.'));
            return $this->redirect(['action' => 'index']);
        }
        
        $divisionResults = $this->Teams->Divisions->find()->contain(['Conferences']);
        $divisions = [];
        
        foreach($divisionResults as $result){
            $divisions[ $result->id ] = $result->conference['name'] . ' ' . $result->name;
        }
        
        $this->set(compact('team', 'divisions'));
        $this->set('_serialize', ['team']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Team id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Flash->success(__('The team has been saved.'));
        return $this->redirect(['action' => 'index']);
        
        $team = $this->Teams->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->Flash->success(__('The team has been saved.'));
        }
        $divisions = $this->Teams->Divisions->find('list', ['limit' => 200]);
        $this->set(compact('team', 'divisions'));
        $this->set('_serialize', ['team']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Team id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        return $this->redirect(['action' => 'index']);
        
        $this->request->allowMethod(['post', 'delete']);
        $team = $this->Teams->get($id);
        if ($this->Teams->delete($team)) {
            $this->Flash->success(__('The team has been deleted.'));
        } else {
            $this->Flash->error(__('The team could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
