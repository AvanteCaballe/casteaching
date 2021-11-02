<?php

namespace Tests\Feature\Videos;

use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VideoTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function users_can_view_videos()
    {
        // Fase 1 -> Preparació -> Prepare
        // WISHFUL PROGRAMMING -> API
        // LARAVEL ELOQUENT -> https://laravel.com/8.x/eloquent
        $video = Video::create([
            'title' => 'Ubuntu 101',
            'description' => '# Here description',
            'url' => 'https://youtu.be/w8j07_DBl_I',
            'published_at' => Carbon::parse('December 13, 2020 8:00pm'),
            'completed' => false,
            'previous' => null,
            'next' => null,
            'series_id' => 1
        ]);

        // Fase 2 -> Execució -> Executa el codi a provar
        // Laravel HTTP TESTS->
        $response = $this->get('/videos/' . $video->id);


        // Fase 3 -> Comprovacions -> Assertion
        $response->assertStatus(200);
        $response->assertSee('Ubuntu 101');
        $response->assertSee('# Here description');
        $response->assertSee('December 13');
    }
}
