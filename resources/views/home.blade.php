<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Article Classification</title>

    <!-- Bootstrap core CSS -->
    <link href="{{URL::to('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{URL::to('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{URL::to('css/clean-blog.min.css')}}" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h2>Article Classification</h2>
                    <span class="subheading">Classify What You Need</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form method="post" action="{{URL::to('result')}}"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="read_type" id="radio1" data-id="text_type" value="1" checked>
                    <label class="form-check-label" for="radio1">
                        Read From Plain Text
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="read_type" id="radio2" data-id="file_type" value="2">
                    <label class="form-check-label" for="radio2">
                        Read From File With Extensions ( .txt | .docx )
                    </label>
                </div>
                <input type="hidden" name="token" value="{{ csrf_token() }}"/>
                <div class="form-group" id="text_type">
                    <label for="article_text">Enter Your Article</label>
                    <textarea name="article_text" class="form-control" id="article_text" rows="10" required></textarea>
                </div>
                <div class="form-group" style="display: none;" id="file_type">
                    <label for="article_file">Choose Your File</label>
                    <input type="file" name="article_file" class="form-control-file" id="article_file">
                </div>
                <button type="submit" class="btn btn-primary mb-1">Classify Article</button>
            </form>
        </div>
    </div>
</div>

<br/>

<!-- Footer -->
<footer style="background-image: url('img/footer.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                </ul>
                <p style="color: white" class="copyright">Copyright &copy; Article Classification 2019</p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{URL::to('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::to('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Custom scripts for this template -->
<script src="{{URL::to('js/clean-blog.min.js')}}"></script>

<script>
    $( document ).ready(function() {
        $('#radio1').click(function (event) {
            var id = $(this).data('id');
            $('#' + id).css('display', 'block');
            $('#file_type').css('display', 'none');
            $('#article_text').prop('required',true);
            $('#article_file').prop('required',false);
        });

        $('#radio2').click(function (event) {
            var id = $(this).data('id');
            $('#' + id).css('display', 'block');
            $('#text_type').css('display', 'none');
            $('#article_text').prop('required',false);
            $('#article_file').prop('required',true);
        });
    });
</script>

</body>

</html>
