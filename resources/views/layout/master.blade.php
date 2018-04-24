<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="css/blog.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
        {{-- @include('layout.header') --}}

    <div class="blog-masthead">
      <div class="container">
        @include('layout.nav')
      </div>
    </div>
      <hr>
    </div>

    @if($flash = session('message'))
      <div id="flash-message" class="alert alert-success" role="alert">
          {{ $flash }}
      </div>
    @endif
    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            Blog
          </h3>

            @yield('content')

          

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          @include('layout.sidebar')
        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </main><!-- /.container -->
    <hr>
    <div class="container">
      @include('layout.footer')
    </div>
    
  </body>
</html>
