@extends('...layouts.dashboard')
@section('content')
<div class="row" id="divCreateProductCategory">
     <div class="modal fade add-category" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Add Product Category</h4>
                    </div>
                    <div class="panel-body">
                        {{Form::open(['url'=>'/products/category/create','role'=>'form'])}}
                            <div class = "form-group">
                                {{Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name'])}}
                                {{ $errors->first('name', '<span class=errormsg>*:message</span>') }}
                            </div>
                            {{Form::submit('Create', ['class'=>'btn btn-primary'])}}
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="modal fade add-product" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Add Product</h4>
                    </div>
                    <div class="panel-body">
                        {{Form::open(['url'=>'/products/create','role'=>'form', 'files'=>true])}}
                            <div class = "form-group">
                                {{Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name'])}}
                                {{ $errors->first('name', '<span class=errormsg>*:message</span>') }}
                            </div>
                             <div class = "form-group">
                                {{Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Description'])}}
                                {{ $errors->first('description', '<span class=errormsg>*:message</span>') }}
                            </div>
                            <div class = "form-group">
                                {{Form::text('price', null, ['class'=>'form-control', 'placeholder'=>'Price'])}}
                                {{ $errors->first('price', '<span class=errormsg>*:message</span>') }}
                            </div>
                            <div class = "form-group">
                                {{Form::select('category', $category, null, ['class' => 'form-control'])}}
                                {{ $errors->first('category', '<span class=errormsg>*:message</span>') }}
                            </div>
                             <div class = "form-group">
                                <span><b>Featured Product</b></span>
                                {{Form::select('featured', $featured, null, ['class' => 'form-control'])}}
                                {{ $errors->first('featured', '<span class=errormsg>*:message</span>') }}
                            </div>
                            <div class = "form-group">
                                 {{ Form::label('file','File',array('id'=>'','class'=>'form-control')) }}
                                 {{ Form::file('files[]', ['multiple' => true, 'accept'=>'image/*'],array('id'=>'','class'=>'form-control')) }}
                                 {{ $errors->first('files[]', '<span class=errormsg>*:message</span>') }}
                            </div>
                            {{Form::submit('Create', ['class'=>'btn btn-primary'])}}
                        {{Form::close()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h4 class="pull-left">Products</h4>
                <span class="pull-right">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".add-category">Add Category</a>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".add-product">Add Product</a>
                </span>
            </div>
            <div class="panel-body">
                @if(count($products))
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Featured</th>

                            </tr>
                        </thead>
                        <tbody>
                           @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td><img src="{{$product->image}}" class="img-responsive" style="width:auto; height:50px;"> </td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{($product->featured_id == '1') ? 'Yes' : 'No'}}</td>

                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info"><i class="fa fa-info fa-fw margin-top-sm"></i>No Product yet.</div>
                @endif
            </div>
        </div>
    </div>
</div>

@stop