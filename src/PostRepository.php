<?php

namespace AlexanderZabornyi\RepositoryTest;

class PostRepository
{
    private $storage;

    /**
     * PostRepository constructor.
     *
     * @param MemoryStorage $storage
     */
    public function __construct(MemoryStorage $storage)
    {
        $this->storage = $storage;
    }

    /**
     * Найти пост по id
     *
     * @param int $id
     *
     * @return Post
     */
    public function findById(int $id): Post
    {
        $arrayData = $this->storage->retrieve($id);

        if (is_null($arrayData)) {
            throw new \InvalidArgumentException(sprintf('Post with ID %d does not exist', $id));
        }

        return Post::fromState($arrayData);
    }

    /**
     * Сохранить пост
     *
     * @param Post $post
     */
    public function save(Post $post)
    {
        $id = $this->storage->persist([
            'title' => $post->getTitle(),
            'text' => $post->getText()
        ]);

        $post->setId($id);
    }
}