<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Gallery;
use App\User;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testGalleryData()
    {
        $user = User::create([
            'name' => 'Vasya',
            'email' => 'vasya@gmail.com',
            'password' => '$2y$10$mFx6q9UEogodaGNe7bLdsOfWiYeN1E3423eddNwSsrRWtBf9C9ub.y68BTK',
        ]);

        $gallery = Gallery::create([
            'title' => 'hello',
            'description' => 'test',
            'preview' => 'test',
            'image' => 'test',
            'path' => 'test',
            'user_id' => $user->id,
        ]);

        $galleryData = Gallery::getGallery($user->id);

        $this->assertNotEmpty($galleryData);

    }
}
