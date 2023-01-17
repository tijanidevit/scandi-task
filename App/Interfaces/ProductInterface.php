<?php

namespace App\Interfaces;

interface ProductInterface{
    public function index ();
    public function store ();
    public function delete();
    public function deleteMany();
    public function show();
}