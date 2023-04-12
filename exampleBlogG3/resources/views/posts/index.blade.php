@extends('posts.app')
@section('content')
<div class="row">
    <div class="pull-right">
        <a class="btn btn-primary" href="{{route('posts.create')}}">Create new</a>
    </div>

</div>
<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Category</th>
       
        <th>Action</th>
    </tr>
    @foreach ($posts as $post)
    <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->category->name}}</td>
        <td>
            <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                <a class="btn btn-info" href="{{route('posts.show',$post->id)}}">Show</a>
                <a class="btn btn-info" href="{{route('posts.edit',$post->id)}}">Edit</a>
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Delete</button>
            </form>
        </td>
    

    </tr> 
    @endforeach
    
</table>

@endsection