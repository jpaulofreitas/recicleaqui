<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * Usuarios mailer.
 */
class UsuariosMailer extends Mailer
{

    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'Usuarios';

    public function welcome($usuario)
    {
    	$this->to($usuario->email)
    	->profile('recicle')
    	->emailFormat('html')
    	->template('welcome_template')
    	->layout('default')
    	->viewVars(['nome' => $usuario->nome])
    	->subject(sprintf('Bem-vindo, %s', $usuario->nome));
    }

    public function recovery($usuario)
    {
        $this->to($usuario[0]['email'])
        ->profile('recicle')
        ->emailFormat('html')
        ->template('recovery_template')
        ->layout('default')
        ->viewVars(['nome' => $usuario[0]['nome'] , 
            'email' => $usuario[0]['email'] , 
            'hash' => substr($usuario[0]['password'], 0, 25)])
        ->subject('Recuperação de senha');
    }
}
