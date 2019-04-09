<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'delete', $pedido->id],
                ['confirm' => __('Você tem certeza que deseja deletar {0}?', $pedido->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Lista Pedidos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Lista Usuários'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Usuário'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista Materiais'), ['controller' => 'Materiais', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Material'), ['controller' => 'Materiais', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista Recicladoras'), ['controller' => 'Recicladoras', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nova Recicladora'), ['controller' => 'Recicladoras', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pedidos form large-9 medium-8 columns content">
    <?= $this->Form->create($pedido) ?>
    <fieldset>
        <legend><?= __('Editar Pedido') ?></legend>
        <?php
            echo $this->Form->control('endereco');
            echo $this->Form->control('cidade');
            echo $this->Form->control('celular');
            echo $this->Form->control('data_retirada');
            echo $this->Form->control('observacao');
            echo $this->Form->control('usuario_id', ['options' => $usuarios]);
            echo $this->Form->control('materiai_id', ['options' => $materiais]);
            echo $this->Form->control('recicladora_id', ['options' => $recicladoras]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>