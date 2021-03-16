
@extends('admin.components.layouts')

@section('title')
view Categories
@endsection


@section('content')

<div class="container m-5">
    <h4 class="text-center m-2">View Category</h4>

    <table class="table table-bordered" >
        <tr>
            <th>Name</th>
            <td>{{ $category->name }}</td>
        </tr>



    </table>



</div>




@endsection