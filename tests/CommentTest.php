<?php

use PHPUnit\Framework\TestCase;
require_once 'Classes/Comment.php';
class CommentTest extends TestCase {
    protected $comment;

    protected function setUp(): void
    {
        $this->comment = new Comment();
    }

    public function testVerifyComment(): void
    {
        $this->assertTrue($this->comment->verfiyComment('test'));
    }

    public function testGetComments(): void
    {
        $this->assertJson($this->comment->getComments());
    }

    public function testInsertComment(): void
    {
        $this->assertTrue($this->comment->insertComment('test', 1));
    }
}