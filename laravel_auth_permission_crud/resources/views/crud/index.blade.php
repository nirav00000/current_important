

@extends("layouts.app")

@section('content')

<div class="col-md-12">

        @if($message = Session::get('success') )
            <div class="alert alert-success">
                {{$message}}
            </div>

        @endif

        @if($errors->any())
            @foreach($error as $error)
                <div class="alert alert-danger">
                    {{$error}} <br/>
                </div>
            @endforeach
        @endif


</div>




<div class="col-md-12">
    <div class="float-left">
        <a class="btn btn-primary" href="{{route("crud.create")}}">add new entry</a>
    </div>

    <table class="table table-bordered">
        <tr>
            <th> id </th>
            <th> title1 </th>
            <th> title2 </th>
        </tr>

        @foreach($data as $row)
        <tr>
            <td> {{$row->title1}} </td>
            <td> {{$row->title2}} </td>
            <td>
                <form action="{{ route('crud.destroy',$row->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$row->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('crud.edit',$row->id) }}">Edit</a>


                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>

        </tr>

        @endforeach



    </table>

</div>


@endsection
