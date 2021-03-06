@extends("layouts.master")
<style>
  .pagination li{
      padding : 10px 15px;
      border: 2px black;
      background: #ddd;
      margin-right: 1px;
  }
  #edit-cat{
    cursor: pointer;
  }
</style>

@section("content")
@include("layouts.nav")
{{ \App\Classes\Session::flash('success') }}

<div class="container mt-5">

@include("layouts.report_message")
    <div class="row">
    <div class="col-md-4">
        <ul class="list-group">
            <li class="list-group-item"><a href="<?php echo URL_ROOT . 'admin/category/create' ?>">Create Category</a></li>
            <li class="list-group-item"><a href="<?php echo URL_ROOT . 'admin/product/create' ?>">Create Product</a></li>
            <li class="list-group-item"><a href="<?php echo URL_ROOT . 'admin/product/home' ?>">All Products</a></li>
        </ul>
    </div>
        <div class="col-md-6 offset-md-1">
            <div class="card p-3">
                <h2 class="text-center text-info mb-4">Create Category</h2>
                <form action="<?php echo URL_ROOT . 'admin/category/create'?>" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                    <button class="btn btn-primary ml-auto d-flex">Create</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6 offset-md-5">
        <h2>Categories</h2>
            <ul class="list-group">   
                @foreach($cats as $cat)            
                    <li class="list-group-item">
                    {{$cat->name}}
                        <span class="float-right">
                            <i class="fa fa-plus text-primary" style="cursor: pointer;" onClick="showSubCat('{{$cat->name}}','{{$cat->id}}')"></i>
                            <i id="edit-cat" class="fa fa-edit text-warning" onClick="func('{{$cat->name}}','{{$cat->id}}')"></i>
                            <a href="{{$cat->id}}/delete"><i class="fa fa-trash text-danger"></i></a>
                        </span>
                    </li>
                @endforeach
            </ul>
            <div class="mt-5"></div>
            {!! $pages !!}
        </div>

    </div>

    <div class="row mt-4">
        <div class="col-md-6 offset-md-5">
            <ul class="list-group">
            <h2>Sub Categories</h2>
                @foreach($subcats as $cat)            
                    <li class="list-group-item">
                    {{$cat->name}}
                        <span class="float-right">
                            <i id="edit-cat" class="fa fa-edit text-warning" onClick="subCatEdit('{{$cat->name}}','{{$cat->id}}')"></i>
                            <a href="{{$cat->id}}/delete"><i class="fa fa-trash text-danger"></i></a>
                        </span>
                    </li>
                @endforeach
            </ul>
            <div class="mt-5"></div>
            {!! $subpages !!}
        </div>

    </div>
</div>

<!-- Cat Edit -->
<div class="modal" tabindex="-1" id="CatUpModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      <form>
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" id="edit-name" required class="form-control">
          </div>
          <input type="hidden" id="edit-id">
          <input type="hidden" name="token" id="edit-token" value="{{ \App\Classes\CSRFToken::_token() }}">
          <button class="btn btn-primary ml-auto d-flex" onClick="startEdit(event)">Update</button>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- SubCat Create -->
<div class="modal" tabindex="-1" id="CreateSubCatModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      <form>
          <div class="form-group">
              <label for="name">Parent Category</label>
              <input type="text" disabled required class="form-control" id="parent-cat-name">
          </div>
          <div class="form-group">
              <label for="name">SubCategory</label>
              <input type="text" required class="form-control" id="subcat-name">
          </div>
          <input type="hidden" id="parent-cat-id">
          <input type="hidden" id="subcat-token" value="{{ \App\Classes\CSRFToken::_token() }}">
          <button class="btn btn-primary ml-auto d-flex" onClick="createSubCat(event)">Create</button>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" id="EditSubCatModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      <form>
          <div class="form-group">
              <label for="name">Parent Category</label>
              <input type="text" required class="form-control" id="edit-subcat-name">
          </div>
          <input type="hidden" id="edit-subcat-id">
          <input type="hidden" id="edit-subcat-token" value="{{ \App\Classes\CSRFToken::_token() }}">
          <button class="btn btn-primary ml-auto d-flex" onClick="updateSubCat(event)">Update</button>
      </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section("script")
<script>
    function func(name, id){
        $('#CatUpModal').modal('show');
        $('#edit-name').val(name);  
        $('#edit-id').val(id); 
    }
    function startEdit(e) {
      e.preventDefault();
      name = $('#edit-name').val();
      token = $('#edit-token').val();
      id = $('#edit-id').val();

      $('#CatUpModal').modal('hide');
      $.ajax({
        type: 'POST',
        url:  '{{URL_ROOT}}admin/category/'+id+'/update',
        data: {
            id: id,
            name: name,
            token: token
        },
        success: function(result) {
            window.location.href= "{{URL_ROOT}}admin/category/create";
        },
        error: function(response, error){
            alert(JSON.parse(response.responseText) . name);
        }
      })
    }

    // Create Sub Cat
    function showSubCat(name, id) {
        
        $('#CreateSubCatModal').modal('show');
        $('#parent-cat-name').val(name);
        $('#parent-cat-id').val(id);
    }
    function createSubCat(e) {
        e.preventDefault();
        name = $('#subcat-name').val();
        cat_id = $('#parent-cat-id').val();
        token = $('#subcat-token').val();
        // $('#CreateSubCatModal').modal('hide');
        console.log(name + cat_id + token);
        $.ajax({
        type: 'POST',
        url:  '{{URL_ROOT}}admin/subcategory/create',
        data: {
            name: name,
            cat_id: cat_id,
            token: token
        },
        success: function(result) {
            window.location.href= "{{URL_ROOT}}admin/category/create";
        },
        fail: function(error, response) {
            alert(JSON.parse(response.responseText) . name);
        }
      });
    }

    // Edit Sub Cat
    function subCatEdit(name, id) {
        $('#EditSubCatModal').modal('show');
        $('#edit-subcat-name').val(name);
        $('#edit-subcat-id').val(id);
    }
    function updateSubCat(e) {
        e.preventDefault();
        name = $('#edit-subcat-name').val();
        id = $('#edit-subcat-id').val();
        token = $('#edit-subcat-token').val();
        $('#EditSubCatModal').modal('hide');
        $.ajax({
        type: 'POST',
        url:  '{{URL_ROOT}}admin/subcategory/update',
        data: {
            id: id,
            name: name,
            token: token
        },
        success: function(result) {
            window.location.href= "{{URL_ROOT}}admin/category/create";
            console.log("result is " + result);
        },
        error: function(response, error){
            alert(JSON.parse(response.responseText) . name);
        }
      })
    }
</script>


@endsection