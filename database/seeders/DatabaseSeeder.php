<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Discount;
use App\Models\PaymentMethod;
use App\Models\Supplier;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'John',
            'middle_name' => 'Smith',
            'last_name' => 'Doe',
            'username' => 'admin',
            'email' => 'admin@email.com',
            'profile_photo' => null,
            'password' => 'password',
            'gender_id' => 1,
            'role_id' => 1,
        ]);
        User::factory()->create([
            'first_name' => 'Charlie',
            'middle_name' => 'Ang',
            'last_name' => 'Minamahal',
            'username' => 'charlang',
            'email' => 'charlie@email.com',
            'profile_photo' => null,
            'password' => 'password',
            'gender_id' => 2,
            'role_id' => 2,
        ]);
        User::factory()->create([
            'first_name' => 'Vincent',
            'middle_name' => 'Lee',
            'last_name' => 'Cheng',
            'username' => 'Luisang',
            'email' => 'india@email.com',
            'profile_photo' => null,
            'password' => 'password',
            'gender_id' => 2,
            'role_id' => 3,
        ]);

        Category::factory()->create([
            'name' => 'Mens',
            'description' => 'Shoes for Mens',
        ]);

        Category::factory()->create([
            'name' => 'Womens',
            'description' => '☕☕☕☕',
        ]);
        Category::factory()->create([
            'name' => 'Unisex',
            'description' => '🦄🦄🦄🦄',
        ]);

        // Discount::factory()->create([
        //     'percentage' => '10',
        //     'product_id' => 1,
        // ]);

        // Discount::factory()->create([
        //     'percentage' => '30',
        //     'product_id' => 2,
        // ]);

        // Discount::factory()->create([
        //     'percentage' => '50',
        //     'product_id' => 3
        // ]);

        Supplier::factory()->create([
            'company_name' => 'AnCheng Inc.',
            'contact_name' => 'Charlie C. Ang',
            'address' => '123 Main Street',
            'city' => 'New York',
            'region' => 'NY',
            'postal_code' => '10001',
            'country' => 'USA',
            'phone' => '123-456-7890',
        ]);

        Supplier::factory()->create([
            'company_name' => 'Cheng Inc.',
            'contact_name' => 'Mary D. Cayetano',
            'address' => '123 Main Street',
            'city' => 'Quezon City',
            'region' => 'NCR',
            'postal_code' => '58000',
            'country' => 'Philippines',
            'phone' => '09-234-5678',
        ]);

        PaymentMethod::factory()->create([
            'name' => 'Cash',
        ]);

        PaymentMethod::factory()->create([
            'name' => 'Credit Card',
        ]);

        PaymentMethod::factory()->create([
            'name' => 'PayPal',
        ]);
    }
}
