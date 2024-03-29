@extends('layouts.admin')
@section('title', 'Product List')
@section('main')

    <form action="" class="form-inline">
        <div class="form-group">
            <input class="form-control" name="key" placeholder="Search by name" value="">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
    </form>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Product name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Description</th>
                <th>Name Active</th>
                <th>User Id</th>
                <th>Auction Id</th>
               
                <th class="text-right">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $model)
                <tr>
                    <td>{{ $model->id }}</td>
                    <td>{{$model->product_name}}</td>
                    <td>{{ $model->price }}</td>
                    <td>{{ $model->image }}</td>
                    <td>{{ $model->description }}</td>
                    <td>{{ $model->name_active }}</td>
                    <td>{{ $model->user_id }}</td>
                    <td>{{ $model->auction_id }}</td>
                  
                    <td class="text-right">
                        
                            
                            <a href="{{route('product.edit',$model->id)}}" class="btn btn-sm btn-success">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{route('product.destroy',$model->id)}}" class="btn btn-sm btn-danger btndelete">
                                <i class="fas fa-trash"></i>
                            </a>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <form method="POST" action="" id="form-delete">
        @csrf @method('DELETE')
    </form>
    <hr>
    <div>
        {{ $data->appends(request()->all())->links() }}
    </div>
@stop()

@section('js')
    <script>
        $('.btndelete').click(function(ev){
            ev.preventDefault();
            var _href = $(this).attr('href');
            $('form#form-delete').attr('action',_href);
            if(confirm('bạn có chắc muốn xóa nó không')){
                $('form#form-delete').submit();
            }

        })
    </script>
@stop()
