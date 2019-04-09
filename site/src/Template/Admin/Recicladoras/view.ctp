<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recicladora $recicladora
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Editar Recicladora'), ['action' => 'edit', $recicladora->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Deletar Recicladora'), ['action' => 'delete', $recicladora->id], ['confirm' => __('Você tem certeza que deseja deletar {0}?', $recicladora->id)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Recicladoras'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Recicladora'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Materiais'), ['controller' => 'Materiais', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Materiai'), ['controller' => 'Materiais', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="recicladoras view large-9 medium-8 columns content">
    <h3><?= h($recicladora->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Razao Social') ?></th>
            <td><?= h($recicladora->razao_social) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cnpj') ?></th>
            <td><?= h($recicladora->cnpj) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefone') ?></th>
            <td><?= h($recicladora->telefone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Celular') ?></th>
            <td><?= h($recicladora->celular) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Endereco') ?></th>
            <td><?= h($recicladora->endereco) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cidade') ?></th>
            <td><?= h($recicladora->cidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usuario') ?></th>
            <td><?= $recicladora->has('usuario') ? $this->Html->link($recicladora->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $recicladora->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Materiai') ?></th>
            <td><?= $recicladora->has('materiai') ? $this->Html->link($recicladora->materiai->id, ['controller' => 'Materiais', 'action' => 'view', $recicladora->materiai->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($recicladora->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($recicladora->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($recicladora->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Relação de Pedidos') ?></h4>
        <?php if (!empty($recicladora->pedidos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Endereco') ?></th>
                <th scope="col"><?= __('Cidade') ?></th>
                <th scope="col"><?= __('Celular') ?></th>
                <th scope="col"><?= __('Data Retirada') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Usuario Id') ?></th>
                <th scope="col"><?= __('Materiai Id') ?></th>
                <th scope="col"><?= __('Recicladora Id') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
            <?php foreach ($recicladora->pedidos as $pedidos): ?>
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
</div>
