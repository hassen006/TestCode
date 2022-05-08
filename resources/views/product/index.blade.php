@extends('product.layout')

@section('content')

<div class="jumbotron container">
    <h1 class="display-4">SUPERMARKET PRODUITS </h1>
    <hr class="my-4">
    <a class="btn btn-primary btn-lg"  href="{{ route('products.create') }}" role="button">Ajouter Produit</a>
</div>

  <div class="container"> 
    @if ($message = Session::get('success'))
     
    <div class="alert alert-primary" role="alert">
        {{ $message }}
      </div>

    @endif
    

  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom  </th>
        <th scope="col">Prix</th>
        <th scope="col">Description</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @php
            $i = 0;
        @endphp

        @foreach ($products as $item)
 
      <tr>
        <th scope="row">{{ ++$i }}</th>
        <td>{{  $item->name }}</td>
        <td>{{  $item->price }} dt
        </td>
        <td>{{  $item->detail }}</td>
        <td>
            <div class="container">
                <div class="row">
                  <div class="col-sm">
                    <a href="{{ route('products.edit',$item->id )}}" class="btn btn-success">Modifier</a>
                  </div>
                  <div class="col-sm">
                    <a href="{{ route('products.show',$item->id )}}" class="btn btn-primary">Afficher</a>
                </div>
                  <div class="col-sm">
                    <form action="{{ route('products.destroy',$item->id )}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <BUtton type="submit" class="btn btn-danger">Supprimer</BUtton>
                        </form>
                  </div>
                </div>
              </div>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {!! $products->links() !!}
  </div>
@endsection