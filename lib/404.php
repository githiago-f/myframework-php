<?php

namespace Lib;

function show_404() {
    $path = $_SERVER["REQUEST_URI"];
    return "Página $path nâo encontrada";
}