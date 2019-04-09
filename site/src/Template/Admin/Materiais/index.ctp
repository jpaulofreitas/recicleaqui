<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Materiai[]|\Cake\Collection\CollectionInterface $materiais
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Novo Materiai'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista Recicladoras'), ['controller' => 'Recicladoras', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Recicladora'), ['controller' => 'Recicladoras', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="materiais index large-9 medium-8 columns content">
    <h3><?= __('Materiais') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Menu') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($materiais as $materiai): ?>
            <tr>
                <td><?= $this->Number->format($materiai->id) ?></td>
                <td><?= h($materiai->nome) ?></td>
                <td><?= h($materiai->created) ?></td>
                <td><?= h($materiai->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $materiai->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $materiai->id]) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $materiai->id], ['confirm' => __('Você tem certeza que deseja deletar {0}?', $materiai->id)]) ?>
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
