@extends('layouts.master')

@section('title', 'SearchPackage')

@section('content')

    <form class="form-horizontal" method="post"  action='/extraction'>
        <fieldset>

            <div class="form-group">
            <label>Extraction prohibited items</label>
            </div>

            <!-- Text input-->
            <div class="form-group">

                    <input id="textinput" name="id" type="text" placeholder="Enter or scan shipment num" class="form-control input-md">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

            </div>
            <div class="form-group">
                <label>{{$error}}</label>
            </div>

            <!-- Button -->
            <div class="form-group">

                  <button id="singlebutton" name="singlebutton" class="btn btn-primary">Search</button>

            </div>

        </fieldset>
    </form>

@endsection