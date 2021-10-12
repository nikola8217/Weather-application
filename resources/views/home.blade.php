@extends('layouts.app')

@section('content')

   

    @guest
    <header class="py-5" style="margin-bottom: 333px;">
        <div class="container px-lg-5" >
            <div class="p-4 p-lg-5 rounded-3 text-center" style="background: #5a5d61;  border-radius:30px; opacity:0.8">
                <div class="m-4 m-lg-5">
                   
                    <p class="fs-4" style="color: #FFF;font-size: 42px;text-shadow: 3px 6px rgba(0, 0, 0, 0.25);border-radius: 16px;">
                        Ulogujte se kako bi videli vremesku prognozu!
                    </p>
                    <br>
                    <a class="btn btn-primary btn-lg" href="{{ route('login') }}">Login</a>
                </div>
            </div>
        </div>
    </header>
    @endguest

    @auth
    <header class="py-5">
        <div class="container px-lg-5" style="margin-bottom: 469px;" >
            <div class="p-4 p-lg-5  rounded-3 text-center" style="background: #5a5d61;  border-radius:30px; opacity:0.8">
                <div class="m-4 m-lg-5" >
                   
                    <h2 style="color: #FFF;font-size: 52px;text-shadow: 3px 6px rgba(0, 0, 0, 0.25);border-radius: 16px;">
                        Dobrodosli {{ Auth::user()->name }}
                    </h2><br>

                    <div id="app">
                    
                        <vreme-component></vreme-component>
                    
                </div>
                </div>
            </div>
        </div>

        
    </header>
    

        
    
   
    @endauth
     
     
    
    

   

  


@endsection
