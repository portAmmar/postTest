<?php

declare(strict_types=1);

namespace App\Modules\POS\DTOs;

readonly class OrderItemDTO
{
    public function __construct(
        public int $itemId,
        public int $quantity,
        public float $unitPrice,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            itemId: (int) $data['item_id'],
            quantity: (int) $data['quantity'],
            unitPrice: (float) $data['unit_price'],
        );
    }
}