<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        if(Auth::id()){
            $usertype = Auth()->user()->usertype;
            if($usertype == 'admin'){
                $users = User::all()->count();
                $books = Book::all()->count();
                $borrows = Borrow::where('status','Applied')->count();
                $returned = Borrow::where('status','returned')->count();
                
                return view('admin.index', compact( 'users', 'books', 'borrows', 'returned'));
            }elseif($usertype == 'user'){
                $books = Book::all();
                return view('home.index', compact('books'));    
            }
        }else{
            return redirect()->back();
        }
    }

    public function category_page(){
        $categories = Categories::all();
        return view('admin.category_page',compact('categories'));
    }

    public function add_category(Request $request){
        $data = new Categories();

        $data->cat_title = $request->category;
        $data->save();

        return redirect()->back()->with('message','Categories added successfully');
    }

    public function delete_category($id){
        $id = Categories::find($id);
        $id->delete();
        return redirect()->back();
    }

    public function update_category($id){
        $category = Categories::find($id);
        return view('admin.update_category', compact('category'));
    }

    public function edit_categories(Request $request,$id){
        $data = Categories::find($id);
        $data->cat_title = $request->cat_name;
        $data->save();

        return redirect()->back();
}

public function add_books(){
    $data = Categories::all();
    return view('admin.add_books', compact('data'));
}

public function store_book(Request $request){
    $data = new Book();
    $data->title = $request->book_name;
    $data->author_name = $request->author_name;
    $data->price = $request->price;
    $data->quantity = $request->quantity;
    $data->description = $request->description;
    $data->category_id = $request->category;

    // $book_image = $request->hasFile('book_img');
    // if($book_image){
    //     $bookImagename = time().'.'.$book_image->getClientOriginalExtension();
    //     $request->book_image->move('book', $bookImagename);
    //     $data->book_img = $bookImagename;
    // }
    $image = $request->book_img;
    if($image){
        $imagename = time().'.'.$image->getClientOriginalExtension();
        // $request->image->move('book', $imagename);
        $image->move(public_path('book'),$imagename);
        $data->book_img = $imagename; 
    }
    $image1 = $request->author_img;
    if($image1){
        $imagename = time().'.'.$image1->getClientOriginalExtension();
        // $request->image->move('author', $imagename);
        $image1->move(public_path('author'), $imagename);
        $data->author_img = $imagename; 
    }
    // $author_image = $request->hasFile('author_img');
    // if($author_image){
    //     $authorImagename = time().'.'.$author_image->getClientOriginalExtension();
    //     $request->author_image->move('author', $authorImagename);
    //     $data->author_img = $authorImagename;
    // }
    $data->save();

    return redirect()->back();
}

public function showBooks(){
    $books = Book::all();
    return view('admin.showbooks',compact('books'));
}

public function delete_book($id){
    $delete_book = Book::find($id);
    $delete_book->delete();

    return redirect()->back()->with('success', "data deleted successfully");
}

public function edit_book($id){
    $data = Book::find($id);
    $categories = Categories::all();
    return view('admin.edit_book', compact('data','categories'));
}

public function update_book(Request $request, $id){
    $data = Book::find($id);
    $data->title = $request->title;
    $data->author_name = $request->author_name;
    $data->price = $request->price;
    $data->quantity = $request->quantity;
    $data->description = $request->description;
    $data->category_id = $request->category;

    $image = $request->book_img;
    if($image){
        $imagename = time().'.'.$image->getClientOriginalExtension();
        // $request->image->move('book', $imagename);
        $image->move(public_path('book'),$imagename);
        $data->book_img = $imagename; 
    }
    $image1 = $request->author_img;
    if($image1){
        $imagename = time().'.'.$image1->getClientOriginalExtension();
        // $request->image->move('author', $imagename);
        $image1->move(public_path('author'), $imagename);
        $data->author_img = $imagename; 
    }

    $data->save();

    return redirect('/showBooks')->with('message', 'book updated successfully');
}

public function borrow_request(){
    $borrows = Borrow::all();
    return view('admin.borrow_request', compact('borrows'));
}

public function approved_book($id){
    $data = Borrow::find($id);
    $status = $data->status;
    if($status == 'approved'){
        return redirect()->back();
    }else{

    $data->status = 'approved';
    $data->save();

    $bookid = $data->book_id;
    $book = Book::find($bookid);
    $book_qty = $book->quantity - '1';
    $book->quantity = $book_qty;

    $book->save();
    return redirect()->back();
    }
}
    
public function returned($id){
    $data = Borrow::find($id);
    $status = $data->status;
    if($status == 'returned'){
        return redirect()->back();
    }else{

    $data->status = 'returned';
    $data->save();

    $bookid = $data->book_id;
    $book = Book::find($bookid);
    $book_qty = $book->quantity + '1';
    $book->quantity = $book_qty;

    $book->save();
    return redirect()->back();
    }
    
}

public function rejected($id){
    $data = Borrow::find($id);
    $data->status = 'rejected';
    $data->save();
    return redirect()->back();
}
}