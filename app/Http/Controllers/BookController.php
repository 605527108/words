<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use App\Word;
use App\Book;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($name)
    {
        $word = Word::where('name',$name)->first();
        $result = [];
        if($word)
        {
            $books = $word->books;
            foreach ($books as $book) {
                $result[] = ['title' => $book->title, 'text' => $book->text];
            }
        }
        if ($result) {
            return Response::json($result,200,[]);
        }
        return Response::json([],404,[]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $word = Word::where('name',$request->name)->first();
        $book = new Book(['title' => $request->title, 'text' => $request->text]);
        if($word)
        {
            $book = $word->books()->save($book);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
