<form method="post">
	<div class="row">
		<div class="col2">
			<?php echo template::button('themeTitleHBack', [
				'class' => 'buttonGrey',
				'href' => helper::baseUrl() . 'theme',
				'ico' => 'left',
				'value' => 'Retour'
			]); ?>
		</div>
		<div class="col2 offset8">
			<?php echo template::submit('themeTitleHSubmit'); ?>
		</div>
    </div>
	<div class="row">
		<div class="col12">
            <div class="block">
                <h4><?php echo helper::translate('Image titre'); ?></h4>
        		<?php echo template::file('themeTitleHImage', [
					'label' => 'Remplacer le titre par une image',
		        	'lang' => $this->getData(['config', 'language']),
		        	'type' => 1,
        			'value' => $this->getData(['theme', 'titleH', 'image'])
                ]); ?>
			</div>
		</div>
    </div>
    <div class="row">
        <div class="col12">
            <div id="themeTitleHImageOptions" class="displayNone" >
			    <div class="block">
				    <h4><?php echo helper::translate('Position de l\'image'); ?></h4>
    				<div class="row">
                        <div class="col6">
                            <?php echo template::select('themeTitleHImagePosition', $module::$imagePositionsInside, [
								'label' => 'Position',
								'selected' => $this->getData(['theme', 'titleH', 'imagePosition'])
							]); ?>
                        </div>
                        <div class="col3">
                            <?php echo template::text('themeTitleHImageWidth', ['label' => 'Largeur',
                                'value' => $this->getData(['theme', 'titleH', 'imageWidth'])
                            ]); ?>
                        </div>
                        <div class="col3">
                            <?php echo template::text('themeTitleHImageHeight', ['label' => 'Hauteur',
                                'value' => $this->getData(['theme', 'titleH', 'imageHeight'])
                            ]); ?>
                        </div>
                    </div>
		    	</div>
			    <div class="block">
				    <h4><?php echo helper::translate('Effet sur l\'image'); ?></h4>
                    <div class="row">
                        <div class="col6">
                            <?php echo template::select('themeTitleHImageShadow', $module::$shadows, [
								'label' => 'Ombre',
								'selected' => $this->getData(['theme', 'titleH', 'imageShadow'])
							]); ?>
                        </div>
                        <div class="col6">
                            <?php echo template::select('themeTitleHImageRadius', $module::$radius, [
								'label' => 'Arrondi des coins',
								'selected' => $this->getData(['theme', 'titleH', 'imageRadius'])
							]); ?>
                        </div>
	    			</div>
		    	</div>
            </div>
            <div id="themeTitleHTextOptions">
			    <div class="block">
				    <h4><?php echo helper::translate('Personnalisation du texte'); ?></h4>
    				<div class="row">
	    				<div class="col6">
    				        <?php echo template::select('themeTitleHFontFamily', $module::$fonts, [
        	    				'label' => 'Police de caratères',
		            			'selected' => $this->getData(['theme', 'titleH', 'fontFamily'])
			            	]); ?>
    					</div>
	    				<div class="col6">
		    				<?php echo template::text('themeTitleHFontColor', [
			    				'class' => 'colorPicker',
				    			'label' => 'Couleur',
					    		'value' => $this->getData(['theme', 'titleH', 'fontColor'])
						    ]); ?>
    					</div>
	    			</div>
    				<div class="row">
	    				<div class="col6">
		    				<?php echo template::select('themeTitleHFontTransform', $module::$textTransforms, [
			    				'label' => 'Caractères',
				    			'selected' => $this->getData(['theme', 'titleH', 'fontTransform'])
					    	]); ?>
    					</div>
	    				<div class="col6">
		    				<?php echo template::select('themeTitleHFontStyle', $module::$fontWeights, [
			    				'label' => 'Style',
				    			'selected' => $this->getData(['theme', 'titleH', 'fontStyle'])
					    	]); ?>
    					</div>
	    			</div>
		    	</div>
    		</div>
        </div>
	</div>
</form>
