
@extends('admin.components.layouts')

@section('title')
Create Categories
@endsection


@section('content')

<div class="container m-5">
<h4 class="text-center m-2">Edit Category</h4>

    <table>
        <tr>
            <td>Name</td>
            <td>{{$category->name}}</td>
        
        
        </tr>



    </table>



</div>




@endsection