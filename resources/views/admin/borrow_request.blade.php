<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .center{
            text-align: center;
            width: 80%;
            margin: auto;
            border: 1px solid white;
            margin-top: 60px;
        }
        th{
            background-color: skyblue;
            text-align: center;
            color: white;
            font-size: 15px;
            font-weight: bold;
            padding: 10px;
        }
    </style>
    </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <table class="center">
                    <tr>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Book Title</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Book Image</th>
                        <th>Change Status</th>
                    </tr>

                    @foreach($borrows as $borrow)
                    <tr>
                        <td>{{$borrow->user->name}}</td>
                        <td>{{$borrow->user->email}}</td>
                        <td>{{$borrow->user->phone}}</td>
                        <td>{{$borrow->book->title}}</td>
                        <td>{{$borrow->book->quantity}}</td>
                        <td>{{$borrow->status}}</td>
                        <td>
                            <img style="height: 150px; width: 90px;" src="book/{{$borrow->book->book_img}}" alt="">
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{url('approved_book', $borrow->id)}}">Approved</a>
                            <a class="btn btn-danger" href="{{url('returned', $borrow->id)}}">Rejected</a>
                            <a class="btn btn-info" href="{{url('rejected', $borrow->id)}}">Return</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @include('admin.script')
  </body>
</html>