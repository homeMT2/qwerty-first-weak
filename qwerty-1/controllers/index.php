<?php

$request = str_replace(
    '/' . $config['site_url_sub'],
    '',
    $_SERVER['REQUEST_URI']
);

$dir = rawurldecode( 'files' . $request );

$files = array();
$urls = array();
$sizes = array();

if( preg_match( "/[\d]+/", $dir ) ) {
    require 'views/access-denied.view.php';
}
else if( file_exists( $dir ) && is_dir( $dir ) ) {

    $files = scandir($dir);

    for ($i = 0; $i < count($files); $i++) {

        // SLASH '/'
        if ($request != '/') {
            $slash = '/';
        }
        else {
            $slash = '';
        }

        // SIZE
        $sizes[$i] = file_size_convert(
            filesize( $dir . $slash . $files[$i] )
        );

        // URL
        if( !preg_match( "/[\d]+/", rawurldecode( $request . $files[$i] ) ) ) {
            $urls[$i] = $config['site_url'] . $request . $slash . $files[$i];
            $urls[$i] = str_replace('//', '/', $urls[$i]);
            $urls[$i] = $config['site_http'] . $urls[$i];
        }
        else {
            $urls[$i] = '#';
        }

    }

    // First and Second control element
    $files[0] = '/';
    $sizes[0] = '';
    $urls[0]  = $config['site_http'] . $config['site_url'];

    $files[1] = 'Up';
    $sizes[1] = '';
    $urls[1]  = ( $request == '/' ) ? $config['site_http'] . $config['site_url'] : $urls[1];

    require 'views/dir.view.php';
}
else if( file_exists( $dir ) && is_file( $dir ) ) {
    $file = file_get_contents( $dir );
    require 'views/file.view.php';
}
else {
    require 'views/404.view.php';
}