<?php
namespace App\Models;

use App\Core\Database;
class Category extends Database {
    public static string $table = 'categories';
    public string $type, $name, $text;

    public function create($data) {
        return (new parent)->addData($this->table, $data);
    }
    
    public static function find($id) {
        return (new parent)->findById(self::$table, $id);
    }
    public static function listItems($id) {
        return (new parent)->findAllByColumn("category_items",'category_id', $id);
    }
    public static function all() {
        return (new parent)->findAll(self::$table);
    }
}
