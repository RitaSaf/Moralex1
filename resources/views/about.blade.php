@extends('Layout.app')


@section('pageTitle')
{{config('app.name')}}
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
                    <li class="nav-item"><a class="nav-link " aria-current="page" href="{{route('index')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{route('about')}}">About</a></li>
    
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
                <h1 class="display-4 fw-bolder">About Us</h1>
                
            </div>
        </div>
    </header>

    <div class="container mt-5 text-center" style=" font-size:20px">
        <b style=" font-size:25px">Who we are?</b>
        <p >We are Ameer and Rita, a couple from Majdal Shams Golan Heights.</p>
        <p>We are students, and as every student know, we always suffer financially,</p>
        <p> and that's when we came with the idea of making a small shop in order to end the suffering.</p>
        <br>
        <b style=" font-size:25px">What we sell?</b>
        <p>We sell Player Version & Fan Edition Jerseys, Retro Jerseys, Wind Breakers and Training Kits!</p>
           <p>Men | Women | Kids</p>
        <p> you can surprise your partner,your son or your daughter with a kit for their favorite football club team </p>
        <br>
        <b style=" font-size:25px">Contact us:</b>
        <p>for more information, you can call us : </p>
        <b>Rita</b>: 0505735474 </p>
        <b>Ameer</b>: 0526663052 </p>
        <p> or you can visit us on our<b> Instgram </b> page <a href="https://www.instagram.com/moralex.wear11/" target="_blank">Moralex</a></p>
    </div>


</body>