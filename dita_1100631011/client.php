<?php
date_default_timezone_set('Asia/Jakarta');        //mengatur default timezone'nya
// Pull in the NuSOAP code
require_once('lib/nusoap.php');        //memanggil kode NUSOAP yg terletak difolder lib
// Create the client instance
$wsdl="http://localhost/warda/hellowsdl.php?wsdl";        //menuliskan letak client yg disimpan di folder C:xampp/htdocs/warda(nama folder yg dibuat)/hellowsdl.php
$client =new nusoap_client($wsdl,true);
// Check for an error
$err = $client->getError();        //memeriksa client jika terjadi error
if ($err) {
    // Display the error
    echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';        //jika error maka akan menampilkan tulisan "Constructor error"
    // At this point, you know the call that follows will fail
}
// Call the SOAP method
$result = $client->call('hello', array('name' => 'warda'));        //memanggil hasil client
// Check for a fault
if ($client->fault) {        //memeriksa jika terjadi kesalahan
    echo '<h2>Fault</h2><pre>';        //jika terjadi kesalahan maka akan menampilkan kata "Fault"
    print_r($result);
    echo '</pre>';
} else {
    // Check for errors
    $err = $client->getError();        //memeriksa jika terjadi error
    if ($err) {
        // Display the error
        echo '<h2>Error</h2><pre>' . $err . '</pre>';        //jika terjadi error maka akan menampilkan kata "error"
    } else {
        // Display the result
        echo '<h2>Result</h2><pre>';        //mulai memanggil result
        print_r($result);
    echo '</pre>';
    }
}
// Display the request and response
echo '<h2>Request</h2>';        //menampilkan kata "request"
echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';        //menampilkan kata "Response"
echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
// Display the debug messages
echo '<h2>Debug</h2>';        //menampgillkan kata "debug"
echo '<pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';
?>