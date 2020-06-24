@extends('layouts.app')
@section('content')     

  
<div >

<img src="/img/Grocery.jpg" alt="Flowers in Chania" style="height: 50%;no-repeat;background-size: cover;min-height: 100%;filter: blur(8px);-webkit-filter: blur(8px);">

<div class="w3-display-middle bg-text  " style="text-align: center">
  <div class="card bg-primary">
    <div class="card-header bg-info">
      <h4 class="card-title" style="text-align: center">User count</h4>
    </div>
    <div class="card-body">
      <h1 class="card-title"  style="text-align: center"><strong>{{$counts['user']}}</strong></h1>
    </div>
  </div>
  <div class="card bg-primary" style="margin-top:60px">
    <div class="card-header bg-info">
      <h4 class="card-title" style="text-align: center">Product count</h4>
    </div>
    <div class="card-body" style="text-align: center">
      <h1 class="card-title"><strong>{{$counts['product']}}</strong></h1>
    </div>
  </div>
</div>   
</div>

  @endsection