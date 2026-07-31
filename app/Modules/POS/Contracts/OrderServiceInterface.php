<?php

declare(strict_types=1);

namespace App\Modules\POS\Contracts;

use App\Modules\POS\DTOs\CreateOrderDTO;
use App\Modules\POS\Models\Order;
use Illuminate\Database\Eloquent\Collection;

interface OrderServiceInterface
{
    public function createOrder(CreateOrderDTO $dto): Order;
    public function getAllOrders(): Collection;
    public function getPrderById(int $id): Order;
}
