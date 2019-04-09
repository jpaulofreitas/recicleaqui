<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\MailerAwareTrait;

/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 *
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsuariosController extends AppController
{

    use MailerAwareTrait;

    //function para permitir add na classe pai da pagina
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'rememberPassword', 'changePassword']);
    }



    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $usuarios = $this->paginate($this->Usuarios);

        $this->set(compact('usuarios'));
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => ['Pedidos', 'Recicladoras']
        ]);

        $this->set('usuario', $usuario);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuario = $this->Usuarios->newEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {

                $this->getMailer('Usuarios')->send('welcome',[$usuario]);


                $this->Flash->success(__('Usuário salvo com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Usuário não foi salvo. Tente novamente.'));
        }
        $this->set(compact('usuario'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
        }
        $this->set(compact('usuario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('The usuario has been deleted.'));
        } else {
            $this->Flash->error(__('The usuario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if ($this->request->is('post'))
        {
            $user = $this->Auth->identify();

            if($user)
            {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Senha/email inválidos, tente novamente!'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function rememberPassword()
    {
        $usuario = $this->Usuarios->newEntity();

        if (!empty($this->request->data)) 
        {
            if ($this->request->is('post')) 
            {
                $usuario = $this->Usuarios->patchEntity($usuario, $this->request->data);

                if($usuario = $this->Usuarios->findByEmail($this->request->data['email'])->toArray())
                {
                    $this->getMailer('Usuarios')->send('recovery',[$usuario]);
                    $msg = 'Email enviado para sua caixa de mensagens!';
                    $this->Flash->success($msg);
                    return $this->redirect(['action'=>'rememberPassword']);
                } 
                else
                {
                    $msg = 'Email não encontrado!';
                    $this->Flash->error($msg);
                    return $this->redirect(['action' =>'rememberPassword']);
                }
            }
        }
        $this->set(compact('usuario'));
    }

     public function changePassword()
     {
        $q_hash = $this->request->query('h');
        $q_email = $this->request->query('email');

        $usuario = $this->Usuarios->newEntity();

        if($this->request->is(['post', 'put']))
        {
            $usuario = $this->Usuarios->get($this->request->data['id']);
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->data);

            if($this->Usuarios->save($usuario))
            {
                $this->Flash->success(__('Senha alterada com sucesso!'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Senha nao alterada. Tente novamente'));
        }
        else
        {
            if($usuario = $this->Usuarios->findByEmail($q_email)->toArray())
            {
                $hash = substr($usuario[0]['password'], 0, 25);

                if($hash == $q_hash)
                {
                    $msg = 'Altere a senha do email: '.$q_email;
                    $this->Flash->set($msg);
                }
                else
                {
                    $msg = 'Você nao tem permissao para alterar essa senha!';
                    $this->Flash->set($msg);
                    $this->redirect(array('action' => 'rememberPassword'));
                }
            }
            else
            {
                $msg = 'Email não encontrado';
                $this->Flash->set($msg);
                $this->redirect(array('action' => 'rememberPassword'));
            }
        }
        $this->set('id', $usuario[0]['id']);
        $this->set(compact('usuario'));
    }
}
