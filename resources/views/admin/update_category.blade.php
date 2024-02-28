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
                    <h1 class="cat_label">Add Category</h1>

                <form action="{{url('edit_categories', $category->id)}}" method="POST">
                    @csrf
                    <div style="padding-bottom: 10px">
                        
                        <label for="">Update Category</label>
                        <input type="text" name="cat_name" value="{{$category->cat_title}}" required>
                    </div>
                    <div >
                        <input class="btn btn-info" type="submit" value="Update">
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