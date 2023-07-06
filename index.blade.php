<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laravel Crud </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    
    <nav class="navbar navbar-expend-sm bg-dark ">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="/" class="nav-link text-light">products</a>
            </li>
        </ul>
    </nav>

    @if($massage =Session::get('success'))
    <div class="alert alert-success alert-block" >
        <strong>{{$massage}}</strong>
    </div>
    @endif
    <div class="container">
        <div class="text-right ">
            <a href="products/create" class="btn btn-dark mt-3">new product</a>
        </div>
        <table class=" table table-hover mt-3">
            <thead>
                <tr>
                    <th>s.no</th>
                    <th>name</th>
                    <th> description</th>
                    <th>image </th>
                    <th>Action </th>
                </tr>

            </thead>
            <tbody>
                @foreach($product as $product)
                <tr>
                     <td>{{$loop->index+1}}</td>
                     <td><a href="products/{{$product->id}}/show" class="text-dark">{{$product->name}}</a></td>
                     <td>
                        <img src="products/{{$product->image}}" class="rounded-circle" width="50" height="50" alt="" srcset=""/>
                     </td>
                     <td>
                        <a href="products/{{$product->id}}/edit" class="btn btn-info btn-sm">edit</a>
                       <a href="products/{{$product->id}}/delete" class="btn btn-danger btn-sm">delete</a> 
                       <form action="products/{{$product->id}}/delete " method="post" class="d-inline">
                        @csrf 
                        @method{{'DELETE'}}
                        <button type="submit " class="btn btn-danger ">delete </button>
                       </form>

                     </td>
                </tr>
            </tbody>
           
        </table>
        {{$products->links()}}
     
    </div>
    </body>
</html>