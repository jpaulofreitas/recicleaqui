<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Editar Usuario'), ['action' => 'edit', $usuario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Deletar Usuario'), ['action' => 'delete', $usuario->id], ['confirm' => __('Você tem certeza que deseja deletar {0}?', $usuario->id)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Usuarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Usuario'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Recicladoras'), ['controller' => 'Recicladoras', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Recicladora'), ['controller' => 'Recicladoras', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usuarios view large-9 medium-8 columns content">
    <h3><?= h($usuario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($usuario->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($usuario->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($usuario->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Função') ?></th>
            <td><?= h($usuario->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($usuario->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado em') ?></th>
            <td><?= h($usuario->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado em') ?></th>
            <td><?= h($usuario->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Relação de Pedidos') ?></h4>
        <?php if (!empty($usuario->pedidos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Endereco') ?></th>
                <th scope="col"><?= __('Cidade') ?></th>
                <th scope="col"><?= __('Celular') ?></th>
                <th scope="col"><?= __('Data Retirada') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Criado em') ?></th>
                <th scope="col"><?= __('Modificado em') ?></th>
                <th scope="col"><?= __('Usuario ') ?></th>
                <th scope="col"><?= __('Material') ?></th>
                <th scope="col"><?= __('Recicladora') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
            <?php foreach ($usuario->pedidos as $pedidos): ?>
            <tr>
                <td><?= h($pedidos->id) ?></td>
                <td><?= h($pedidos->endereco) ?></td>
                <td><?= h($pedidos->cidade) ?></td>
                <td><?= h($pedidos->celular) ?></td>
                <td><?= h($pedidos->data_retirada) ?></td>
                <td><?= h($pedidos->observacao) ?></td>
                <td><?= h($pedidos->created) ?></td>
                <td><?= h($pedidos->modified) ?></td>
                <td><?= h($pedidos->usuario_id) ?></td>
                <td><?= h($pedidos->materiai_id) ?></td>
                <td><?= h($pedidos->recicladora_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Pedidos', 'action' => 'view', $pedidos->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Pedidos', 'action' => 'edit', $pedidos->id]) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['controller' => 'Pedidos', 'action' => 'delete', $pedidos->id], ['confirm' => __('Você tem certeza que deseja deletar {0}?', $pedidos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Relação de Recicladoras') ?></h4>
        <?php if (!empty($usuario->recicladoras)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Razao Social') ?></th>
                <th scope="col"><?= __('Cnpj') ?></th>
                <th scope="col"><?= __('Telefone') ?></th>
                <th scope="col"><?= __('Celular') ?></th>
                <th scope="col"><?= __('Endereco') ?></th>
                <th scope="col"><?= __('Cidade') ?></th>
                <th scope="col"><?= __('Criado em') ?></th>
                <th scope="col"><?= __('Modificado em') ?></th>
                <th scope="col"><?= __('Usuario') ?></th>
                <th scope="col"><?= __('Material') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
            <?php foreach ($usuario->recicladoras as $recicladoras): ?>
            <tr>
                <td><?= h($recicladoras->id) ?></td>
                <td><?= h($recicladoras->razao_social) ?></td>
                <td><?= h($recicladoras->cnpj) ?></td>
                <td><?= h($recicladoras->telefone) ?></td>
                <td><?= h($recicladoras->celular) ?></td>
                <td><?= h($recicladoras->endereco) ?></td>
                <td><?= h($recicladoras->cidade) ?></td>
                <td><?= h($recicladoras->created) ?></td>
                <td><?= h($recicladoras->modified) ?></td>
                <td><?= h($recicladoras->usuario_id) ?></td>
                <td><?= h($recicladoras->materiai_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Recicladoras', 'action' => 'view', $recicladoras->nome]) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Recicladoras', 'action' => 'edit', $recicladoras->nome]) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['controller' => 'Recicladoras', 'action' => 'delete', $recicladoras->nome], ['confirm' => __('Você tem certeza que deseja deletar {0}?', $recicladoras->nome)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
