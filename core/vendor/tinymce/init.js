/**
 * Initialisation de TinyMCE
 */
tinymce.init({
	selector: ".editor",
	language: language,
    skin: "lightgray",
	plugins: "advlist anchor autolink autoresize code colorpicker contextmenu fullscreen hr image imagetools legacyoutput link lists media paste preview searchreplace tabfocus table textcolor textpattern wordcount codesample visualblocks fullscreen preview emoticons charmap",
	toolbar: "insertfile undo redo | styleselect | bold italic forecolor backcolor fontsizeselect | alignleft aligncenter alignright alignjustify subscript superscript | bullist numlist outdent indent | link image media emoticons charmap | codesample | visualblocks fullscreen preview",
	body_class: "editor",
	extended_valid_elements: "script[language|type|src]",
    contextmenu: "link image inserttable | cell row column deletetable",
	content_css: [
		baseUrl + "core/layout/common.css",
		baseUrl + "site/data/theme.css",
        baseUrl + "site/data/perso.css"
	],
    codesample_languages: [
        {text: 'HTML/XML', value: 'markup'},
        {text: 'CSS', value: 'css'},
        {text: 'JavaScript', value: 'javascript'}
    ],
	relative_urls: false,
	document_base_url: baseUrl,
	filemanager_access_key: privateKey,
	external_filemanager_path: baseUrl + "core/vendor/filemanager/",
	external_plugins: {
		"filemanager": baseUrl + "core/vendor/filemanager/plugin.min.js"
	},
	// Permet de détecter un changement dans la textearea, utile pour le message des modifications non enregistrées du formulaire
	setup: function(editor) {
		editor.on("keydown", function() {
			$(editor.targetElm).trigger("keydown");
		});
	}
});
