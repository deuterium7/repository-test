<?php

namespace AlexanderZabornyi\RepositoryTest\Tests;

use AlexanderZabornyi\RepositoryTest\MemoryStorage;
use AlexanderZabornyi\RepositoryTest\Post;
use AlexanderZabornyi\RepositoryTest\PostRepository;
use PHPUnit\Framework\TestCase;

class RepositoryTest extends TestCase
{
    public function testCanPersistAndFindPost()
    {
        $repository = new PostRepository(new MemoryStorage());
        $post = new Post(1, 'Test title', 'Test text');

        $repository->save($post);

        $this->assertEquals(1, $post->getId());
        $this->assertEquals($post->getId(), $repository->findById(1)->getId());
    }
}