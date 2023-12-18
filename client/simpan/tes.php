<?php
$panjang = 0;

function ubah($hh)
{
    global $panjang;
    $panjang = $hh;
}

var_dump($panjang);
ubah(50);
var_dump($panjang);
