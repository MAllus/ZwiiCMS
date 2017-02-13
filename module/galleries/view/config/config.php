<form method="post">
	<div class="block">
		<h4><?php echo helper::translate('Nouvelle galerie'); ?></h4>
		<div class="row">
			<div class="col6">
				<?php echo template::text('galleriesConfigName', [
					'label' => 'Nom',
					'required' => true
				]); ?>
			</div>
			<div class="col4">
				<?php echo template::hidden('galleriesConfigDirectoryOld'); ?>
				<?php echo template::select('galleriesConfigDirectory', [], [
					'label' => 'Dossier cible',
					'required' => true
				]); ?>
			</div>
			<div class="col2 verticalAlignBottom">
				<?php echo template::submit('galleriesConfigSubmit', array(
					'value' => 'Créer'
				)); ?>
			</div>
		</div>
	</div>
	<?php if($this->getData(['module', $this->getUrl(0)])): ?>
		<?php echo template::table([4, 6, 1, 1], $module::$galleries, ['Nom', 'Dossier cible', '', '']); ?>
	<?php endif; ?>
	<div class="row">
		<div class="col2 offset10">
			<?php echo template::button('galleriesConfigBack', [
				'class' => 'grey',
				'href' => helper::baseUrl() . 'page/edit/' . $this->getUrl(0),
				'value' => 'Retour'
			]); ?>
		</div>
	</div>
</form>