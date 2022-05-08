@extends('product.layout')

@section('content')

<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Ajouter Produit</h1>
      <p class="lead">-------------------------------------------------------</p>
    </div>
  </div>

<div class="container">
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Nom</label>
      <input type="text" name="name" class="form-control"  placeholder="Nom de Produit">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Prix</label>
        <input type="text" name="price" class="form-control"  placeholder="Prix de Produit">
      </div>
    
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description</label>
      <textarea name="detail" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group">
    <button type="submit" class="btn btn-success">  --  Aouter --  </button>
    </div>
  </form>

</div>
@endsection