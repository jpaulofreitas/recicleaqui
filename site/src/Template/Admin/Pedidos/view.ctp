<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Editar Pedido'), ['action' => 'edit', $pedido->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Deletar Pedido'), ['action' => 'delete', $pedido->id], ['confirm' => __('Você tem certeza que deseja deletar {0}?', $pedido->id)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Pedidos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Pedido'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Materiais'), ['controller' => 'Materiais', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Materiai'), ['controller' => 'Materiais', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Recicladoras'), ['controller' => 'Recicladoras', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Recicladora'), ['controller' => 'Recicladoras', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pedidos view large-9 medium-8 columns content">
    <h3><?= h($pedido->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Endereco') ?></th>
            <td><?= h($pedido->endereco) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cidade') ?></th>
            <td><?= h($pedido->cidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Celular') ?></th>
            <td><?= h($pedido->celular) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Observacao') ?></th>
            <td><?= h($pedido->observacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usuario') ?></th>
            <td><?= $pedido->has('usuario') ? $this->Html->link($pedido->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $pedido->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Materiai') ?></th>
            <td><?= $pedido->has('materiai') ? $this->Html->link($pedido->materiai->id, ['controller' => 'Materiais', 'action' => 'view', $pedido->materiai->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Recicladora') ?></th>
            <td><?= $pedido->has('recicladora') ? $this->Html->link($pedido->recicladora->id, ['controller' => 'Recicladoras', 'action' => 'view', $pedido->recicladora->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pedido->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Retirada') ?></th>
            <td><?= h($pedido->data_retirada) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($pedido->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($pedido->modified) ?></td>
        </tr>
    </table>
</div>
