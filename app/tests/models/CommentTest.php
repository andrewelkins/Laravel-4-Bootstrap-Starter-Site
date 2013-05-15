<?php

use Woodling\Woodling;

class CommentTest extends TestCase {

    public function testDateAgo()
    {
        $comment = Woodling::retrieve('Comment');
        $this->assertGreaterThan( 0, strpos($comment->date(), 'ago') );
    }

    public function testDateFullDisplay()
    {
        $comment = Woodling::retrieve('CommentOld');
        $this->assertEquals( 0, strpos($comment->date(), 'ago') );
    }

    public function testDateAgoInput()
    {
        $comment = Woodling::retrieve('Comment');
        $this->assertGreaterThan( 0, strpos($comment->date($comment->created_at), 'ago') );
    }

    public function testDateFullDisplayInput()
    {
        $comment = Woodling::retrieve('CommentOld');
        $this->assertEquals( 0, strpos($comment->date($comment->created_at), 'ago') );
    }

    public function testCreatedAtAgo()
    {
        $comment = Woodling::retrieve('Comment');
        $this->assertGreaterThan( 0, strpos($comment->created_at(), 'ago') );
    }

    public function testCreatedAtFullDisplay()
    {
        $comment = Woodling::retrieve('CommentOld');
        $this->assertEquals( 0, strpos($comment->created_at(), 'ago') );
    }

    public function testUpdatedAtAgo()
    {
        $comment = Woodling::retrieve('Comment');
        $this->assertGreaterThan( 0, strpos($comment->updated_at(), 'ago') );
    }

    public function testUpdatedAtFullDisplay()
    {
        $comment = Woodling::retrieve('CommentOld');
        $this->assertEquals( 0, strpos($comment->updated_at(), 'ago') );
    }
}