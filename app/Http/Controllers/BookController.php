<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = Book::paginate(20);
        return Inertia::render('Books/Index',['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Books/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'title' => 'required|string|max:255|unique:books' ,
            'author' => 'required|string|max:255' ,
            'published_year' => 'required' ,
            'description' => 'required|string'
        ]);
        try {

            $result = Book::create([
                'title' => $request->title ,
                'author' => $request->author ,
                'published_year' => date('Y', strtotime($request->published_year)) ,
                'description' => $request->description ,
            ]);

            if($result){

                return redirect()->to('/books')->with('success','Book Added Successfully');

            }

            return redirect()->back()->with('warning','Failed to add book');
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error','Something Went Wrong Error Logged!!!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
        return Inertia::render('Books/Show', ['book' => $book]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
        return Inertia::render('Books/Edit',['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
        $request->validate([
            'title' => ['required','string','max:255',Rule::unique('books')->where(function($query) use($book){
                $query->where('id','<>', $book->id);
            })  ],
            'author' => 'required|string|max:255',
            'published_year' => 'required',
            'description' => 'required|string'
        ]);

        try {

            $result = $book->update([
                'title' => $request->title,
                'author' => $request->author,
                'published_year' => date('Y', strtotime($request->published_year)),
                'description' => $request->description,
            ]);

            if ($result) {

                return redirect()->to('/books')->with('success', 'Book Updated Successfully');
            }

            return redirect()->back()->with('warning', 'Failed to Update book');
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something Went Wrong Error Logged!!!');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
