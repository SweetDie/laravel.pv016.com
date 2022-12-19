@extends('products.layout')

<!-- В layout полі 'content' записуємо код що написаний в блоці section -->
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 9 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <!-- Кнопка Create New Product викликає метод 'create' контроллера 'products' -->
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->detail }}</td>
                <td>
                    <!-- Форма екшенів продуктів -->
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                        <!-- Кнопка Show викликає метод 'show' контроллера 'products' та передає ід продукту -->
                        <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                        <!-- Кнопка Edit викликає метод 'edit' контроллера 'products' та передає ід продукту -->
                        <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <!-- Кнопка Delete виконує submit форми, та свою чергу викликає метод 'destroy' контроллера 'products' та передає ід продукту -->
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->links() !!}

@endsection
