<?php $layout = new layout(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $layout->showMetaTitle(); ?>
	<?php $layout->showMetaDescription(); ?>
	<?php $layout->showFavicon(); ?>
	<?php $layout->showVendor(); ?>
	<link rel="stylesheet" href="<?php echo helper::baseUrl(false); ?>core/main.css">
	<link rel="stylesheet" href="<?php echo helper::baseUrl(false); ?>site/data/theme.css?<?php echo md5(json_encode($this->getData(['theme']))); ?>">
</head>
<body>
<?php $layout->showStyle(); ?>
<?php $layout->showPanel(); ?>
<?php $layout->showNotification(); ?>
<!-- Menu dans le fond du site avant la bannière -->
<?php if($this->getData(['theme', 'menu', 'position']) === 'body-first'): ?>
	<nav>
		<div id="toggle"><?php echo template::ico('menu'); ?></div>
		<div id="menu" class="container">
			<?php $layout->showMenu(); ?>
		</div>
	</nav>
<?php endif; ?>
<!-- Bannière dans le fond du site -->
<?php if(
	$this->getData(['theme', 'header', 'position']) === 'body'
	// Affiche toujours la bannière pour l'édition du thème
	OR (
		$this->getData(['theme', 'header', 'position']) === 'hide'
		AND $this->getUrl(0) === 'theme'
	)
): ?>
	<header <?php if($this->getData(['theme', 'header', 'position']) === 'hide'): ?>class="displayNone"<?php endif; ?>>
		<div class="container">
			<h1><?php echo $this->getData(['config', 'title']); ?></h1>
		</div>
	</header>
<?php endif; ?>
<!-- Menu dans le fond du site après la bannière -->
<?php if(
	$this->getData(['theme', 'menu', 'position']) === 'body-second'
	// Affiche toujours le menu pour l'édition du thème
	OR (
		$this->getData(['theme', 'menu', 'position']) === 'hide'
		AND $this->getUrl(0) === 'theme'
	)
): ?>
	<nav <?php if($this->getData(['theme', 'menu', 'position']) === 'hide'): ?>class="displayNone"<?php endif; ?>>
		<div id="toggle"><?php echo template::ico('menu'); ?></div>
		<div id="menu" class="container">
			<?php $layout->showMenu(); ?>
		</div>
	</nav>
<?php endif; ?>
<!-- Site -->
<div id="site" class="container">
	<!-- Menu dans le site avant la bannière -->
	<?php if($this->getData(['theme', 'menu', 'position']) === 'site-first'): ?>
		<nav>
			<div id="toggle"><?php echo template::ico('menu'); ?></div>
			<div id="menu" class="container">
				<?php $layout->showMenu(); ?>
			</div>
		</nav>
	<?php endif; ?>
	<!-- Bannière dans le site -->
	<?php if($this->getData(['theme', 'header', 'position']) === 'site'): ?>
		<header>
			<div class="container">
				<h1><?php echo $this->getData(['config', 'title']); ?></h1>
			</div>
		</header>
	<?php endif; ?>
	<!-- Menu dans le site après la bannière -->
	<?php if($this->getData(['theme', 'menu', 'position']) === 'site-second'): ?>
		<nav>
			<div id="toggle"><?php echo template::ico('menu'); ?></div>
			<div id="menu" class="container">
				<?php $layout->showMenu(); ?>
			</div>
		</nav>
	<?php endif; ?>
	<!-- Corps -->
	<section><?php $layout->showContent(); ?></section>
	<!-- Pied de page dans le site -->
	<?php if(
		$this->getData(['theme', 'footer', 'position']) === 'site'
		// Affiche toujours le pied de page pour l'édition du thème
		OR (
			$this->getData(['theme', 'footer', 'position']) === 'hide'
			AND $this->getUrl(0) === 'theme'
		)
	): ?>
		<footer <?php if($this->getData(['theme', 'footer', 'position']) === 'hide'): ?>class="displayNone"<?php endif; ?>>
			<div class="container">
				<?php $layout->showSocials(); ?>
				<?php $layout->showFooterText(); ?>
				<?php $layout->showCopyright(); ?>
			</div>
		</footer>
	<?php endif; ?>
</div>
<!-- Pied de page dans le fond du site -->
<?php if($this->getData(['theme', 'footer', 'position']) === 'body'): ?>
	<footer>
		<div class="container">
			<?php $layout->showSocials(); ?>
			<?php $layout->showFooterText(); ?>
			<?php $layout->showCopyright(); ?>
		</div>
	</footer>
<?php endif; ?>
<!-- Lien remonter en haut -->
<div id="backToTop"><?php echo template::ico('up'); ?></div>
<?php $layout->showAnalytics(); ?>
<?php $layout->showScript(); ?>
</body>
</html>