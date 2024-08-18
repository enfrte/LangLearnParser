<?php

namespace LangLearnParser;

require __DIR__ . '/../vendor/autoload.php';

use LangLearnParser\Classes\Controllers\HomeController;
use Latte\Engine as LatteEngine;
use flight\net\Response;
use Flight;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$app = Flight::app();

// HOST SETTINGS
$app->set('basePath', Flight::request()->base . ''); // Host: XAMPP local dev

$app->register('latte', LatteEngine::class, [], function(LatteEngine $latte) use ($app) {
    $latte->setTempDirectory(__DIR__ . '/cache');
    $latte->setLoader(new \Latte\Loaders\FileLoader('templates'));
});

// Return custom htmx responses
Flight::map('htmxResponse', function() {
    return new class extends Response {
        public function sendHtml($html) {
            $this->header('Content-Type', 'text/html');
            $this->write($html);
            $this->send();
        }
    };
});

Flight::map('isHxRequest', function() {
    return Flight::request()->getHeader('HX-Request') === 'true';
});

Flight::route('/', [HomeController::class, 'index']);

Flight::start();
