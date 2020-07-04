<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookService
{
    //diğer servislerle iletişim kurmak için ConsumesExternalService ekledik
    use ConsumesExternalService;

    public $baseUri;

    public $secret;
    //ConsumesExternalService içindeki secret burdan alacak

    public function __construct()
    {
        //config/services.php içindeki base_uri ilişkilendrdk
        $this->baseUri = config('services.books.base_uri');

        //config/services.php içindeki secret ilişkilendrdk
        $this->secret = config('services.books.secret');
    }

    public function obtainBooks()
    {

        return $this->performRequest('GET', '/books');
    }

    public function createBook($data)
    {
        return $this->performRequest('POST', '/books', $data);

    }

    public function getBook($author)
    {
        return $this->performRequest('GET', "/books/{$author}");

    }

    public function editBook($data, $author)
    {
        return $this->performRequest('PUT', "/books/{$author}", $data);

    }

    public function deleteBook($author)
    {
        return $this->performRequest('DELETE', "/books/{$author}");
    }

}
