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

                <form action="{{url('add_category')}}" method="POST">
                    @csrf
                    <div style="padding-bottom: 10px">
                        
                        <label for="">Category</label>
                        <input type="text" name="category" required>
                    </div>
                    <div >
                        <input class="btn btn-primary" type="submit" value="Add Category">
                    </div>
                </form>
              </div>

              <div style="margin-top: 10px">
                {{-- <center> --}}
                    
                <table class="table">
                    <tr style="text-align: center; background-color: skyblue;">
                        <th>Categories Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach($categories as $category)
                    <tr style="text-align: center">
                        <td>{{$category->cat_title}}</td>
                        <td>
                            <a  type="button" class="btn btn-info" href="{{url('update_category',$category->id)}}">Update</a>
                            <a onclick="confirmation(event)" type="button" class="btn btn-danger" href="{{url('delete_category',$category->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {{-- </center> --}}
              </div>

            </div>
        </div>
    </div>

    <!-- JavaScript files-->
    @include('admin.script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        function confirmation(ev){
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);

            swal({
                title: "Are you sure to Delete this",
                text: "You will not be able to revert this!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            )}
            .then((willCancel) => {

            if(willCancel) {
                widow.location.href = urlToRedirect;
            }
            });
        }
    </script>
  </body>
</html>