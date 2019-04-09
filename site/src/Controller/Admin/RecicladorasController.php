<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Recicladoras Controller
 *
 * @property \App\Model\Table\RecicladorasTable $Recicladoras
 *
 * @method \App\Model\Entity\Recicladora[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RecicladorasController extends AppController
{


    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);


        if($this->Auth->user('role') == 'recicladoras'){

        }
   
    }
}

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Usuarios', 'Materiais']
        ];
        $recicladoras = $this->paginate($this->Recicladoras);

        $this->set(compact('recicladoras'));
    }

    /**
     * View method
     *
     * @param string|null $id Recicladora id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recicladora = $this->Recicladoras->get($id, [
            'contain' => ['Usuarios', 'Materiais', 'Pedidos']
        ]);

        $this->set('recicladora', $recicladora);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recicladora = $this->Recicladoras->newEntity();
        if ($this->request->is('post')) {
            $recicladora = $this->Recicladoras->patchEntity($recicladora, $this->request->getData());
            if ($this->Recicladoras->save($recicladora)) {
                $this->Flash->success(__('The recicladora has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recicladora could not be saved. Please, try again.'));
        }
        $usuarios = $this->Recicladoras->Usuarios->find('list', ['limit' => 200]);
        $materiais = $this->Recicladoras->Materiais->find('list', ['limit' => 200]);
        $this->set(compact('recicladora', 'usuarios', 'materiais'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Recicladora id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recicladora = $this->Recicladoras->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recicladora = $this->Recicladoras->patchEntity($recicladora, $this->request->getData());
            if ($this->Recicladoras->save($recicladora)) {
                $this->Flash->success(__('The recicladora has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recicladora could not be saved. Please, try again.'));
        }
        $usuarios = $this->Recicladoras->Usuarios->find('list', ['limit' => 200]);
        $materiais = $this->Recicladoras->Materiais->find('list', ['limit' => 200]);
        $this->set(compact('recicladora', 'usuarios', 'materiais'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Recicladora id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recicladora = $this->Recicladoras->get($id);
        if ($this->Recicladoras->delete($recicladora)) {
            $this->Flash->success(__('The recicladora has been deleted.'));
        } else {
            $this->Flash->error(__('The recicladora could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
