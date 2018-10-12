CKEDITOR.editorConfig = function( config ) {
    config.allowedContent = true; //because editor strips out my classes
    config.contentsCss =  [ '/css/normalize.css','/libs/materialize/css/materialize.min.css','/css/mystyle.css' ];
};