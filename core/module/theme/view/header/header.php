<form method="post">
	<div class="row">
		<div class="col2">
			<?php echo template::button('themeHeaderBack', [
				'class' => 'buttonGrey',
				'href' => helper::baseUrl() . 'theme',
				'ico' => 'left',
				'value' => 'Retour'
			]); ?>
		</div>
		<div class="col2 offset8">
			<?php echo template::submit('themeHeaderSubmit'); ?>
		</div>
    </div>
	<div class="row">
		<div class="col12">
			<div class="block">
				<h4><?php echo helper::translate('Configuration'); ?></h4>
				<div class="row">
					<div class="col4">
						<?php echo template::select('themeHeaderPosition', $module::$headerPositions, [
							'label' => 'Position',
							'selected' => $this->getData(['theme', 'header', 'position'])
						]); ?>
					</div>
					<div class="col4">
						<?php echo template::select('themeHeaderHeight', $module::$headerHeights, [
							'label' => 'Hauteur',
							'selected' => $this->getData(['theme', 'header', 'height'])
						]); ?>
					</div>
					<div class="col4">
						<?php echo template::select('themeHeaderTextAlign', $module::$aligns, [
							'label' => 'Alignement du contenu',
							'selected' => $this->getData(['theme', 'header', 'textAlign'])
						]); ?>
					</div>
                </div>
	    		<div id="themeHeaderPositionOptions" class="displayNone">
    	    		<?php echo template::checkbox('themeHeaderMargin', true, 'Aligner la bannière avec le contenu', [
	    	    		'checked' => $this->getData(['theme', 'header', 'margin'])
		    	    ]); ?>
                </div>
			</div>
		</div>
    </div>
    <div class="row">
		<div class="col6">
			<div class="block">
				<h4><?php echo helper::translate('Image de Fond'); ?></h4>
				<?php echo template::file('themeHeaderImage', [
					'label' => 'Fond',
					'lang' => $this->getData(['config', 'language']),
					'type' => 1,
					'value' => $this->getData(['theme', 'header', 'image'])
				]); ?>
				<div id="themeHeaderImageOptions" class="displayNone">
					<div class="row">
						<div class="col6">
							<?php echo template::select('themeHeaderImageRepeat', $module::$repeats, [
								'label' => 'Répétition',
								'selected' => $this->getData(['theme', 'header', 'imageRepeat'])
							]); ?>
						</div>
						<div class="col6">
							<?php echo template::select('themeHeaderImagePosition', $module::$imagePositions, [
								'label' => 'Position',
								'selected' => $this->getData(['theme', 'header', 'imagePosition'])
							]); ?>
						</div>
					</div>
					<?php echo template::checkbox('themeHeaderTextHide', true, 'Cacher le titre du site', [
						'checked' => $this->getData(['theme', 'header', 'textHide'])
					]); ?>
				</div>
            </div>
        </div>
        <div class="col6">
            <div class="block">
                <h4><?php echo helper::translate('Couleur de fond'); ?></h4>
                <?php echo template::text('themeHeaderBackgroundColor', [
                    'class' => 'colorPicker',
                    'label' => 'Texte',
                    'value' => $this->getData(['theme', 'header', 'backgroundColor'])
                ]); ?>  
            </div>
        </div>
	</div>
</form>
