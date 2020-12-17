<?php

namespace Tests\Feature;

use App\Models\Tag;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_tag_create()
    {
        $this->withoutExceptionHandling();
        
        $user = User::factory()->create();

        $this->actingAs($user, 'api');

        $response = $this->post('/api/tags', [
           'data' => [
               'type' => 'tags',
               'attributes' => [
                   'tagName' => 'Food',
               ]
           ]
        ]);

        $tag = Tag::first();
            /* 
        $this->assertCount(1, Tag::first()); */
        
        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'type' => 'tags',
                    'tag_id' => $tag->id,
                    'attributes' => [
                        'tagName' => 'Food',
                    ] ,
                    'links' => [
                        'self' => url('/tags/'.$tag->id),
                    ]
                ]
            ]);
    }
}
