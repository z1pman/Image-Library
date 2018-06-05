<?php
/**
 * Created by PhpStorm.
 * User: Cougar
 * Date: 07.01.2018
 * Time: 12:47
 */

spl_autoload_register(function ($className) {
    include_once getClassPath($className) . '.php';
});

function getClassPath(string $className): string
{

    $registeredClasses = [
        'App\Controller\MainController' => 'controller/MainController',
        'App\Controller\ImageController' => 'controller/ImageController',
        'App\Controller\ValidationController' => 'controller/ValidationController',


        'App\Config\ConnectionDB' => 'config/ConnectionDB',
        'App\Repository\RepositoryAbstract' => 'repository/RepositoryAbstract',
        'App\Repository\Repository' => 'repository/Repository',

    ];

    return $registeredClasses[$className];
}