<?php

declare(strict_types=1);

namespace App\Modules\POS\Services;

use App\Modules\POS\Contracts\OrderServiceInterface;
use App\Modules\POS\DTOs\CreateOrderDTO;
use App\Modules\POS\Enums\OrderStatus;
use App\Modules\POS\Models\Item;
use App\Modules\POS\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use InvalidArgumentException;

class OrderService implements OrderServiceInterface
{

    public function createOrder(CreateOrderDTO $dto): Order
    {
        return DB::transaction(function () use ($dto): Order {
            $itemIds = array_map(
                static fn ($item) => $item->itemId,
                $dto->items
            );

            $itemsFromDb = Item::query()
                ->whereIn('id', $itemIds)
                ->where('is_available', true)
                ->get()
                ->keyBy('id');

            if ($itemsFromDb->count() !== count(array_unique($itemIds))) {
                throw new InvalidArgumentException('One or more selected items are unavailable or invalid.');
            }

            $order = Order::create([
                'order_number'   => 'ORD-' . now()->format('Ymd') . '-' . strtoupper(Str::random(4)),
                'cashier_id'     => $dto->cashierId,
                'status'         => OrderStatus::PAID,
                'payment_method' => $dto->paymentMethod,
                'total_amount'   => 0, // Will update after item loop
            ]);

            $totalAmount = 0.0;

            foreach ($dto->items as $itemDto) {
                $dbItem = $itemsFromDb->get($itemDto->itemId);
                $unitPrice = (float) $dbItem->price;
                $subtotal = $unitPrice * $itemDto->quantity;

                $order->items()->create([
                    'item_id'    => $dbItem->id,
                    'quantity'   => $itemDto->quantity,
                    'unit_price' => $unitPrice,
                    'subtotal'   => $subtotal,
                ]);

                $totalAmount += $subtotal;
            }

            $order->update([
                'total_amount' => $totalAmount,
            ]);

            return $order->load('items.item');
        });
    }

    public function getAllOrders(): Collection
    {
        return Order::query()
            ->with(['items.item'])
            ->latest()
            ->get();
    }
}