<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Materiai $materiai
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'delete', $materiai->id],
                ['confirm' => __('Você tem certeza que deseja deletar {0}?', $materiai->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Lista Materiais'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Lista Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista Recicladoras'), ['controller' => 'Recicladoras', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nova Recicladora'), ['controller' => 'Recicladoras', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="materiais form large-9 medium-8 columns content">
    <?= $this->Form->create($materiai) ?>
    <fieldset>
        <legend><?= __('Editar Material') ?></legend>
        <?php
            echo $this->Form->control('nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
