<?php

function encryptData($data, $key, $iv) 
{
    $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
    $encryptedData = base64_encode($encrypted);
    return $encryptedData;
}

function decryptData($encryptedData, $key, $iv) 
{
    $encryptedData = base64_decode($encryptedData);
    $decrypted = openssl_decrypt($encryptedData, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
    return $decrypted;
}
