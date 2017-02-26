<!-- TODO Démo -->
<p>L'identifiant de démonstration est "Admin" et le mot de passe est "password".</p>
<p>Pour les besoins de la démonstration, les données ne sont pas enregistrées et le gestionnaire de fichiers n'est pas disponible.</p>
<form method="post">
	<div class="row">
		<div class="col6">
			<?php echo template::text('userLoginId', [
				'label' => 'Identifiant',
				'required' => true
			]); ?>
		</div>
		<div class="col6">
			<?php echo template::password('userLoginPassword', [
				'label' => 'Mot de passe',
				'required' => true
			]); ?>
		</div>
	</div>
	<div class="row">
		<div class="col6">
			<?php echo template::checkbox('userLoginLongTime', true, 'Se souvenir de moi'); ?>

		</div>
		<div class="col6 textAlignRight">
			<a href="<?php echo helper::baseUrl(); ?>user/forgot"><?php echo helper::translate('Mot de passe perdu ?'); ?></a>
		</div>
	</div>
	<div class="row">
		<div class="col3 offset6">
			<?php echo template::button('userLoginBack', [
				'class' => 'grey',
				'href' => helper::baseUrl(),
				'value' => 'Annuler'
			]); ?>
		</div>
		<div class="col3">			<?php echo template::submit('userLoginSubmit', [
				'value' => 'Connexion'
			]); ?>
		</div>
	</div>
</form>