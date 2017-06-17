@extends('layouts.master')

@section('title', 'RegisterPackage')

@section('content')

    <form class="form-horizontal" method="post"  action="{{route('PostRegister',['id'=> $id_nomber])}}">
        <fieldset>

            <div class="form-group">
                <label>Register extracted items</label>
                <label>  as a new package</label>
            </div>

            <div class="form-group">
                <label>Register extracted items</label>
                <label>{{$id_nomber}}</label>
            </div>

            <!-- Text input-->
            <div class="form-group">

                <input id="textinput" name="id" type="text" placeholder="Enter or scan shipment num" class="form-control input-md">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="filebutton">File Button</label>
                <div class="col-md-4">
                    <input id="filebutton" name="filebutton" class="input-file" type="file">
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">

                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Register</button>

            </div>



            <div class="form-group">
                <a href="{{route('find')}}" class=""><-BACK</a>
            </div>

        </fieldset>
    </form>

@endsection