<?php
    define('ProPayPal', 0);
    if(ProPayPal){
    define("PayPalClientId", "*********************");
    define("PayPalSecret", "*********************");
    define("PayPalBaseUrl", "http://159.223.191.152/");
    define("PayPalENV", "production");
    } else {
    define("PayPalClientId", "AdO74DLrmWribuFlNU12PHAvlVKWGryM3DtmdaUht2ooJPoJ9-t3n2iUytNe0KAvidNobSIfvZXFoANz");
    define("PayPalSecret", "EP5BEUsHIO_doFb458g9rLV56iHWwC1LXqqpdhxhBlVeaIvwnRz_J7zY7-CuwhyWmdN7uI3CFRbVJp9D");
    define("PayPalBaseUrl", "http://159.223.191.152/");
    define("PayPalENV", "sandbox");
    }
?>