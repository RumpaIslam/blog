
@extends('admin.components.layouts')

@section('title')
view Categories
@endsection


@section('content')

<div class="container m-5">
    <h4 class="text-center m-5">View Category</h4>

    <table class="table table-bordered" >
        <tr>
            <th>{{$post->title}}</th>
            <td>{{ $post->desc }}</td>
        </tr>
        
    </table>

</div>




@endsection