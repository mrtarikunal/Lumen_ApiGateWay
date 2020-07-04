<?php

namespace App\Http\Controllers;


use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    use ApiResponser;

    public $authorService;

    /**
     * Create a new controller instance.
     *
     * @param AuthorService $authorService
     */

    //dependecy injection ile oluştrdğmz AuthorService class ekledik
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }


    /**
     * Return the list of Author
     *
     * @return Response
     */
    public function index()
    {

       return $this->successResponse($this->authorService->obtainAuthors(), Response::HTTP_OK) ;

    }

    public function store(Request $request)
    {

        return $this->successResponse($this->authorService->createAuthor($request->all()), Response::HTTP_CREATED);


    }

    public function show($author)
    {

        return $this->successResponse($this->authorService->getAuthor($author), Response::HTTP_OK);


    }

    public function update(Request $request, $author)
    {

        return $this->successResponse($this->authorService->editAuthor($request->all(), $author), Response::HTTP_CREATED);


    }

    public function destroy($author)
    {

        return $this->successResponse($this->authorService->deleteAuthor($author), Response::HTTP_OK);

    }

    //
}
