<?php
// Pull in the NuSOAP code
require_once('nusoap-0.9.5/lib/nusoap.php');        //memanggil kode NUSOAP yg terletak difolder lib
// Create the server instance
$server = new soap_server();        //menuliskan server
// Initialize WSDL support
$server->configureWSDL('hellowsdl', 'urn:hellowsdl');        //menginisialisasi supaya bisa support/terhubung dengan WSDL
// Register the method to expose
$server->register('hello', // method name
    array('name' => 'xsd:string'), // input parameters
    array('return' => 'xsd:string'), // output parameters
    'urn:hellowsdl', // namespace
    'urn:hellowsdl#hello', // soapaction
    'rpc', // style
    'encoded', // use
    'Says hello to the caller' // documentation
);
// Define the method as a PHP function
function hello($name) {
        return 'helloooooooooooooo, ' . $name;
}
// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';        //digunakan untuk memanggil invoke/untuk membetulkan
$server->service($HTTP_RAW_POST_DATA);
?>