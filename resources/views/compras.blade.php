@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin:5px">

        @foreach ($compras as $compra)
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">{{$compra->name}}</h5>
                <p class="card-text">
                  {{ $compra->description}}
                </p>
                <p>Price:
                  {{ 
                    number_format("$compra->price","2", ",",".")
                  }} </p>
              </div>
          	</div>
        </div>
        @endforeach

        
    </div>
</div>
@endsection