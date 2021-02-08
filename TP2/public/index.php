<?php
    require(__dir__."/../vendor/autoload.php");

    use App\Kernel;
    $kernel = new Kernel();
    $kernel->run();