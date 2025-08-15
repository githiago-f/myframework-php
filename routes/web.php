<?php

use Lib\Router;

Router::route("/server", "WebController.server");
Router::route("/", "WebController.index");
