<?php

namespace App\Services\Interfaces;

use App\Models\Product;

interface ProductServiceInterface
{
    public function getAllProducts();
    public function getAllProductsPaginated(int $perPage = 15,array $filters = []);
    public function getProductById($id);
    public function createProduct(array $data);
    public function updateProduct($id, array $data);
    public function deleteProduct($id);
    public function addImagesToProduct(Product $product, array $imagePaths);
}
