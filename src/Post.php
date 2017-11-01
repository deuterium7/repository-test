<?php

namespace AlexanderZabornyi\RepositoryTest;

class Post
{
    private $id;
    private $title;
    private $text;

    /**
     * Post constructor.
     *
     * @param int $id
     * @param string $title
     * @param string $text
     */
    public function __construct(int $id, string $title, string $text)
    {
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
    }

    /**
     * Создать объект исходного класса
     *
     * @param array $state
     *
     * @return Post
     */
    public static function fromState(array $state): Post
    {
        return new self(
            $state['id'],
            $state['title'],
            $state['text']
        );
    }

    /**
     * Установить id
     *
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * Получить id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Получить заголовок
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Получить текст
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
}