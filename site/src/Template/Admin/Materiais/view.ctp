<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Materiai $materiai
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Editar Materiai'), ['action' => 'edit', $materiai->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Deletar Materiai'), ['action' => 'delete', $materiai->id], ['confirm' => __('Você tem certeza que deseja deletar {0}?', $materiai->id)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Materiais'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Materiai'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Recicladoras'), ['controller' => 'Recicladoras', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Recicladora'), ['controller' => 'Recicladoras', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="materiais view large-9 medium-8 columns content">
    <h3><?= h($materiai->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($materiai->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($materiai->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($materiai->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($materiai->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Relação de Pedidos') ?></h4>
        <?php if (!empty($materiai->pedidos)): ?>
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
            <?php foreach ($materiai->pedidos as $pedidos): ?>
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
        <?php if (!empty($materiai->recicladoras)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Razao Social') ?></th>
                <th scope="col"><?= __('Cnpj') ?></th>
                <th scope="col"><?= __('Telefone') ?></th>
                <th scope="col"><?= __('Celular') ?></th>
                <th scope="col"><?= __('Endereco') ?></th>
                <th scope="col"><?= __('Cidade') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Usuario Id') ?></th>
                <th scope="col"><?= __('Materiai Id') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
            <?php foreach ($materiai->recicladoras as $recicladoras): ?>
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
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Recicladoras', 'action' => 'view', $recicladoras->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Recicladoras', 'action' => 'edit', $recicladoras->id]) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['controller' => 'Recicladoras', 'action' => 'delete', $recicladoras->id], ['confirm' => __('Você tem certeza que deseja deletar {0}?', $recicladoras->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
