<?php

namespace App\Services;

use App\Repositories\ArticleRepoInterface;

class ArticleService
{
    protected ArticleRepoInterface $articleRepo;

    public function __construct(ArticleRepoInterface $articleRepo)
    {
        $this->articleRepo = $articleRepo;
    }

    public function getAll()
    {
        return $this->articleRepo->all();
    }

    public function getById(int $id)
    {
        return $this->articleRepo->find($id);
    }

    public function store(array $article)
    {
        return $this->articleRepo->create($article);
    }

    public function update(int $id, array $article)
    {
        return $this->articleRepo->update($id, $article);
    }

    public function delete(int $id)
    {
        return $this->articleRepo->delete($id);
    }
}