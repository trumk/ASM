@extends('posts.app')
@section('content')
<div class="row">
    <div class="pull-right"><a class="btn btn-primary" href={{ url('/posts') }}>Back</a></div>
    
</div>
<form action="{{route('posts.update',$post->id)}}" method="POST">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{-- <input type="text" name="title" value="{{old('title')}}"  placeholder="Title"/> --}}
                <input type="text" name="title" value="{{$post->title}}" placeholder="Title"/>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Note:</strong>
                {{-- <input type="text" name="note"  value="{{old('note')}}"  placeholder="Note"/> --}}
                <input type="text" name="note" value="{{$post->note}}"   placeholder="Note"/>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Select Category:</strong>
                <select name="category_id">
                    @foreach ($categories as $item)
                      <option @selected($item->id == $post->category_id) 
                       value="{{$item->id}}">{{$item->name}}</option>  
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>description:</strong>
                {{-- <input type="description" name="description"  value="{{old('description')}}"  placeholder="description"/> --}}
                <input type="description" name="description" value="{{$post->description}}"    placeholder="description"/>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <button type="submit">Submit</button>
        </div>
        
    </div>
</form>

@endsection