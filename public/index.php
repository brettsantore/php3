<?php
use Santore\App\Greeter;

require_once '../vendor/autoload.php';

echo Greeter::greet($_GET['name'] ?? 'World');