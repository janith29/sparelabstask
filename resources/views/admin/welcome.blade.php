@extends('layouts.app')
@section('content')     

  
<div >

<img src="/img/Grocery.jpg" alt="Flowers in Chania" style="height: 100%;no-repeat;background-size: cover;min-height: 100%;filter: blur(8px);-webkit-filter: blur(8px);">
<div class="w3-display-middle bg-text" >
  <div class="card bg-primary">
    <div class="card-header bg-info">
      <h4 class="card-title" style="text-align: center">User count</h4>
    </div>
    <div class="card-body">
      <h4 class="card-title"  style="text-align: center">{{$counts['user']}}</h4>
    </div>
  </div>
  <div class="card bg-primary" style="margin-top:60px">
    <div class="card-header bg-info">
      <h4 class="card-title" style="text-align: center">Product count</h4>
    </div>
    <div class="card-body" style="text-align: center">
      <h4 class="card-title">{{$counts['product']}}</h4>
    </div>
  </div>
</div>   
</div>

  @endsection