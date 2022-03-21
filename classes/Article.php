<?php

declare(strict_types=1);

class Article
{
    public $id;
    public $authorId;
    public string $title;
    public ?string $description;
    public ?string $publishDate;
    public string $authorName;

    public function __construct(
        $id,
        $authorId,
        string $title,
        ?string $description,
        ?string $publishDate,
        string $authorName
    ) {
        $this->id = $id;
        $this->authorId = $authorId;
        $this->title = $title;
        $this->description = $description;
        $this->publishDate = $publishDate;
        $this->authorName = $authorName;
    }

    public function formatPublishDate($format = 'd-m-Y')
    {
        $date = date_create($this->publishDate);
        return date_format($date, $format);
    }
}
