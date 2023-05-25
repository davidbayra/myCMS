<?php

namespace App\Admin\Model\Page;

use App\Engine\Core\Database\ActiveRecord;

class Page
{
    use ActiveRecord;

    protected string $table = 'page';
    private mixed $id;
    private string $title;
    private string $content;
    private string $date;

    /**
     * @return int
     */
    public function getId(): mixed
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(mixed $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

}
