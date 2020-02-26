/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = '/ckeditor/kcfinder/browse.php';
    config.filebrowserImageBrowseUrl = '/ckeditor/kcfinder/browse.php?type=Images';
    config.filebrowserFlashBrowseUrl = '/ckeditor/kcfinder/browse.php?type=Flash';
    config.filebrowserUploadUrl = '/ckeditor/kcfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = '/ckeditor/kcfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = '/ckeditor/kcfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
