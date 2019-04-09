
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class = "side-nav">
		<li class = "heading"><?=__('Menu') ?></li>
		<li> <?= $this->Html->link(__('Novo Usuario'), ['controller' => 'Usuarios', 'action'=>'add']) ?></li>
	</ul>
</nav>

<div class="users form large-9 medium-8 columns content">
	<?= $this->Form->create($usuario)?>
	<fieldset>
		<legend><?=__('Lembrar Password')?></legend>
		<?php
			echo $this->Form->input('email');
		?>
	</fieldset>
	<?= $this->Form->button(__('Salvar'))?>
	<?= $this->Form->end()?>
</div>