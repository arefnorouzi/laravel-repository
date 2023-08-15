<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_category(): void
    {
        $category = Category::create([
           'title' => 'test title',
           'slug' => 'test-category'
        ]);
        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'title' => 'test title'
        ]);
    }

    public function test_find_category(): void
    {
        $category = Category::create([
            'title' => 'find title',
            'slug' => 'find-category'
        ]);

        $find_item = Category::find($category->id);

        $this->assertEquals($category->id, $find_item->id);
        $this->assertEquals($category->title, $find_item->title);
    }


    public function test_delete_category(): void
    {
        $category = Category::create([
            'title' => 'delete title',
            'slug' => 'delete-category'
        ]);

        $category->delete();

        $this->assertDatabaseMissing('categories', [
            'id' => $category->id,
            'title' => 'test title'
        ]);
    }
}
