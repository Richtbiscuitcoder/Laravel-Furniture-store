<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_GetProducts_Success()
    {
        Product::factory()->count(10)->create();
        $response = $this->get('/api/products');
        $response->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->hasAll(['message', 'success', 'data'])
                    ->has('data', 10, function (AssertableJson $json) {
                        $json->hasAll(['id', 'category_id', 'width', 'height', 'depth', 'price', 'stock', 'related', 'color', 'created_at', 'updated_at']);
                    });
            });
    }

    public function test_GetProduct_Success(): void
    {
        Product::factory()->create();

        $response = $this->get('/api/products/1');

        $response->assertStatus(200)
            ->assertJson(function(AssertableJson $json) {
                $json->hasAll(['message', 'success', 'data'])
                    ->has('data', function (AssertableJson $json) {
                        $json->hasAll(['id', 'category_id', 'width', 'height', 'depth', 'price', 'stock', 'related', 'color', 'created_at', 'updated_at']);
                    });
        });
    }



    public function test_createProduct_Success(): void
    {
        Category::factory()->create();
        $testData = [
            'category_id' => 1,
            'price' => 12.99,
            'stock' => 5,
            'width' => 10,
            'height' => 10,
            'depth' => 10,
            'related' => 1,
            'color' => 'blue'
        ];

        $response = $this->postJson('/api/products', $testData);

        $response->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->hasAll(['message', 'success']);
            });
        $this->assertDatabaseHas('products', $testData);
    }

    public function test_updateProduct_Success()
    {
        Product::factory()->create();

        $testData = [
            'category_id' => 1,
            'price' => 12.99,
            'stock' => 5,
            'width' => 10,
            'height' => 10,
            'depth' => 10,
            'related' => 1,
            'color' => 'blue'
        ];

        $response = $this->putJson('/api/products/1', $testData);

        $response->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->hasAll(['message', 'success']);
            });
        $this->assertDatabaseHas('products', $testData);
    }

    public function test_deleteTask_Success()
    {
        Product::factory()->create();

        $testData = [
            'category_id' => 1,
            'price' => 12.99,
            'stock' => 5,
            'width' => 10,
            'height' => 10,
            'depth' => 10,
            'related' => 1,
            'color' => 'blue'
        ];

        $response = $this->deleteJson('/api/products/1', $testData);
        $response->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
               $json->hasAll(['message', 'success']);
            });
        $this->assertDatabaseMissing('products', $testData);
    }


}
