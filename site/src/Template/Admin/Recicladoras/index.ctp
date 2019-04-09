<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recicladora[]|\Cake\Collection\CollectionInterface $recicladoras
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Novo Recicladora'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista Materiais'), ['controller' => 'Materiais', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Materiai'), ['controller' => 'Materiais', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recicladoras index large-9 medium-8 columns content">
    <h3><?= __('Recicladoras') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('razao_social') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cnpj') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('celular') ?></th>
                <th scope="col"><?= $this->Paginator->sort('endereco') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('materiai_id') ?></th>
                <th scope="col" class="actions"><?= __('Menu') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recicladoras as $recicladora): ?>
            <tr>
                <td><?= $this->Number->format($recicladora->id) ?></td>
                <td><?= h($recicladora->razao_social) ?></td>
                <td><?= h($recicladora->cnpj) ?></td>
                <td><?= h($recicladora->telefone) ?></td>
                <td><?= h($recicladora->celular) ?></td>
                <td><?= h($recicladora->endereco) ?></td>
                <td><?= h($recicladora->cidade) ?></td>
                <td><?= h($recicladora->created) ?></td>
                <td><?= h($recicladora->modified) ?></td>
                <td><?= $recicladora->has('usuario') ? $this->Html->link($recicladora->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $recicladora->usuario->id]) : '' ?></td>
                <td><?= $recicladora->has('materiai') ? $this->Html->link($recicladora->materiai->id, ['controller' => 'Materiais', 'action' => 'view', $recicladora->materiai->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $recicladora->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $recicladora->id]) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $recicladora->id], ['confirm' => __('Você tem certeza que deseja deletar {0}?', $recicladora->id)]) ?>
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
