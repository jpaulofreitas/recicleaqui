
<h2>Sistema de Login<h2>

<div>
<p>ola <?php echo $nome; ?>!</p>

<p>clique no link para recuperar a senha <br/>

<?php

$root = pathinfo($_SERVER['HTTP_REFERER']);
$link = $root['dirname'] . DS . 'change-password?h=' . $hash . '&email=' . $email;
echo $this->Html->link('Redefinir senha de usuario', $link);

?>
</p>
</div>