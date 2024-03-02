<!DOCTYPE html>
<html lang="en">

  <head>

    <base href="/public">
  @include('home.css')

  </head>

<body>

  <!-- ***** Preloader Start ***** -->
 @include('home.preloader')
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
@include('home.header')
  <!-- ***** Header Area End ***** -->

  <div class="currently-market">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2><em>Items</em> Currently In The Market.</h2>
          </div>
        </div>

        <div >
          @if(session()->has('message'))

          <div class="alert alert-success">
            <button class="close" type="button" data-bs-dismiss="alert" aria-hidden= true>x</button>
          {{session()->get('message')}}
          </div>
          @endif
        </div>

        <div class="col-lg-6" style="margin-top: 100px">
          <div class="filters">
            <ul>
              <li data-filter="*"  class="active">All Books</li>
              @foreach($categories as $category)
              
              <li>
                <a href="{{url('cat_search', $category->id)}}">{{$category->cat_title}}</a>
              </li>

              @endforeach
            </ul>
          </div>
        </div>

        <form action="{{url('search')}}" method="GET">
            @csrf
            <div>
                <div class="col-md-8">
                    <input type="search" class="form-control"
                    name="search" placeholder="book title, author name">
                </div>
                <div class="col-md-4">
                    <input type="submit" class="btn btn-primary" value="search">
                </div>
            </div>
        </form>
        <div class="col-lg-8" style="padding: 10px">
          <div class="row grid">

            @foreach($books as $book)
            <div class="col-lg-6 currently-market-item all msc">
              <div class="item">
                <div class="left-image">
                  <img src="book/{{$book->book_img}}" alt="" style="border-radius: 20px; min-width: 195px;">
                </div>
                <div class="right-content">
                  <h4>{{$book->title}}</h4>
                  <span class="author">
                    <img src="book/{{$book->author_img}}" alt="" style="max-width: 50px; border-radius: 50%;">
                    <h6>{{$book->author_name}}</h6>
                  </span>
                  <div class="line-dec"></div>
                  <span class="bid">
                    Current Available<br><strong>{{$book->quantity}}</strong><br> 
                  </span>
                  <span class="ends">
                    Total<br><strong>{{$book->price}}</strong><br>
                  </span>
                  <div class="text-button">
                    <a href="{{url('book_details', $book->id)}}">View Book Details</a>
                  </div>
                  <br>
                  <div class="">
                    <a class="btn btn-primary" href="{{url('borrow_books', $book->id)}}">Apply to Borrow</a>
                  </div>
                </div>
              </div>
            </div>
            
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>

@include('home.footer')

  @include('home.script')

  </body>
</html>