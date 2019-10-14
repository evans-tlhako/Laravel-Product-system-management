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
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" id="orderslink" onclick="Orders()">
                  <span data-feather="file"></span>
                  Orders
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="Products()">
                  <span data-feather="shopping-cart"></span>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="Customers()">
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
                <button class="btn btn-sm btn-outline-secondary" style="background-color: green;color: white;" onclick="addnew()">Add New Product</button>
              </div>
            </div>
          </div>
          @include('inc.messages')
         <!--<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
         <div id="Orders" name="Orders" style="display:none">
         <h2>Orders</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>price</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
                 
                  @if(count($orders) > 0)
                    @foreach ( $orders as $product )
                    <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->Name }}</td>
                    <td>{{ $product->Price }}</td>
                    <td>{{ $product->Email }}</td>
                    </tr>
                    @endforeach
                  @else
                  <tr>
                    <td>
                      <div class="btn-group mr-2">
                          <p>No Products found<p/>
                      </div>
                    </td>
                  </tr>
                  @endif
                
              </tbody>
            </table>
          </div>
         </div>
         <div id="Customers" name="Customers" style="display:none">
         <h2>Customers</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
                 
                  @if(count($orders) > 0)
                    @foreach ( $orders as $product )
                    <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->Email }}</td>
                    </tr>
                    @endforeach
                  @else
                  <tr>
                    <td>
                      <div class="btn-group mr-2">
                          <p>No Products found<p/>
                      </div>
                    </td>
                  </tr>
                  @endif
                
              </tbody>
            </table>
          </div>
          
         </div>
          <div id="products" name="products" style="display:none">
          <h2>Products</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>name</th>
                  <th>sku</th>
                  <th>price</th>
                  <th>description</th>
                  <th>view</th>
                </tr>
              </thead>
              <tbody>
                
                 
                  @if(count($products) > 0)
                    @foreach ( $products as $product )
                    <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->Name }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->Price }}</td>
                    <td>{{ $product->Description }}</td>
                    <td>{{ $product->viewcount }}</td>
                    <td>
                      <div class="btn-group mr-2">
                          <a href="/products/{{ $product->id }}/edit"><button class="btn btn-sm btn-outline-secondary" >Update</button></a>
                            {!!Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                              {{Form::hidden('_method', 'DELETE')}}
                              {{Form::submit('Delete', ['class' => 'btn btn-sm btn-outline-secondary'])}}
                            {!!Form::close()!!}
                            <a href="/products/{{ $product->id }}"><button class="btn btn-sm btn-outline-secondary" >View</button></a>
                      </div>
                    </td>
                    </tr>
                    @endforeach
                  @else
                  <tr>
                    <td>
                      <div class="btn-group mr-2">
                          <p>No Products found<p/>
                      </div>
                    </td>
                  </tr>
                  @endif
                
              </tbody>
            </table>
          </div>
         
          </div>
          
          <div id="addproduct">
          <h2>Add New Product</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
                    {!! Form::open(['action' => 'ProductsController@store','method' => 'POST']) !!}
                    <div class="form-group">
                      {{ Form::label('Name','Name') }}
                      {{  Form::text('Name','',['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                      {{ Form::label('sku','sku') }}
                      {{  Form::text('sku','',['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                      {{ Form::label('Price','Price') }}
                      {{  Form::text('Price','',['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                      {{ Form::label('Description','Description') }}
                      {{  Form::textarea('Description','',['class'=>'form-control']) }}
                    </div>
                    {{ Form::submit('submit',['class'=>'btn btn-primary']) }}
                    {!! Form::close() !!}     
            </table>
          </div>
          <div>
         
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
            function Orders() {
              document.getElementById("products").style.display = "none";
               document.getElementById("Orders").style.display = "block";
               document.getElementById("Customers").style.display = "none";
               document.getElementById("addproduct").style.display = "none";
            }
            function Products() {
               document.getElementById("products").style.display = "block";
               document.getElementById("Orders").style.display = "none";
               document.getElementById("Customers").style.display = "none";
               document.getElementById("addproduct").style.display = "none";
            }
            function Customers() {
              document.getElementById("products").style.display = "none";
               document.getElementById("Orders").style.display = "none";
               document.getElementById("Customers").style.display = "block";
               document.getElementById("addproduct").style.display = "none";
            }
            function addnew() {
              document.getElementById("products").style.display = "none";
               document.getElementById("Orders").style.display = "none";
               document.getElementById("Customers").style.display = "none";
               document.getElementById("addproduct").style.display = "block";
            }
      
    </script>
@endsection