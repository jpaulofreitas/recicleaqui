<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido[]|\Cake\Collection\CollectionInterface $pedidos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Novo Pedido'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista Materiais'), ['controller' => 'Materiais', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Materiai'), ['controller' => 'Materiais', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista Recicladoras'), ['controller' => 'Recicladoras', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Recicladora'), ['controller' => 'Recicladoras', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pedidos index large-9 medium-8 columns content">
    <h3><?= __('Pedidos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('endereço') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('celular') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_retirada') ?></th>
                <th scope="col"><?= $this->Paginator->sort('observação') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_pedido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('alterado_em') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('material_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('recicladora_id') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $pedido): ?>
            <tr>
                <td><?= $this->Number->format($pedido->id) ?></td>
                <td><?= h($pedido->endereco) ?></td>
                <td><?= h($pedido->cidade) ?></td>
                <td><?= h($pedido->celular) ?></td>
                <td><?= h($pedido->data_retirada) ?></td>
                <td><?= h($pedido->observacao) ?></td>
                <td><?= h($pedido->created) ?></td>
                <td><?= h($pedido->modified) ?></td>
                <td><?= $pedido->has('usuario') ? $this->Html->link($pedido->usuario->nome, ['controller' => 'Usuarios', 'action' => 'view', $pedido->usuario->id]) : '' ?></td>
                <td><?= $pedido->has('materiai') ? $this->Html->link($pedido->materiai->nome, ['controller' => 'Materiais', 'action' => 'view', $pedido->materiai->id]) : '' ?></td>
                <td><?= $pedido->has('recicladora') ? $this->Html->link($pedido->recicladora->nome, ['controller' => 'Recicladoras', 'action' => 'view', $pedido->recicladora->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $pedido->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $pedido->id]) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $pedido->id], ['confirm' => __('Você tem certeza que deseja deletar {0}?', $pedido->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeiro')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próximo') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, vendo {{current}} registro(s) de {{count}} registros totais')]) ?></p>
    </div>
</div>
