<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .div_center
        {
            text-align: center;
            margin: auto;
            border: 2px solid yellowgreen;
            margin-top: 50px;
        }
        th
        {
            background-color: skyblue;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
            color: black;
             /* border: 2px solid yellowgreen; */
        }
        
        .img_author .img_book{
            width: 80px;
            height: 50%;
        }
    </style>
    </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')


    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <div >
                    <table class="div_center">
                    <tr>
                        <th>Book Title</th>
                        <th>Author Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Author Image</th>
                        <th>Book Image</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                   
                    @foreach($books as $book)
                    <tr>
                       <td>{{$book->title}}</td>
                       <td>{{$book->author_name}}</td>
                       <td>{{$book->price}}</td>
                       <td>{{$book->quantity}}</td>
                       <td>{{$book->description}}</td>
                       <td>{{$book->category->cat_title}}</td>
                       <td>
                        <img style="width: 100px; height: 100px;" class="img_author" src="book/{{$book->book_img}}" alt="">
                       </td>
                       <td>
                        <img style="width: 100px; height: 100px;" class="img_author" src="author/{{$book->author_img}}" alt="">
                    
                    </td> 
                    <td>
                        <a onclick="confirmation(event)" class="btn btn-danger" href="{{url('delete_book', $book->id)}}">Delete</a>
                    </td>
                    <td>
                        <a href="{{url('edit_book', $book->id)}}" class="btn btn-info">Update</a>
                    </td>
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.script')
    <script type="text/javascript">
    function confirmation(ev){
        ev.preventDefault();
        var urlRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlRedirect);

        swal({
            title: "Are you sure to Delete this",
            text: "You will not be able to revert this",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })

        .then((willCancel) => {
            if(willCancel){
                window.location.href = urlRedirect;
            }
        })
    }
    </script>
  </body>
</html>