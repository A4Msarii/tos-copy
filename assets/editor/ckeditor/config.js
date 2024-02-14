/**
 * @license Copyright (c) 2003-2023, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
  // Define changes to default configuration here. For example:
  // config.language = 'fr';
  // config.uiColor = '#AADC6E';
	config.language = 'en';
  config.scayt_autoLang = false; // Set to true if you want to automatically detect the language
  config.scayt_sLangs = 'en_US'; // Add additional languages separated by commas
  config.scayt_userDictionaryName = 'myCustomDictionary'; // Optional: Specify a custom user dictionary
  config.pluginsAdd = 'scayt';
};

