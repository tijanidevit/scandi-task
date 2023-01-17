<?php

namespace App\Controllers;

use App\Models\Category;
class CategoryController extends Controller{

    public function index() {
        $categories = Category::all();
        return $this->collectionRetrieved($categories);
    }
    public function items() {
        $id = cleanGetData('id');
        $items = Category::listItems($id);
        return $this->collectionRetrieved($items);
    }

    public function show() {
        $id = cleanGetData('id');
        $category = Category::find($id);
        return $this->ResourceRetrieved($category);
    }


    public function delete() {
        $categories = Category::all();
        return $this->collectionRetrieved($categories);
    }
    public function deleteMany() {
        $categories = Category::all();
        return $this->collectionRetrieved($categories);
    }
}