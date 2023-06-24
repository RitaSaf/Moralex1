@extends('Layout.app')


@section('pageTitle')
{{config('app.name')}}
Shopping Cart
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
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('index')}}">Home</a></li>
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
                <h1 class="display-4 fw-bolder">Shopping Cart</h1>
            </div>
        </div>
    </header>
    <!-- Section-->

    <section class="py-5">

        <div class="container">
            <div class="col-md-4">
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('success')}} 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                 @endif
            </div>
    
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">QTY</th>
                    <th scope="col">Size</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($cart as $product)
                  <tr>
                    <th scope="row">{{$loop->index + 1}}</th>
                    <td>{{App\Models\Product::where('id',$product->product)->value('title')}}</td>
                    <td>{{App\Models\Product::where('id',$product->product)->value('price') - App\Models\Product::where('id',$product->product)->value('discount')}}₪</td>
                    <td>
                        <form action="{{route('cart.update_qty',$product->id)}}" method="post"> 
                            @csrf
                        <div class="row">
                            <div class="col-md-4">
                            <!--QTY-->
                                <input type="number" name="qty" class="form-control mt-2 mb-2" value="{{$product->qty}}" min="1" max="12">
                                <form action="{{route('cart.update_qty',$product->id)}}" method="post"> 
                                    @csrf
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                            </div>
                        </div>
                    </td>
                    <td>
                     {{$product->size}}
                    </td>
                    
                    <td>
                        <form action="{{route('cart.delete_product',$product->id)}}" method="post"> 
                            @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
        </div>
        @if($cart->count() > 0)
        <div class="text-center">
            <form action="{{route('cart.checkout')}}" method="POST">
                @csrf
                 <button type="submit" class="btn btn-primary">Checkout</button>
            </form>
        </div>
        @endif
       
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