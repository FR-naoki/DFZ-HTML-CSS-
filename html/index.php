<?php

require __DIR__ . '/../lib/functions.php';

$dataList = fetchAll();

if (!$dataList) {
    error404();
}


