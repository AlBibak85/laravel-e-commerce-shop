@extends('admin.master')
@section('body')
<hr/>
<h3 class="text-center text-success" id="notification">{{Session::get('message')}}</h3>
<hr/>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">

                <table class="table table-bordered">

                    <tr class="bg-primary">
                        <th>Si No</th>
                        <th>Brand Name</th>
                        <th>Brand Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    @php($i=1)
                    @foreach($brands as $brand)
                    <tr>

                        <td>{{$i++}}</td>
                        <td>{{$brand->brand_name}}</td>
                        <td>{{$brand->brand_description}}</td>
                        <td>{{$brand->publication_status ==1 ? 'published':'unpublished'}}</td>
                        
                        <td>
                            @if($brand->publication_status ==1)
                            <a href="{{route('unpublished_brand',['id'=>$brand->id])}}" class="btn btn-info btn-xs">
                                <span class="glyphicon glyphicon-arrow-up"></span>
                            </a>
                            @else
                            
                            <a href="{{route('published_brand',['id'=>$brand->id])}}" class="btn btn-warning btn-xs">
                                <span class="glyphicon glyphicon-arrow-down"></span>
                            </a>
                            
                            @endif

                            <a href="{{route('edit_brand',['id'=>$brand->id])}}" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-edit"></span>
                                
                            </a>
                            <a href="{{route('delete_brand',['id'=>$brand->id])}}" class="btn btn-danger btn-xs">
                                <span class="glyphicon glyphicon-trash"></span>
                                
                            </a>
                        </td>
                        
                        

                        
                    </tr>
                    @endforeach


                </table>


            </div>
        </div>
    </div>
</div>
@endsection
