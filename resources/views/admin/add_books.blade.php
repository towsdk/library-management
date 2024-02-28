<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        .div_center{
        
            text-align: center;
            margin: auto;
        }
        .cat_label{
            display: inline-block;
            font-size: 30px;
            font-weight: bold;
            padding: 30px;
            color: white;
        }
        
    </style>
    </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
  
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

              <div class="div_center">
                <div>
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button class="close" type="button" data-dismiss='alert'>x</button>
                    {{session()->get('message')}}
                    </div>
                    @endif
                </div>
                    <h1 class="cat_label">Add Books</h1>

                <form action="{{url('store_book')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding-bottom: 10px">
                        <label for="">Book Title</label>
                        <input type="text" name="book_name">
                    </div>
                    <div style="padding-bottom: 10px">
                        <label for="">Another name</label>
                        <input type="text" name="author_name">
                    </div>
                    <div style="padding-bottom: 10px">
                        <label for="">Price</label>
                        <input type="text" name="price">
                    </div>
                    <div style="padding-bottom: 10px">
                        <label for="">Book Quantity</label>
                        <input type="number" name="quantity">
                    </div>
                    <div style="padding-bottom: 10px">
                        <label for="">Description</label>
                        <textarea name="description"></textarea>
                    </div>
                    <div style="padding-bottom: 10px">
                        <label for="">Book Image</label>
                        <input type="file" name="book_img">
                    </div>
                    <div style="padding-bottom: 10px">
                        <label for="">Author Image</label>
                        <input type="file" name="author_img">
                    </div>
                   <div style="padding: 10px">
                        <label for="">Category</label>
                        <select name="category" required>
                        <option value="">Select Category</option>
                        @foreach($data as $data)
                        <option value="{{$data->id}}">{{$data->cat_title}}</option>
                        @endforeach
                         </select>
                    </div>
                    <div style="padding: 10px">
                        <input class="btn btn-info" type="submit" value="Add Book">
                    </div>
                </form>
              </div>


            </div>
        </div>
    </div>

    <!-- JavaScript files-->
    @include('admin.script')
  </body>
</html>