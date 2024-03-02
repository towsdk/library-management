<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('home.index', compact('books'));
    }

    public function book_details($id){
        $book = Book::find($id);
        return view('home.book_details', compact('book'));
    }

    public function borrow_books($id){
        $data = Book::find($id);
        $book_id = $id;
        $quantity = $data->quantity;
         if($quantity >= '1'){

            if(Auth::id()){

                $user_id = Auth::user()->id;
                $borrow = new Borrow();
                $borrow->book_id = $book_id;
                $borrow->user_id = $user_id;
                $borrow->status = 'Applied';
                $borrow->save();
                return redirect()->back()->with('message', "a borrow book avaiaable");
    
            }else{
                return redirect('/login');
            }

         }else{
            
            return redirect()->back()->with('message', "not enough book avaiaable");
         }
    }

    public function book_history(){
        if(Auth::id()){
            $userid = Auth::user()->id;
            $data = Borrow::where('user_id','=', $userid)->get();
        }
        return view('home.book_history',compact('data'));
    }

    public function cancel_req($id){
        $data = Borrow::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Book borrow request cancelled successfully');
    }

    public function explore(){
        $categories = Categories::all();
        $books = Book::all();
        return view('home.explore', compact('books','categories'));
    }
    public function search(Request $request){
        $categories = Categories::all();
        $search = $request->search;
        $books = Book::where('title', 'LIKE', '%'. $search. '%')->
        orWhere('author_name', 'LIKE', '%'. $search. '%')->get();

        return view('home.explore', compact('books','categories'));
    }

    public function cat_search($id){
        $categories = Categories::all();
        $books = Book::where('category_id', $id)->get() ;
        return view('home.explore', compact('books','categories'));

    }
}

