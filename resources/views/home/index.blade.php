<!DOCTYPE html>
<html lang="en">

  <head>

  @include('home.css')

  </head>

<body>

  <!-- ***** Preloader Start ***** -->
 @include('home.preloader')
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
@include('home.header')
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  @include('home.banner')
  <!-- ***** Main Banner Area End ***** -->
  
  @include('home.categories')

  @include('home.book')

@include('home.footer')

  @include('home.script')

  </body>
</html>