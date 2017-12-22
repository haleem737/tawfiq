@extends('layouts.master');

@section('content')

<idv class='row'>
    <div class='col-md-6 col-md-offset-3'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h1>Add New Item</h1>
            </div>

            <div class='panel-body'>

                <form action='/items' method='POST' enctype='multipart/form-data'>
                    {{ csrf_field() }}
                
                    <div class='form-group'>
                    
                        <label for='title'>Item Title</label>
                        <input name='item_title' type ='text' class='form-control'>
                    
                        <label for='description'>Item Description</label>
                        <textarea name='item_desc' class='form-control'></textarea>

                        <label for='item_image'>Upload item image:</label>
                        <input type='file' name='item_image' id='file'>
                        <input type='hidden' value='{{ csrf_token() }}' name='token'>
                    
                    </div>

                    <input type='submit' class='btn btn-success pull-right'>

                </form>


            </div>

        </div>
    </div>
</idv>

@endsection('content')