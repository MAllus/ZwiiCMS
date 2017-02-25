<?php

/**
 * This file is part of Zwii.
 *
 * For full copyright and license information, please see the LICENSE
 * file that was distributed with this source code.
 *
 * @author Rémi Jean <remi.jean@outlook.com>
 * @copyright Copyright (C) 2008-2017, Rémi Jean
 * @license GNU General Public License, version 3
 * @link http://zwiicms.com/
 */

class config extends common {

	public static $actions = [
		'backup' => self::GROUP_ADMIN,
		'index' => self::GROUP_ADMIN
	];

	public static $languages = [
		'fr_FR' => 'fr_FR'
	];

	/**
	 * Sauvegarde des données
	 */
	public function backup() {
		// Creation du ZIP
		$fileName = date('Y-m-d-h-i-s', time()) . '.zip';
		$zip = new ZipArchive();
		if($zip->open('core/tmp/' . $fileName, ZipArchive::CREATE) === TRUE){
			foreach(configHelper::scanDir('site/') as $file) {
				$zip->addFile($file);
			}
		}
		$zip->close();
		// Téléchargement du ZIP
		header('Content-Transfer-Encoding: binary');
		header('Content-Disposition: attachment; filename="' . $fileName . '"');
		header('Content-Length: ' . filesize('core/tmp/' . $fileName));
		readfile('core/tmp/' . $fileName);
		// Valeurs en sortie
		$this->addOutput([
			'display' => self::DISPLAY_RAW
		]);
	}

	/**
	 * Configuration
	 */
	public function index() {
		// Liste des langues
		$iterator = new DirectoryIterator('core/lang/');
		foreach($iterator as $fileInfos) {
			if($fileInfos->isFile()) {
				self::$languages[$fileInfos->getBasename('.json')] = $fileInfos->getBasename('.json');
			}
		}
		asort(self::$languages);
		// Soumission du formulaire
		if($this->isPost()) {
			$this->setData([
				'config',
				[
					'analyticsId' => $this->getInput('configAnalyticsId'),
					'autoBackup' => $this->getInput('configAutoBackup', helper::FILTER_BOOLEAN),
					'cookieConsent' => $this->getInput('configCookieConsent', helper::FILTER_BOOLEAN),
					'favicon' => $this->getInput('configFavicon'),
					'homePageId' => $this->getInput('configHomePageId', helper::FILTER_ID),
					'language' => $this->getInput('configLanguage'),
					'metaDescription' => $this->getInput('configMetaDescription'),
					'social' => [
						'facebookId' => $this->getInput('configSocialFacebookId'),
						'googleplusId' => $this->getInput('configSocialGoogleplusId'),
						'instagramId' => $this->getInput('configSocialInstagramId'),
						'pinterestId' => $this->getInput('configSocialPinterestId'),
						'twitterId' => $this->getInput('configSocialTwitterId'),
						'youtubeId' => $this->getInput('configSocialYoutubeId')
					],
					'title' => $this->getInput('configTitle')
				]
			]);
			if(self::$inputNotices === []) {
				// Active l'URL rewriting
				if(substr(sprintf('%o', fileperms('.htaccess')), -4) !== '0644') {
					chmod('.htaccess', 0644);
				}
				$htaccess = file_get_contents('.htaccess');
				$rewriteRule = explode('# URL rewriting', $htaccess);
				if($this->getInput('rewrite', helper::FILTER_BOOLEAN)) {
					if(empty($rewriteRule[1])) {
						file_put_contents('.htaccess',
							$htaccess . PHP_EOL .
							'<ifModule mod_rewrite.c>' . PHP_EOL .
							"\tRewriteEngine on" . PHP_EOL .
							"\tRewriteBase " . helper::baseUrl(false, false) . PHP_EOL .
							"\tRewriteCond %{REQUEST_FILENAME} !-f" . PHP_EOL .
							"\tRewriteCond %{REQUEST_FILENAME} !-d" . PHP_EOL .
							"\tRewriteRule ^(.*)$ index.php?$1 [L]" . PHP_EOL .
							'</ifModule>'
						);
					}
				}
				// Désactive l'URL rewriting
				elseif(empty($rewriteRule[1]) === false) {
					file_put_contents('.htaccess', $rewriteRule[0] . '# URL rewriting');
				}
			}
			// Valeurs en sortie
			$this->addOutput([
				'redirect' => helper::baseUrl() . $this->getUrl(),
				'notification' => 'Modifications enregistrées',
				'state' => true
			]);
		}
		// Valeurs en sortie
		$this->addOutput([
			'title' => 'Configuration',
			'view' => 'index'
		]);
	}

}

class configHelper extends helper {

	/**
	 * Scan le contenu d'un dossier et de ses sous-dossiers
	 * @param string $dir Dossier à scanner
	 * @return array
	 */
	public static function scanDir($dir) {
		$dirContent = [];
		$iterator = new DirectoryIterator($dir);
		foreach($iterator as $fileInfos) {
			if(in_array($fileInfos->getFilename(), ['.', '..', 'backup'])) {
				continue;
			}
			elseif($fileInfos->isDir()) {
				$dirContent = array_merge($dirContent, self::scanDir($fileInfos->getPathname()));
			}
			else {
				$dirContent[] = $fileInfos->getPathname();
			}
		}
		return $dirContent;
	}

}