@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin:5px">
      <a href="{{ route('form')}}" class="btn btn-primary">Adicionar Mercadoria</a>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Description</th>
              <th>Price</th>
              <th>Quanty</th>
              <th>Acões</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($compras as $compra)
               <tr>
                <td>{{$compra->id}}</td>
                <td>{{$compra->name}}</td>
                <td>{{$compra->description}}</td>
                <td>{{ number_format($compra->price, 2,",",".")}}</td>
                <td>{{$compra->quanty}}</td>
                <th>
                <a class="btn btn-danger" href="{{ route('delete', $compra->id) }}">Deletar</a>
                <a class="btn btn-success" href="{{ route('update', $compra->id) }}">Editar</a></th>
               </tr>
            @endforeach
            
          </tbody>
        </table>  
        {{ $compras->links()}}
           <br>
           <br>
            <h6>
            Quantidade de Produtos: {{ $count }} 
            <br>
            Soma: {{ $soma }} 
           </h6>

        
    </div>
</div>
@endsection
