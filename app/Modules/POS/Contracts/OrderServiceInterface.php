<?php 
namespace App\Modules\POS\Contracts;

use App\Modules\POS\DTOs\CreateOrderDTO;
use App\Modules\POS\Models\Order;
use Illuminate\Database\Eloquent\Collection;

interface OrderServiceInterface
{
    public function createOrder(CreateOrderDTO $dto): Order;
    public function getAllOrders(): Collection;
}