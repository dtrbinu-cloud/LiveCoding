<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Services\ArticleService;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    protected ArticleService $service;

    public function __construct(ArticleService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $article = $this->service->getAll();
        return ArticleResource::collection($article);
    }

    public function show(int $id)
    {
        $article = $this->service->getById($id);
        return new ArticleResource($article);
    }

    public function store(StoreArticleRequest $request)
    {
        $article = $this->service->store($request->validated());
        return (new ArticleResource($article))->response()->setStatusCode(201);
    }

    public function update(UpdateArticleRequest $request, int $id)
    {
        $article = $this->service->update($id, $request->validated());
        return new ArticleResource($article);
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);
        return response()->json(["message" => "Berhasil di hapus"], 200);
    }
}