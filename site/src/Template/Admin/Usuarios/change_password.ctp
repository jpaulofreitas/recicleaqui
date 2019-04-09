<nav class ="large-3 medium-4 columns" id="actions-sidebar">
	<ul class = "side-nav">
		<li class="heading"><?=__('Menu')?></li>
		<li><?= $this->Html->link(__('Lista Usuarios'), ['action' => 'index']) ?></li>
	</ul>
</nav>
<div class="users form large-9 medium-8 columns content">
	<?= $this->Form->create($usuario) ?>
	<fieldset>
		<legend><?= __('Alterar Senha')?></legend>
		<?php
			echo $this->Form->input('id', ['type' => 'hidden', 'value' => $id]);
			echo $this->Form->input('password');
			echo $this->Form->input('confirme_senha', ['type' => 'password']);
		?>
	</fieldset>
	<?= $this->Form->button(__('Salvar')) ?>
	<?= $this->Form->end() ?>
</div>