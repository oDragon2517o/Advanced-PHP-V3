<?php



use src\some\path\Doctrine\Common\ClassLoader;
use src\some\path\Doctrine\Common\Name;
use src\some\path\namespace\package\Class\Name2;
// use src\some\path\namespace\package\Class_Name2;
use src\some\path\namespace\package\Class_Name2;
// use \my\package_name\Class_Name;


spl_autoload_register(function ($class) {
    // echo $class . PHP_EOL;
    $do = ['\\', 'my', '_'];
    $po = [DIRECTORY_SEPARATOR, '', DIRECTORY_SEPARATOR];

    $file =   str_replace($do, $po, $class) . '.php';
    echo '$file=' . $file . PHP_EOL;
    if (file_exists($file)) {
        require_once $file;
    }
});




$post = new ClassLoader();
$post = new Name();
$post = new Name2();
$post = new Class_Name2();
// $post = new abc();
