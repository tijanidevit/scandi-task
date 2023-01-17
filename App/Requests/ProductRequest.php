<?php

namespace App\Requests;

use App\Core\Validation;
use App\Interfaces\RequestInterface;

class ProductRequest implements RequestInterface{

    public function validate() : mixed
    {
        $errors = [];
        if (!Validation::string('sku')) {
            $errors['sku'] = "Please, provide sku";
        }
        if (!Validation::exists('products','sku','sku')) {
            $errors['sku'] = "Please, provide a new sku";
        }
        if (!Validation::string('name')) {
            $errors['name'] = "Please, provide name";
        }
        if (!Validation::string('productType')) {
            $errors['productType'] = "Please, provide productType";
        }
        if (Validation::exists('categories','name','productType')) {
            $errors['productType'] = "Please, provide a valid product type";
        }
        
        if (!Validation::floatRequired('price')) {
            $errors['price'] = "Please, provide valid price. e.g 2.4";
        }
        
        if (!Validation::float('height')) {
            $errors['height'] = "Please, provide valid height. e.g 2.4";
        }
        
        if (!Validation::float('size')) {
            $errors['size'] = "Please, provide valid size. e.g 2.4";
        }
        
        if (!Validation::float('width')) {
            $errors['width'] = "Please, provide valid width. e.g 2";
        }
        
        if (!Validation::float('weight')) {
            $errors['weight'] = "Please, provide valid weight. e.g 2.4";
        }
        
        if (!Validation::float('length')) {
            $errors['length'] = "Please, provide valid length. e.g 2.4";
        }

        if (empty($errors)) {
            return true;
        }
        else{
            throw new \Exception(response([
                'success' => false,
                'message' => "Validation fails",
                "errors" => $errors
            ], 422));
            
        }
        
        


    }
}