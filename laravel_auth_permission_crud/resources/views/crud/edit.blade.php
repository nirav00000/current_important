

@extends("layouts.app")

@section('content')

<div class="col-md-12">


        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{$error}} <br/>
                </div>
            @endforeach
        @endif


</div>




<div class="col-md-12">


    <form action="{{ route('crud.update',$crud->id) }}" method="POST">

        <div class="col-md-6">
            <div class="form-group">
                <input type="text"
                value ="{{ old() ? old('title1') : $crud->title1  }}
                " name="title1" class="form-control">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <input type="text" value ="{{$crud->title2}}" name="title2" class="form-control">
            </div>

        </div>


        @csrf
        @method('PUT')

        <button type="submit" class="btn btn-danger">Update</button>
    </form>

</div>


@endsection
