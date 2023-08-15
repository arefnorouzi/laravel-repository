<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;


    public function test_category_list()
    {
        $response = $this->get('/api/category');
        $response->assertStatus(200);
    }

    public function test_create_category(): void
    {
        $category = [
            'title' => 'test title',
            'slug' => 'test-category'
        ];

        $response = $this->post('/api/category',$category);
        $response->assertStatus(201);
    }

    public function test_find_category(): void
    {
        $category = [
            'title' => 'test title',
            'slug' => 'test-category'
        ];

        $this->post('/api/category',$category);

        $response = $this->get('/api/category/1');
        $response->assertStatus(200);
    }


    public function test_delete_category(): void
    {
        $category = [
            'title' => 'test title',
            'slug' => 'test-category'
        ];

        $this->post('/api/category', $category);

        $response = $this->delete('/api/category/1');

        $response->assertStatus(200);
    }
}
