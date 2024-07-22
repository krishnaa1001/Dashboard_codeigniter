<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class SearchController extends Controller
{
    private $apiKey = '45057764-e4d85fcb988327ab2cba3b481';

    public function index()
    {
        return view('search');
    }

    public function search()
    {
        $query = $this->request->getPost('query');

        $url = "https://pixabay.com/api/?key={$this->apiKey}&q=" . urlencode($query);

        $response = file_get_contents($url);
        $results = json_decode($response, true);

        return view('search', [
            'results' => $results['hits'],
        ]);
    }
}
