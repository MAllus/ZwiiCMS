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

/**
 * Aperçu en direct
 */
$("input, select").on("change", function() {
	// Import des polices de caractères
	var titleFont = $("#themeTitleHFontFamily").val();
	var css = "@import url('https://fonts.googleapis.com/css?family=" + titleFont + "');";
	// Couleur, épaisseur et capitalisation du titre de la bannière
	css += "header span{color:" + $("#themeTitleHFontColor").val() + ";font-family:'" + titleFont.replace("+", " ") + "',sans-serif;font-weight:" + $("#themeTitleHFontStyle").val() + ";text-transform:" + $("#themeTitleHFontTransform").val() + "}";
	// Cache le titre de la bannière
	if($("#themeTitleHImage").val()) {
		$("header span").hide();
	}
	else {
		$("header span").show();
    }
    var themeTitleHImage = $("#themeTitleHImage").val();
    if(themeTitleHImage) {
        css += "header .container{background-image:url('<?php echo helper::baseUrl(false); ?>site/file/source/" + themeTitleHImage + "');margin:auto;background-size:contain;background-repeat:no-repeat;width:100%;max-width:" + $("#themeTitleHImageWidth").val() + "px;height:100%;max-height:" + $("#themeTitleHImageHeight").val() + "px;border-radius:" + $("#themeTitleHImageRadius").val() + ";box-shadow:" + $("#themeTitleHImageShadow").val() + ";position:absolute;" + $("#themeTitleHImagePosition").val() + "}";
    }
	// Ajout du css au DOM
	$("#themePreview").remove();
	$("<style>")
		.attr("type", "text/css")
		.attr("id", "themePreview")
		.text(css)
		.appendTo("head");
});
$("#themeTitleHImage").on("change", function() {
    if($(this).val() ) {
        $("#themeTitleHImageOptions").slideDown();
        $("#themeTitleHTextOptions").slideUp();
    }
    else {
        $("#themeTitleHTextOptions").slideDown();
        $("#themeTitleHImageOptions").slideUp();
    }
}).trigger("change");
