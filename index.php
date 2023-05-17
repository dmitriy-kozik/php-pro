<?php

class Product {}

class ProductGet extends Product {
    public function get(name) {}
}
class ProductAction extends Product {
    public function set(name, value) {}
    public function save() {}
    public function update() {}
    public function delete() {}
}
class ProductView extends Product {
    public function show() {}
    public function print() {}
}
