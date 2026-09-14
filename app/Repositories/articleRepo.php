<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepo
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

    public function create(array $article)
    {
        return $this->model->create($article);
    }

    public function update(int $id, array $article)
    {
        $data = $this->find($id);       // ganti nama variabel biar tidak bentrok
        $data->update($article);        // update pakai $article (data baru dari user)
        return $data;
    }

    public function delete(int $id)
    {
        $article = $this->find($id);
        return $article->delete();
    }
}