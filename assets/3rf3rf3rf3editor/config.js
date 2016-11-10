/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	//config.entities_latin = false;	
	config.resize_enabled = false; config.entities_latin = false; config.entities_greek = false; config.entities = false; config.basicEntities = false; 	
	config.filebrowserBrowseUrl = 'http://www.inversionesjemal.com/demos/sistemastiempo/assets/3rf3rf3rf3editor/elfinder/elfinder.html';
	//config.filebrowserBrowseUrl = 'http://localhost/markarina/assets/3rf3rf3rf3editor/elfinder/elfinder.html';	
	config.toolbar_Basic =
	[
		['Source','Bold', 'Italic']
	];		
};
