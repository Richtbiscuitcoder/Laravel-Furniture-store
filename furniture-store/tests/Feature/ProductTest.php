<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        Product::factory()->create();

        $response = $this->get('/api/products/1');

        $response->assertStatus(200)
            ->assertJson(function (AssertableJson $json){
               $json->hasAll('id', 'category_id', 'width', 'height', 'depth', 'stock', 'related', 'color', 'created_at', 'updated_at');
            });
    }
}
