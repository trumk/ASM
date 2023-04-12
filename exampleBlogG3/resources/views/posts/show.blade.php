@extends('posts.app')
@section('content')
    <div class="row">
        <div class="pull-right"><a class="btn btn-primary" href={{ url('/posts') }}>Back</a></div>
        
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{-- <input type="text" name="title" value="{{old('title')}}"  placeholder="Title"/> --}}
                {{ $post->title }}
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Note:</strong>
                {{ $post->note }}

            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Select Category:</strong>
                {{-- <select name="category_id">
                    @foreach ($categories as $item)
                      <option @selected($item->id == $post->category_id) 
                       value="{{$item->id}}">{{$item->name}}</option>  
                    @endforeach
                </select> --}}

                {{ $post->category->name }}
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>description:</strong>
                {{ $post->description }}
            </div>
        </div>


    </div>
@endsection
