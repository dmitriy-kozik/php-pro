<?php

class Product {
    public function get(name) {}
    public function set(name, value) {}
}
class ProductAction extends Product {
    public function save() {}
    public function update() {}
    public function delete() {}
}
class ProductView extends Product {
    public function show() {}
    public function print() {}
}
