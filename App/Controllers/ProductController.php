<?php

namespace App\Controllers;

use App\Interfaces\ProductInterface;
use App\Models\Product;
use App\Requests\ProductRequest;

class ProductController extends Controller implements ProductInterface{

    public function store() {
        try {
            $validate = (new ProductRequest)->validate();
            if ($validate) {
                $product = new Product();
                $product->setName(cleanPostData('name'));
                $product->setProductType(cleanPostData('productType'));
                $product->setSku(cleanPostData('sku'));
                $product->setPrice(cleanPostData('price'));
                $product->setSize(cleanPostData('size'));
                $product->setWidth(cleanPostData('width'));
                $product->setHeight(cleanPostData('height'));
                $product->setWeight(cleanPostData('weight'));
                $product->setLength(cleanPostData('length'));
                $product->create();

                return $this->resourceCreated();

            }
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function index() {
        $products = Product::all();
        return $this->collectionRetrieved($products);
    }

    public function show() {
        $sku = cleanGetData('sku');
        $product = Product::findBySku($sku);
        return $this->resourceRetrieved($product);
    }
    public function delete() {
        $products = Product::all();
        return $this->collectionRetrieved($products);
    }
    public function deleteMany() {
        $products = (new Product)->delete();
        return $this->collectionDeleted();
    }
}