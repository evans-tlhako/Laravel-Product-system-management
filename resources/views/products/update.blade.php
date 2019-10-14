@extends('layout.app')

@section('content')
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Product System Management</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="/">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="/Dashboard">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">
                  <span data-feather="file"></span>
                  Orders
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">
                  <span data-feather="shopping-cart"></span>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary" style="background-color: green;color: white;">Add New Product</button>
              </div>
            </div>
          </div>
          @include('inc.messages')
          <h2>Update Product</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
                    {!! Form::open(['action' => ['ProductsController@update',$product->id],'method' => 'POST']) !!}
                    <div class="form-group">
                      {{ Form::label('Name','Name') }}
                      {{  Form::text('Name',$product->Name,['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                      {{ Form::label('sku','sku') }}
                      {{  Form::text('sku',$product->sku,['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                      {{ Form::label('Price','Price') }}
                      {{  Form::text('Price',$product->Price,['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                      {{ Form::label('Description','Description') }}
                      {{  Form::textarea('Description',$product->Description,['class'=>'form-control']) }}
                    </div>
                    {{ Form::hidden('_method','PUT') }}
                    {{ Form::submit('Update',['class'=>'btn btn-primary']) }}
                    {!! Form::close() !!}     
            </table>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
@endsection