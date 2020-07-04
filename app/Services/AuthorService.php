<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AuthorService
{
    //diğer servislerle iletişim kurmak için ConsumesExternalService ekledik
    use ConsumesExternalService;

    public $baseUri;
    //ConsumesExternalService içindeki baseUri burdan alacak

    public $secret;
    //ConsumesExternalService içindeki secret burdan alacak


    public function __construct()
    {
        //config/services.php içindeki base_uri ilişkilendrdk
        $this->baseUri = config('services.authors.base_uri');

        //config/services.php içindeki secret ilişkilendrdk. ayrıca $this->secret ı ConsumesExternalService içinde kullanyrz
        $this->secret = config('services.authors.secret');
    }

    public function obtainAuthors()
    {

        return $this->performRequest('GET', '/authors');
    }

    public function createAuthor($data)
    {
        return $this->performRequest('POST', '/authors', $data);

    }

    public function getAuthor($author)
    {
        return $this->performRequest('GET', "/authors/{$author}");

    }

    public function editAuthor($data, $author)
    {
        return $this->performRequest('PUT', "/authors/{$author}", $data);

    }

    public function deleteAuthor($author)
    {
        return $this->performRequest('DELETE', "/authors/{$author}");
    }

}
