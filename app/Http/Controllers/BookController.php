<?php

namespace App\Http\Controllers;

use App\Dtos\Books\CreateBookDto;
use App\Exceptions\NotFoundException;
use App\Http\Requests\CreateBookRequest;
use App\Repositories\Books\BookRepositoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    public function store(CreateBookRequest $request): JsonResponse
    {
        $validatedRequest = $request->validated();

        $coverUrl = null;
        if ($request->hasFile('image')) {
            $coverUrl = $request->file('image')->storeAs(
                '/storage/book',
                $request->file('image')->getClientOriginalName()
            );
        }

        $createBookDto = new CreateBookDto(
            $validatedRequest['isbn'],
            $validatedRequest['title'],
            $validatedRequest['description'],
            $validatedRequest['genre'],
            $validatedRequest['sale_price'],
            $validatedRequest['author_id'],
            $validatedRequest['publisher_id'],
            $coverUrl
        );

        try {
            $this->repository->create($createBookDto);
        } catch (NotFoundException $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json('', 201);
    }

    public function destroy(int $id)
    {
        // if (!Gate::forUser(Auth::guard('api')->user())->allows('can-administrate')) {
        //     return response()->json('Unauthorized', 403);
        // }

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

        // if (!Gate::forUser(Auth::guard('api')->user())->allows('can-administrate')) {
        //     return response()->json('Unauthorized', 403);
        // }

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
