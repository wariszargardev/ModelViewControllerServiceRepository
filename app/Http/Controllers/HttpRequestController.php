<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HttpRequestController extends Controller
{
    public function simpleRequest(){
        $response = Http::get('https://www.youtube.com/');
        $response = $response->body();
        return $response;
    }

    public function getClientRequest(){
        $response = Http::get('https://jsonplaceholder.typicode.com/todos/1');
        $data = $response->json();
        echo "Id: " . $data['id']."<br>";
        echo "Title: " . $data['title']."<br>";
        echo "User Id: " . $data['userId']."<br>";
        die();

        // Boolean checks on the response
        // $response->ok() : bool;
        // $response->status() : int; // To know response status code
        // $response->body() : string;
        // $response->json() : array|mixed;
        // $response->successful() : bool;
        // $response->failed() : bool;
        // $response->serverError() : bool;
        // $response->clientError() : bool;
        // $response->header($header) : string;
        // $response->headers() : array;
    }

    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/todos/1');

        return response()->json($response);
    }

    // CREATE
    public function create(Request $request)
    {
        $response = Http::post('https://jsonplaceholder.typicode.com/todos', [
            'title' => 'Your Title',
            'body' => 'Your Body',
        ]);

        return $response;
    }

    // UPDATE PUT METHOD
    public function update(Request $request)
    {
        $response = Http::put('https://jsonplaceholder.typicode.com/todos/1', [
            'title' => 'Your Title',
        ]);

        return $response;
    }

    // UPDATE PATCH METHOD
    public function updatePatch(Request $request)
    {
        $response = Http::patch('https://jsonplaceholder.typicode.com/todos/1', [
            'title' => 'Your Title',
            'body' => 'Your Body',
        ]);

        return $response;
    }

    // DELETE
    public function delete(Request $request)
    {
        $response = Http::delete('https://jsonplaceholder.typicode.com/todos', [
            'title_id' => '1',
        ]);

        return $response;
    }
}
