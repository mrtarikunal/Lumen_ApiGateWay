<?php

namespace App\Http\Controllers;


use App\Services\AuthorService;
use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponser;

    public $bookService;
    public $authorService;

    /**
     * Create a new controller instance.
     *
     * @param BookService $bookService
     */

    //dependecy injection ile oluştrdğmz Bookservice class ekledik
    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    public function index()
    {

        return $this->successResponse($this->bookService->obtainBooks(), Response::HTTP_OK) ;

    }

    public function store(Request $request)
    {

        $this->authorService->getAuthor($request->author_id);
        //author olup olmadığını kontrol ediyrz author yoksa hata veriyor. varsa yeni kitabı olştryr

        return $this->successResponse($this->bookService->createBook($request->all()), Response::HTTP_CREATED);


    }

    public function show($book)
    {

        return $this->successResponse($this->bookService->getBook($book), Response::HTTP_OK);


    }

    public function update(Request $request, $book)
    {

        return $this->successResponse($this->bookService->editBook($request->all(), $book), Response::HTTP_CREATED);


    }

    public function destroy($book)
    {

        return $this->successResponse($this->bookService->deleteBook($book), Response::HTTP_OK);

    }
}
