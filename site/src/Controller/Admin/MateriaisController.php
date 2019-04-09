<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Materiais Controller
 *
 * @property \App\Model\Table\MateriaisTable $Materiais
 *
 * @method \App\Model\Entity\Materiai[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MateriaisController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $materiais = $this->paginate($this->Materiais);

        $this->set(compact('materiais'));
    }

    /**
     * View method
     *
     * @param string|null $id Materiai id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $materiai = $this->Materiais->get($id, [
            'contain' => ['Pedidos', 'Recicladoras']
        ]);

        $this->set('materiai', $materiai);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $materiai = $this->Materiais->newEntity();
        if ($this->request->is('post')) {
            $materiai = $this->Materiais->patchEntity($materiai, $this->request->getData());
            if ($this->Materiais->save($materiai)) {
                $this->Flash->success(__('The materiai has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The materiai could not be saved. Please, try again.'));
        }
        $this->set(compact('materiai'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Materiai id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $materiai = $this->Materiais->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $materiai = $this->Materiais->patchEntity($materiai, $this->request->getData());
            if ($this->Materiais->save($materiai)) {
                $this->Flash->success(__('The materiai has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The materiai could not be saved. Please, try again.'));
        }
        $this->set(compact('materiai'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Materiai id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $materiai = $this->Materiais->get($id);
        if ($this->Materiais->delete($materiai)) {
            $this->Flash->success(__('The materiai has been deleted.'));
        } else {
            $this->Flash->error(__('The materiai could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
