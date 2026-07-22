<?php

namespace Database\Seeders;

use App\Modules\POS\Models\Category;
use App\Modules\POS\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = collect([
            'Burgers' => Category::create([
                'name' => 'Burgers',
                'is_active' => true,
            ]),
            'Drinks' => Category::create([
                'name' => 'Drinks',
                'is_active' => true,
            ]),
            'Desserts' => Category::create([
                'name' => 'Desserts',
                'is_active' => true,
            ]),
        ]);

        $items = [
            [
                'category' => 'Burgers',
                'name' => 'Classic Cheeseburger',
                'price' => 8.90,
                'image_path' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?auto=format&fit=crop&w=1200&q=80',
                'is_available' => true,
            ],
            [
                'category' => 'Burgers',
                'name' => 'Double Bacon Burger',
                'price' => 11.50,
                'image_path' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?auto=format&fit=crop&w=1200&q=80',
                'is_available' => true,
            ],
            [
                'category' => 'Burgers',
                'name' => 'Mushroom Swiss Burger',
                'price' => 10.25,
                'image_path' => 'https://images.unsplash.com/photo-1594212699903-ec8a3eca50f5?auto=format&fit=crop&w=1200&q=80',
                'is_available' => true,
            ],
            [
                'category' => 'Burgers',
                'name' => 'Spicy Chicken Burger',
                'price' => 9.75,
                'image_path' => 'https://images.unsplash.com/photo-1606755962773-d324e8db24c7?auto=format&fit=crop&w=1200&q=80',
                'is_available' => true,
            ],
            [
                'category' => 'Drinks',
                'name' => 'Iced Lemon Tea',
                'price' => 3.50,
                'image_path' => 'https://images.unsplash.com/photo-1517701550927-30cf4ba1b8b9?auto=format&fit=crop&w=1200&q=80',
                'is_available' => true,
            ],
            [
                'category' => 'Drinks',
                'name' => 'Fresh Orange Juice',
                'price' => 4.25,
                'image_path' => 'https://images.unsplash.com/photo-1505252585461-04db1eb84625?auto=format&fit=crop&w=1200&q=80',
                'is_available' => true,
            ],
            [
                'category' => 'Drinks',
                'name' => 'Sparkling Cola',
                'price' => 2.95,
                'image_path' => 'https://images.unsplash.com/photo-1629203851122-3726ecdf080e?auto=format&fit=crop&w=1200&q=80',
                'is_available' => true,
            ],
            [
                'category' => 'Desserts',
                'name' => 'Chocolate Lava Cake',
                'price' => 6.80,
                'image_path' => 'https://images.unsplash.com/photo-1616690710400-a16d449e7dc4?auto=format&fit=crop&w=1200&q=80',
                'is_available' => true,
            ],
            [
                'category' => 'Desserts',
                'name' => 'New York Cheesecake',
                'price' => 6.20,
                'image_path' => 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?auto=format&fit=crop&w=1200&q=80',
                'is_available' => true,
            ],
            [
                'category' => 'Desserts',
                'name' => 'Vanilla Ice Cream Sundae',
                'price' => 5.40,
                'image_path' => 'https://images.unsplash.com/photo-1563805042-7684c019e1cb?auto=format&fit=crop&w=1200&q=80',
                'is_available' => true,
            ],
        ];

        foreach ($items as $item) {
            Item::create([
                'category_id' => $categories[$item['category']]->id,
                'name' => $item['name'],
                'price' => $item['price'],
                'image_path' => $item['image_path'],
                'is_available' => $item['is_available'],
            ]);
        }
    }
}