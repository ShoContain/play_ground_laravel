<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;


class ImageTest extends TestCase
{
    use WithFaker;
    
    public function test_image_should_asscociate_with_user()
    {
        
        $image = new \App\Models\Image();
        $image->file_path = "image/user/test.png";
        
        $user = \App\Models\User::factory()->create();
        $user->image()->save($image);
        
        $this->assertSame("image/user/test.png",$user->image->file_path);
        $this->assertSame("App\Models\User",$user->image->imageable_type);
        $this->assertSame($user->image->imageable_id,$user->id);
    }

    public function test_image_should_asscociate_with_post()
    {
        
        $image = new \App\Models\Image();
        $image->file_path = "image/post/test.png";
        
        $post = \App\Models\Post::factory()->create();
        $post->images()->save($image);

        $this->assertSame("image/post/test.png",$post->images->first()->file_path);
        $this->assertSame("App\Models\Post",$post->images->first()->imageable_type);
        $this->assertSame($post->images->first()->imageable_id,$post->id);
    }
}
