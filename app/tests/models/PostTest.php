<?php

use Woodling\Woodling;

class PostTest extends TestCase {

    public function testDateAgo()
    {
        $post = Woodling::retrieve('Post');
        $this->assertGreaterThan( 0, strpos($post->date(), 'ago') );
    }

    public function testDateFullDisplay()
    {
        $post = Woodling::retrieve('PostOld');
        $this->assertEquals( 0, strpos($post->date(), 'ago') );
    }

    public function testDateAgoInput()
    {
        $post = Woodling::retrieve('Post');
        $this->assertGreaterThan( 0, strpos($post->date($post->created_at), 'ago') );
    }

    public function testDateFullDisplayInput()
    {
        $post = Woodling::retrieve('PostOld');
        $this->assertEquals( 0, strpos($post->date($post->created_at), 'ago') );
    }

    public function testCreatedAtAgo()
    {
        $post = Woodling::retrieve('Post');
        $this->assertGreaterThan( 0, strpos($post->created_at(), 'ago') );
    }

    public function testCreatedAtFullDisplay()
    {
        $post = Woodling::retrieve('PostOld');
        $this->assertEquals( 0, strpos($post->created_at(), 'ago') );
    }

    public function testUpdatedAtAgo()
    {
        $post = Woodling::retrieve('Post');
        $this->assertGreaterThan( 0, strpos($post->updated_at(), 'ago') );
    }

    public function testUpdatedAtFullDisplay()
    {
        $post = Woodling::retrieve('PostOld');
        $this->assertEquals( 0, strpos($post->updated_at(), 'ago') );
    }

    public function testUrl()
    {
        $post = Woodling::retrieve('Post');
        $this->assertGreaterThan( 0, strpos($post->url(), 'in-iisque-similique-reprimique-eum') );
    }
}