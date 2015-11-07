<?php

$app->get('/', function () use ($app) {
    $app->log->info("Slim-Skeleton '/' route");
    $app->render('index.html');
});

