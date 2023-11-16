<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>FunTune</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('css/music.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body class="">
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container d-flex justify-content-between">
                <div class="d-flex">
                    <a class="navbar-brand" href="#!">FunTune</a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
                           
                        </ul>
                     
                    </div>
                   
                       
               
                </div>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center list-unstyled" >
                        <li class="nav-item me-1">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Find you song" aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Tìm</button>
                            </div>
                        </li>
                        @if (auth()->check())

                        <li class=" nav-item me-1"> <a href="" class="unlink"><span>Xin chào {{auth()->user()->name}}</span> <i class="fa-solid fa-user-tie"></i></a> </li>
                        @else
                        <li class=" nav-item me-1"> <a href="" class="unlink"><span>Đăng nhập</span> <i class="fa-solid fa-user-tie"></i></a> </li>

                        <li class=" nav-item me-1"> <a href="" class="unlink"><span>Đăng Ký</span> <i class="fa-solid fa-user-tie"></i></a> </li>
                        @endif
                        
                       
                       
                    </ul>
                </div>
                <i class="fa-solid fa-user-tie"></i>
               
               
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                
            </div>
        </nav>
        
        <!-- Page content-->
        <div class="mt-5" style="margin:50px">
            {{$slot}}
        </div>
              
                
       
        <!-- Footer-->
        <footer class="py-5 bg-dark ">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/scripts.js')}}"></script>
    </body>
</html>
