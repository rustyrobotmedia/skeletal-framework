<?php

foreach(glob(__DIR__ . '/routes/*.php') as $route) {
    require $route;
}


