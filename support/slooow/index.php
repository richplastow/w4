<?php
//// 20170809 slooow 1.0.0
//// Simulates a slow server
//// Built to test richplastow.com/w4/#i4 and richplastow.com/w4/#p4
//// MIT License (c) Rich Plastow 2017


//// Validate that the expected query string keys are present.
if (! isset($_GET['file']) || ! isset($_GET['slooowness']) ) {
    echo 'Must specify file and slooowness, eg http://oc3e.com/slooow/?file=img/test-1.jpg&slooowness=3';
    exit();
}


//// Get various values from the query-string.
$file = $_GET['file'];
$slooowness = $_GET['slooowness'];
$ext = array_pop( explode('.', $file) );
$mimes = array(
    'gif'  => 'image/gif'
  , 'jpeg' => 'image/jpeg'
  , 'jpg'  => 'image/jpeg'
  , 'png'  => 'image/png'
  , 'js'   => 'application/javascript'
  , 'css'  => 'text/css'
  , 'woff' => 'application/font-woff'
);
$mime = $mimes[$ext];


//// Validate that the query string values.
if (! preg_match('/^(css|dist|font|img|src\\/main)\\/[-.a-z0-9]+$/', $file) ) {
    echo 'The file is invalid - try img/test-1.jpg';
    exit();
}

if (! isset($mimes[$ext]) ) {
    echo 'Invalid extension - must be gif, jpeg, jpg, png, js, css or woff';
    exit();
}

if (! file_exists('asset/' . $file) ) {
    echo 'The file does not exist - try img/test-1.jpg';
    exit();
}

if ( 1 !== strlen($slooowness) || ! ctype_digit($slooowness) ) {
    echo 'Invalid slooowness - must be an integer between 0 (fast) and 9 (slooow)';
    exit();
}


//// Send the HTTP headers - these are set to discourage caching.
//// Note the .htaccess file which contains the line 'SetEnv no-gzip 1'
$filesize = filesize('asset/' . $file);
header( 'Content-type: ' . $mime );
header( 'Content-Length: ' . $filesize );
header( 'Cache-Control: no-cache, no-store, must-revalidate, max-age=0' );
header( 'Cache-Control: post-check=0, pre-check=0', false );
header( 'Pragma: no-cache' );
header( 'Expires: 0' );

//// Allow from any origin. https://stackoverflow.com/a/9866124
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}"); //@TODO make more secure
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400'); // cache for 1 day
}

//// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        // may also be using PUT, PATCH, HEAD etc
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

//// Calculate the chunk-size, which should be proportional to the filesize.
//// For a 256000 byte file, 1 slooowness = 2304 bytes, so 112 chunks, so 1 second to load
//// For a 256000 byte file, 9 slooowness = 256 bytes, so 1000 chunks, so 10 seconds to load
//// For a 256 byte file, 1 slooowness = 3 bytes, so 86 chunks, so 0.86 seconds to load
//// For a 256 byte file, 9 slooowness = 1 byte, so 256 chunks, so 2.56 seconds to load
if (0 === $slooowness)
	$chunk = $filesize; // no download delay for zero slooowness
else
	$chunk = ceil($filesize * (10 - $slooowness) / 1000);

//// Serve the file.
set_time_limit(0);
$open = fopen('asset/' . $file, 'rb');
ob_start();
while(! feof($open) ) {
    echo fread($open, $chunk);
    ob_flush();
    flush();
    usleep(10000); // sleep for 100th of a second
}
fclose($open);



?>
