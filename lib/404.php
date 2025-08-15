<?php

namespace Lib;

function show_404() {
    $path = $_SERVER["REQUEST_URI"];
    echo "Página $path nâo encontrada";
}