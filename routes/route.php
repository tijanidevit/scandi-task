<?php

use App\Controllers\CategoryController;
use App\Controllers\ProductController;

$routes = [
    '/' => [ProductController::class, 'index'],
    'product/all' => [ProductController::class, 'index'],
    '/product/all' => [ProductController::class, 'index'],
    '/product/saveApi' => [ProductController::class, 'store'],
    '/product/deleteApi' => [ProductController::class, 'deleteMany'],
    '/product/get' => [ProductController::class, 'show'],
    '/categories' => [CategoryController::class, 'index'],
    '/categories/items' => [CategoryController::class, 'items'],
];