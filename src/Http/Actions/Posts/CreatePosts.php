<?php

namespace GeekBrains\LevelTwo\Http\Actions\Posts;

use GeekBrains\LevelTwo\Blog\Exceptions\HttpException;
use GeekBrains\LevelTwo\Blog\Repositories\UsersRepository\UsersRepositoryInterface;
use GeekBrains\LevelTwo\Blog\Repositories\PostsRepository\PostsRepositoryInterface;
use GeekBrains\LevelTwo\Blog\User;
use GeekBrains\LevelTwo\Blog\Post;
use GeekBrains\LevelTwo\Blog\UUID;
use GeekBrains\LevelTwo\http\Actions\ActionInterface;
use GeekBrains\LevelTwo\http\ErrorResponse;
use GeekBrains\LevelTwo\http\Request;
use GeekBrains\LevelTwo\http\Response;
use GeekBrains\LevelTwo\http\SuccessfulResponse;
use GeekBrains\LevelTwo\Person\Name;

class CreatePosts implements ActionInterface
{
    public function __construct(
        private PostsRepositoryInterface $postsRepository,
    ) {
    }

    public function handle(Request $request): Response
    {
        try {
            $newPostsUuid = UUID::random();

            $posts = new Post(
                $newPostsUuid,
                $request->jsonBodyField('author_uuid'),
                $request->jsonBodyField('post_uuid'),
                $request->jsonBodyField('text')
            );
        } catch (HttpException $e) {
            return new ErrorResponse($e->getMessage());
        }

        $this->postsRepository->save($posts);

        return new SuccessfulResponse([
            'uuid' => (string)$newPostsUuid,
        ]);
    }
}
