<?php

namespace AlexanderZabornyi\RepositoryTest;

class MemoryStorage
{
    private $data = [];
    private $lastId = 0;

    /**
     * Сохранить
     *
     * @param array $data
     *
     * @return int
     */
    public function persist(array $data): int
    {
        $this->lastId++;

        $data['id'] = $this->lastId;
        $this->data[$this->lastId] = $data;

        return $this->lastId;
    }

    /**
     * Извлечь
     *
     * @param int $id
     *
     * @return mixed
     */
    public function retrieve(int $id)
    {
        if (! isset($this->data[$id])) {
            throw new \OutOfRangeException(sprintf('No data found for ID %d', $id));
        }

        return $this->data[$id];
    }

    /**
     * Удалить
     *
     * @param int $id
     */
    public function delete(int $id)
    {
        if (! isset($this->data[$id])) {
            throw new \OutOfRangeException(sprintf('No data found for ID %d', $id));
        }

        unset($this->data[$id]);
    }
}