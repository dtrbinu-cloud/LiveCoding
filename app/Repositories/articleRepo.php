<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepo implements ArticleRepoInterface
{
    protected Article $model;

    public function __construct(Article $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->latest()->get();
    }

    public function find(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $article = $this->find($id);
        $article->update($data);
        return $article;
    }

    public function delete(int $id)
    {
        $article = $this->find($id);
        return $article->delete();
    }
}