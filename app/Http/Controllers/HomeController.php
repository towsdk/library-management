<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
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
        return view('home.book_details', compact('data'));
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
}

