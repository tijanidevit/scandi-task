<?php
namespace App\Models;

use App\Core\Database;
class Product {
    public static string $table = 'products';
    private string $productType, $name, $sku;
    private mixed $price, $size, $height, $width, $weight, $length;

    public function getProductType()
    {
        return $this->productType;
    }
    public function setProductType($value)
    {
        return $this->productType = $value;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($value)
    {
        return $this->name = $value;
    }

    public function getSku()
    {
        return $this->sku;
    }
    public function setSku($value)
    {
        return $this->sku = $value;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($value)
    {
        return $this->price = $value;
    }

    public function getHeight()
    {
        return $this->height;
    }
    public function setHeight($value)
    {
        return $this->height = $value;
    }
    public function getWidth()
    {
        return $this->width;
    }
    public function setWidth($value)
    {
        return $this->width = $value;
    }

    public function getLength()
    {
        return $this->length;
    }
    public function setLength($value)
    {
        return $this->length = $value;
    }


    public function getSize()
    {
        return $this->size;
    }
    public function setSize($value)
    {
        return $this->size = $value;
    }

    public function getWeight()
    {
        return $this->weight;
    }
    public function setWeight($value)
    {
        return $this->weight = $value;
    }

    public function toArray() {
        return get_object_vars($this);
    }
    
    public function create() {
        $data = get_object_vars($this);
        return (new Database)->addData('products', $data);
    }
    
    public static function find($id) {
        return (new Database)->findById(self::$table, $id);
    }
    public static function findBySku($sku) {
        return (new Database)->findByColumn(self::$table, 'sku', $sku);
    }
    public static function all() {
        return (new Database)->findAll(self::$table);
    }
    
    public static function delete() {
        return (new Database)->deleteManyDataByColumn(self::$table,'sku', $_POST['skus']);
    }
}
