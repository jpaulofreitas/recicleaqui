<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recicladora $recicladora
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Lista Recicladoras'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Lista Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista Materiais'), ['controller' => 'Materiais', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Material'), ['controller' => 'Materiais', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recicladoras form large-9 medium-8 columns content">
    <?= $this->Form->create($recicladora) ?>
    <fieldset>
        <legend><?= __('Add Recicladora') ?></legend>
        <?php
            echo $this->Form->control('razao_social');
            echo $this->Form->control('cnpj');
            echo $this->Form->control('telefone');
            echo $this->Form->control('celular');
            echo $this->Form->control('endereco');
            echo $this->Form->control('cidade');
            echo $this->Form->control('usuario_id', ['options' => $usuarios]);
            echo $this->Form->control('material_id', ['options' => $materiais]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
