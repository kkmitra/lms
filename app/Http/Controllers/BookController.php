<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{

    public function __construct()
    {
        // $this->authorizeResource(Book::class, 'book');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('books.index', ["books" => Book::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Book::class);

        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'author_name' => 'required',
            'quantity' => 'required|integer',
            'synopsis' => 'required',
            'book_image' => 'required|image',
        ]);

        $path = $request->file('book_image')->store('public/images/books');
        $picture_url = Storage::url($path);

        $book = Book::create([
            "name" => $request->input('name'),
            "author_name" => $request->input('author_name'),
            "quantity" => $request->input('quantity'),
            "synopsis" => $request->input('synopsis'),
            "picture" => $picture_url,
        ]);
        $book->save();
        return redirect(route('books'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('books.show', ['book' => Book::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function order($id)
    {
        $book = Book::find($id);
        if($book->quantity > 0) {
            $book->update(['quantity' => $book->quantity - 1]);
            $book->users()->sync(Auth::id());
        }

        return redirect(route('home'));
    }
}
