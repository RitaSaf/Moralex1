@extends('Layout.app')


@section('pageTitle')
{{config('app.name')}}
{{$product->title}}
@endsection


@section('body')
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="{{route('index')}}">{{config('app.name')}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page"href="{{route('index')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('about')}}">About</a></li>
                </ul>
                    <a href="{{route('cart.index')}}" class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">{{$cart->count()}}</span>
                   </a>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">{{$product->title}}</h1>
                <p class="lead fw-normal text-white-50 mb-0">{{$product->description}}</p>
            </div>
        </div>
    </header>
    <!-- Section-->

    <section class="py-5">

        <div class="container">
            <div class="row">
                <div class="col-md-6">  <img class="card-img-top" src="{{$product->image}}" alt="..." /></div>
                <div class="col-md-6">
                    <label style="color:#6B5; font-size:30px">Price : </label>
                    <br>
                    <b style="color:Black; font-size:20px">@if($product->discount > 0) <del>{{$product->price}} ₪</del> @endif  <br>{{$product->price - $product->discount}} ₪</b>
                    <br>
                    <br>
                    <form action="{{route('cart.add_to_cart',$product->id)}}" method="post"> 
                        @csrf
                        <div class="col-md-4">
                          <label style="color:#6B5; font-size:30px">QTY : </label>
                          <input style="border:4px solid Black;" type="number" name="qty" class="form-control mt-2 mb-2" value="1" min="1" max="12">
                        </div>
                        <br>
                        <div class="col-md-4">
                          <label style="color:#6B5; font-size:30px" >Size : </label>
                          <br>
                          <select style="font-size:20px; border:4px solid Black;" class="form-control mt-2 mb-2" name="size" required>
                            <option value="">Select</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                          </select>
                        </div>
                         <br>
                         <br>
                        <button type="submit" class="btn btn-outline-dark mt-auto" style="border:2px solid Black;">Add to cart</button>
                    </form>
                
                </div>
            </div>
        </div>
       
    </section>


    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
@endsection