<?php

namespace App\Http\Controllers;

use App\Repositories\Books\BookRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    private BookRepositoryInterface $repository;

    public function __construct(BookRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request): JsonResponse
    {
        $books = $this->repository->findAll($request->query());

        return response()->json($books);
    }

    public function show(int $id): JsonResponse
    {
        $book = $this->repository->findById($id);

        if (is_null($book)) {
            return response()->json('', 204);
        }

        return response()->json($book);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'genre' => 'required',
            'description' => 'required',
            'sale_price' => 'required'
        ]);

        if (!Gate::forUser(Auth::guard('api')->user())->allows('can-administrate')) {
            return response()->json('Unauthorized', 403);
        }

        $cover = null;
        if ($request->hasFile('image')) {
            $cover = $request->file('image')->storeAs('/storage/book', $request->file('image')->getClientOriginalName());
        }
        $book = $this->repository->create(
            $request->title,
            $cover,
            $request->genre,
            $request->description,
            $request->sale_price
        );

        return response()->json($book);
    }

    public function destroy(int $id)
    {
        if (!Gate::forUser(Auth::guard('api')->user())->allows('can-administrate')) {
            return response()->json('Unauthorized', 403);
        }

        $response = $this->repository->delete($id);

        return response()->json($response['message'], $response['statusCode']);
    }

    public function update(int $id, Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'genre' => 'required',
            'description' => 'required',
            'sale_price' => 'required'
        ]);

        if (!Gate::forUser(Auth::guard('api')->user())->allows('can-administrate')) {
            return response()->json('Unauthorized', 403);
        }

        $cover = null;
        if ($request->hasFile('image')) {
            $cover = $request->file('image')->storeAs('/storage/book', $request->file('image')->getClientOriginalName());
        }

        $book = $this->repository->update(
            $id,
            $request->title,
            $cover,
            $request->genre,
            $request->description,
            $request->sale_price
        );

        if (is_null($book)) {
            return response()->json('Not Found', 404);
        }

        return $book;
    }
}
