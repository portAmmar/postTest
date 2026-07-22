<?php 

namespace App\Modules\POS\Contracts;

interface OrderServiceInterface
{
    public function createOrder(array $orderData): array;

    public function getAllOrders(): array;

}