<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .div_center{
         text-align: center;
         margin: auto;   
        }
        label{
            display: inline-block;
            width: 200px;

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
                    <h1>Update Book</h1>

                    <form action="{{url('update_book', $data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="">Book Title</label>
                            <input type="text" name="title" value="{{$data->title}}">
                        </div>
                        <div>
                            <label for="">Author Name</label>
                            <input type="text" name="author_name" value="{{$data->author_name}}">
                        </div>
                        <div>
                            <label for="">Price</label>
                            <input type="text" name="price" value="{{$data->price}}">
                        </div>
                        <div>
                            <label for="">Quantity</label>
                            <input type="text" name="quantity" value="{{$data->quantity}}">
                        </div>
                        <div>
                            <label for="">Description</label>
                            <textarea name="description">{{$data->description}}</textarea>
                        </div>

                        <div>
                            <label for="">Category</label>

                            <select name="category" id="">
                                <option value="{{$data->category_id}}">{{$data->category->cat_title}}</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->cat_title}}</option>
                                @endforeach
                            </select>
                        </div>
                            
                            <div>
                                <label>Current Book Image</label>
                                <img style="width: 80px;  border-radius: 50%; margin:auto; " src="/book/{{$data->book_img}}" alt="">
                            </div>

                            <div>
                                <label for="">Current book image</label>
                                <input type="file" name="book_img">
                            </div>
                            
                            <div>
                                <label>Current Author Image</label>
                                <img style="width: 80px; border-radius: 50%; margin:auto; "  src="/author/{{$data->author_img}}" alt="">
                            </div>
                            <div>
                                <label for="">Current author image</label>
                                <input type="file" name="author_img">
                            </div>
                            <div>
                                <input type="submit" value="update" class="btn btn-info">
                            </div>
                        

                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.script')
  </body>
</html>