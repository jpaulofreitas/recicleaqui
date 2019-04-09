<?php
namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Event\Event;


/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 *
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsuariosController extends AppController
{


     public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

       // if($this->request->query('token') !== '123456'){
        //    echo 'Token Invalido';exit; 
        //}

        $this->Auth->allow();
        
    }




    public function index(){

        $usuarios = $this->Usuarios->find();

        $this->set([
            'usuarios'=>$usuarios,
            '_serialize'=>['usuarios']
        ]);
    }

    public function add(){


        $this->log($this->request->data);

       $success = false;
       $message = '';

       $usuario = $this->Usuarios->newEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $success = true;
            }
            $message = 'The usuario could not be saved. Please, try again.';
        }




        $this->set([
            'success'=>$success,
            'message'=>$message,
            '_serialize'=>['success','message']
        ]);



    }

    public function edit(){

    $success = false;
       $message = '';

        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());

            if ($this->Recicladoras->save($recicladora)) {
                $success= true;
            }
            else{
                $message = 'Erro na alteração!';
            }            
        }
    }

    public function delete(){

       $success = false;
       $message = '';


       $this->request->allowMethod(['post', 'delete']);

       $id = $this->request->data['id'];

        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
           $success = true;
        }else{
            $message = 'Não foi possivel apagar o usuário.';
        } 


        $this->set([
            'success'=>$success,
            'message'=>$message,
            '_serialize'=>['success','message']
        ]);
    }

   
}
