<?php
spl_autoload_register(function ($namacontroller) {
    $paths = ['controller/', 'model/', 'config/', 'core/', 'controller/c_master/'];

    foreach ($paths as $path) {
        $file = __DIR__ . '/../' . $path . $namacontroller . '.php';

        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }

    echo "Class $namacontroller tidak ditemukan.";
});