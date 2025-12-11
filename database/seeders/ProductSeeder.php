<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $categories = Category::all();

    if ($categories->isEmpty()) {
      $this->command->warn('No categories found. Please run CategorySeeder first.');
      return;
    }

    $products = [
      ['name' => 'Smartphone Samsung Galaxy S23', 'price' => 899.99, 'rating' => 4.5],
      ['name' => 'Laptop Dell XPS 15', 'price' => 1499.99, 'rating' => 4.7],
      ['name' => 'Wireless Headphones Sony WH-1000XM5', 'price' => 349.99, 'rating' => 4.8],
      ['name' => 'Smart TV LG 55 inch', 'price' => 699.99, 'rating' => 4.4],
      ['name' => 'iPad Air', 'price' => 599.99, 'rating' => 4.6],
      ['name' => 'Men\'s Denim Jeans', 'price' => 49.99, 'rating' => 4.2],
      ['name' => 'Women\'s Summer Dress', 'price' => 39.99, 'rating' => 4.3],
      ['name' => 'Leather Jacket', 'price' => 199.99, 'rating' => 4.5],
      ['name' => 'Running Sneakers Nike', 'price' => 89.99, 'rating' => 4.6],
      ['name' => 'Winter Coat', 'price' => 149.99, 'rating' => 4.4],
      ['name' => 'The Great Gatsby', 'price' => 12.99, 'rating' => 4.7],
      ['name' => 'Clean Code by Robert Martin', 'price' => 34.99, 'rating' => 4.8],
      ['name' => '1984 by George Orwell', 'price' => 14.99, 'rating' => 4.9],
      ['name' => 'Atomic Habits', 'price' => 16.99, 'rating' => 4.7],
      ['name' => 'The Hobbit', 'price' => 18.99, 'rating' => 4.8],
      ['name' => 'Coffee Maker Deluxe', 'price' => 79.99, 'rating' => 4.3],
      ['name' => 'Garden Hose 50ft', 'price' => 29.99, 'rating' => 4.1],
      ['name' => 'Bedding Set Queen Size', 'price' => 89.99, 'rating' => 4.5],
      ['name' => 'Indoor Plant Pot Set', 'price' => 24.99, 'rating' => 4.2],
      ['name' => 'Kitchen Knife Set', 'price' => 59.99, 'rating' => 4.6],
      ['name' => 'Yoga Mat Premium', 'price' => 34.99, 'rating' => 4.4],
      ['name' => 'Camping Tent 4-Person', 'price' => 159.99, 'rating' => 4.5],
      ['name' => 'Dumbbell Set 20kg', 'price' => 89.99, 'rating' => 4.6],
      ['name' => 'Bicycle Mountain Bike', 'price' => 499.99, 'rating' => 4.7],
      ['name' => 'Fishing Rod Professional', 'price' => 79.99, 'rating' => 4.3],
      ['name' => 'LEGO Star Wars Set', 'price' => 129.99, 'rating' => 4.8],
      ['name' => 'Board Game Monopoly', 'price' => 24.99, 'rating' => 4.5],
      ['name' => 'Remote Control Car', 'price' => 49.99, 'rating' => 4.4],
      ['name' => 'Puzzle 1000 Pieces', 'price' => 19.99, 'rating' => 4.3],
      ['name' => 'Action Figure Set', 'price' => 34.99, 'rating' => 4.2],
      ['name' => 'Electric Toothbrush Oral-B', 'price' => 89.99, 'rating' => 4.6],
      ['name' => 'Face Cream Anti-Aging', 'price' => 39.99, 'rating' => 4.4],
      ['name' => 'Hair Dryer Professional', 'price' => 69.99, 'rating' => 4.5],
      ['name' => 'Massage Gun', 'price' => 99.99, 'rating' => 4.7],
      ['name' => 'Essential Oils Set', 'price' => 29.99, 'rating' => 4.3],
      ['name' => 'Car Vacuum Cleaner', 'price' => 44.99, 'rating' => 4.2],
      ['name' => 'Dash Camera HD', 'price' => 79.99, 'rating' => 4.5],
      ['name' => 'Car Phone Mount', 'price' => 19.99, 'rating' => 4.3],
      ['name' => 'Tire Pressure Gauge Digital', 'price' => 24.99, 'rating' => 4.4],
      ['name' => 'Car Cover Waterproof', 'price' => 59.99, 'rating' => 4.1],
      ['name' => 'Organic Green Tea 100 Bags', 'price' => 14.99, 'rating' => 4.5],
      ['name' => 'Premium Coffee Beans 1kg', 'price' => 24.99, 'rating' => 4.7],
      ['name' => 'Protein Powder Chocolate', 'price' => 39.99, 'rating' => 4.6],
      ['name' => 'Olive Oil Extra Virgin', 'price' => 18.99, 'rating' => 4.8],
      ['name' => 'Honey Raw Organic', 'price' => 16.99, 'rating' => 4.4],
      ['name' => 'Silver Necklace Pendant', 'price' => 79.99, 'rating' => 4.5],
      ['name' => 'Men\'s Watch Automatic', 'price' => 299.99, 'rating' => 4.7],
      ['name' => 'Diamond Earrings', 'price' => 499.99, 'rating' => 4.8],
      ['name' => 'Gold Bracelet 14k', 'price' => 399.99, 'rating' => 4.6],
      ['name' => 'Smartwatch Fitness Tracker', 'price' => 149.99, 'rating' => 4.4],
    ];

    foreach ($products as $productData) {
      Product::create([
        'name' => $productData['name'],
        'price' => $productData['price'],
        'category_id' => $categories->random()->id,
        'in_stock' => rand(0, 10) > 1,
        'rating' => $productData['rating'],
      ]);
    }
  }

}
