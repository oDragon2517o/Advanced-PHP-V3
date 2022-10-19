<?php

namespace GeekBrains\Blog;

use GeekBrains\LevelTwo\Person\Person;

class Comments
{
    public function __construct(
        private UUID $uuid,
        private $post_uuid,
        private string $author,
        private string $text
    ) {
    }
    public function __toString()
    {
        return $this->author . ' пишет: ' . $this->text;
    }
    public function uuid(): UUID
    {
        return $this->uuid;
    }
}
