@extends('layouts.app')
@section('content')     

<div class="row margintop" >
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
    @if(Session::has('message'))
      <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    @if(Session::has('editmessage'))
    <div class="alert alert-warning">
      {{ Session::get('editmessage') }} 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Product name</h5>
            <h3>  <strong> {{$product->name}}</strong> </h3>
          
        </div>
        <div class="card-body">
            <div class="text-center">
                <img src="/image/product/{{$product->image}}" class=" img-thumbnail rounded" alt="{{$product->name}}" width="500" height="600">
            </div>
        <div class="card "style="margin-top:10px">
            <h5 class="card-title">Product price:- <strong> Rs.{{number_format($product->price, 2)}}</strong></h5>
        </div>
        <div class="card "style="margin-top:10px">
            <h5 class="card-title">Product discription:-</h5>
            <p class="card-text"><strong> {{$product->discription}}</strong> </p>
        </div>
        </div>
        <div class="card-footer">
            <a href="/admin/product" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Go Back</a>

            <button class="btn btn-xs btn-warning" data-productname="{{$product->name}}" data-productdiscription="{{$product->discription}}" data-productprice="{{$product->price}}" data-productid="{{$product->id}}"  data-toggle="modal" data-target="#editproduct" >
                <i class="fa fa-pencil"></i>
              </button>
              <button class="btn btn-xs btn-danger"  data-productname="{{$product->name}}" data-productprice="{{$product->price}}" data-productid="{{$product->id}}"  data-toggle="modal" data-target="#deleteproduct" >
                <i class="fa fa-trash"></i>
              </button>
        </div>

      </div>
  </div>
<div class="col-sm-3"></div>
</div>

<div class="modal fade" id="editproduct" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="productModalLabel">Edit User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.product.update')}}" method="POST"  enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="productname" class="col-form-label">Product Neme:</label>
              <input type="text" class="form-control"name="productname" id="productname" required>
            </div>
            <div class="form-group">
              <label for="productprice" class="col-form-label">Product Price:</label>
              <input type="number" class="form-control" name="productprice" id="productprice"  min="0"  step=".01" required>
            </div>
  
            <div class="form-group">
              <label for="productdiscription" class="col-form-label">Product Discription:</label>
              <textarea name="productdiscription" id="productdiscription"  class="form-control" min="0"  step="10" required></textarea>
            </div>
            <input type="hidden" name="productid"  id="productid" >
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button  type="submit"   class="btn btn-success">Edit Product</button>
        </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="deleteproduct" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h5 class="modal-title" id="productModalLabel">Edit Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
          <form action="{{route('admin.product.delete')}}" method="POST"  enctype="multipart/form-data">
            {{ csrf_field() }}
  
            <h3 class="text-white"> Do you want to delete? </h3> <h3 >
              <span class="text-white">Product ID:</span>  <strong><span id="productDeleteid"></span></strong>
             </h3>
             <h3 >
               <span class="text-white">Product name:</span> <strong><span id="productDeletename"></span></strong>
             </h3>
            <input type="hidden" name="productid"  id="productid" >
  
        </div>
        <div class="modal-footer bg-warning">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button  type="submit"   class="btn btn-danger">Delete Product</button>
        </div>
          </form>
      </div>
    </div>
  </div>
  <script>
    $('#editproduct').on('shown.bs.modal', function (event) {
      var button=$(event.relatedTarget)
      var productid=button.data('productid')
      var productname=button.data('productname')
      var productprice=button.data('productprice')
      var productdiscription=button.data('productdiscription')
      console.log(productname)
      var modal=$(this)
      modal.find('.modal-body #productid').val(productid)
      modal.find('.modal-body #productname').val(productname)
      modal.find('.modal-body #productprice').val(productprice)
      modal.find('.modal-body #productdiscription').val(productdiscription)
  
  })
    
  $('#deleteproduct').on('shown.bs.modal', function (event) {


var button=$(event.relatedTarget)
var productid=button.data('productid')
var productname=button.data('productname')
document.getElementById("productDeleteid").innerHTML =productid;
document.getElementById("productDeletename").innerHTML =productname;

var productid=button.data('productid')
var modal=$(this)
modal.find('.modal-body #productid').val(productid)

})
  </script>
  @endsection