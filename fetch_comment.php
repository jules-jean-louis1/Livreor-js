<?php
require_once 'Classes/Comment.php';

$comment = new Comment();
$comments = $comment->getComments();

print_r($comments);