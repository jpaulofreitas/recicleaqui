<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario[]|\Cake\Collection\CollectionInterface $usuarios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Lista Usuários'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Usuario'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista Recicladoras'), ['controller' => 'Recicladoras', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Recicladora'), ['controller' => 'Recicladoras', 'action' => 'add']) ?></li>
    </ul>
</nav>

<div>
	<h1 text-color="green">Seja Bem Vindo!</h1>
</div>