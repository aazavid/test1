@extends('layouts.master')

@section('title', 'RegisterPackage')

@section('content')

    <form class="form-horizontal" method="post"  action="{{route('PostRegister',['id'=> $id_nomber])}}">
        <fieldset>

            <div class="form-group">
                <label class="text-center"><strong>Register extracted items</strong></label>
                <label class="text-center"> <strong> as a new package</strong></label>
            </div>

            <div class="form-group">
                <label class="text-center">Extacted from</label>
                <label class="text-center">{{$type_package}}{{$id_nomber}}</label>
            </div>

            <div class="form-group">
                <label class="text-center">{{$name_client}}</label>
                <label class="text-center">{{$nomber_partner}}</label>
            </div>

            <!-- Text input-->
            <div class="form-group">

                <label>Weight, Lbs</label>
                <input id="textinput" name="id" type="text" placeholder="Weight" class="form-control input-md">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="filebutton">Add photos</label>
                <div class="col-md-4">
                    <input id="filebutton" name="filebutton" class="input-file" type="file">
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">

                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Register package</button>

            </div>

            <div class="form-group">
                <label>{{$error}}</label>

            </div>



            <div class="form-group">
                <a href="{{route('find')}}" class=""><-BACK</a>
            </div>

        </fieldset>
    </form>

@endsection