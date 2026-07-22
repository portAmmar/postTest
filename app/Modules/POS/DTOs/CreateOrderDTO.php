<?php

declare(strict_types=1);

namespace App\Modules\POS\DTOs;

use App\Modules\POS\Enums\PaymentMethod;
use App\Modules\POS\Http\Requests\StoreOrderRequest;

readonly class CreateOrderDTO
{
    /**
     * @param array<int, OrderItemDTO> $items
     */
    public function __construct(
        public int $cashierId,
        public PaymentMethod $paymentMethod,
        public array $items,
    ) {}

    public static function fromRequest(StoreOrderRequest $request): self
    {
        $validated = $request->validated();

        $items = array_map(
            static fn (array $item): OrderItemDTO => OrderItemDTO::fromArray($item),
            $validated['items']
        );

        return new self(
            cashierId: (int) auth()->id(),
            paymentMethod: PaymentMethod::from($validated['payment_method']),
            items: $items,
        );
    }
}   