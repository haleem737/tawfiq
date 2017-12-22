@extends('layouts.master')

<style type='text/css'>
#co_logo{
max-width:170px;
border: 5px solid #ffff;
border-radius:100%;
box-shadow:0 2px 2px rgb(0, 0, 0, 0.3)
}

.section-container.light-bg {
background-color: #F5F5F5;
color: #444444;
}

.inner {
background-color: #ffffff;
border-radius:10px;
padding:10px;
box-shadow:0 2px 2px rgb(0, 0, 0, 0.3)
}

.item_image{
max-width:100%;
}

#my_popup{
display:none;
background:lightgray;
padding:1%;
}

#my_popup img{
max-width:100%;
background:lightgray;
}

</style>

@section('content')

    <div class='container'>
        
        <!-- Client information (logo - company name - Full name .....) -->
        <div class='col-md-3 pull-md-9'>
            <div class='panel panel-default'>
                <div class='panel-body text-center'>
                
                    <img id='co_logo' src='https://www.femsa.org/wp-content/plugins/bp-custom-users/includes/img/logo.png'>
                    <h2>{{$client->co_name}}</h2>
                    <h4><b>{{$client->name}}</b></h4>
                    <h4><b>{{$client->email}}</b></h4>

                   <a style='margin:10px 0' href='/items/create'><button class='btn btn-success'>Add New Item</button></a> 

                </div>
            </div>
        </div>


        <!-- Items Div -->
        <div class='col-md-9 push-md-3'>
            <div class='panel panel-default'>
                <div class='panel-body text-center'>
                    
                        @foreach($items as $item)

                            <a class='my_popup_open' href='#'>
                                <div class="col-md-4 light-panel item" name='{{$item->item_id}}'>
                                    <div class='inner'>
                                        <img class='item_image' src="{{ asset("uploads/" . $item->item_image) }}">
                                        <h3>{{$item->item_title}}</h3>
                                    </div>
                                </div>
                            </a>

                        @endforeach

                </div>
            </div>
        </div>
    
    </div>
    

    <!-- Show single item information popup -->
    <div id="my_popup">

        <div class='container'>
            <div class='col-md-4'>
                <img id='single-item-image'>
            </div>

            <div class='col-md-4'>
                <h1 id='single-item-title'></h1>
                <h3 id='single-item-desc'></h3>
            </div>
            <button class="my_popup_close">Close</button>
        </div>

    </div>

    <!-- Add new popup -->
    <div id="my_popup2">

        <div class='container'>

            <h1>Add new item div</h1>

        </div>

    </div>

  <!-- Include jQuery -->

    @section('script')

        <script type='text/javascript'>
        
            $('.item').on('click', function(){
                
                var clicked_item = $(this).attr('name');

                $.ajax({
                    url: "{{ URL::to('/home/read-data') }}",
                    type: "get", //send it through get method
                    data: { 
                        item_id: clicked_item, 
                    },
                    success: function(data) {
                        //Do Something
                        $('#single-item-title').text(data[0]['item_title']);
                        $('#single-item-desc').text(data[0]['item_desc']);
                        $('#single-item-image').attr("src", '{{ URL::asset('/uploads/') }}/' + data[0]['item_image']);
                        console.log(data);
                    },
                    error: function(xhr) {
                        //Do Something to handle error
                    }
                });

                // Initialize the Popup plugin


                $('#my_popup').popup();
                $('#my_popup2').popup();

            });
        
        </script>

    @endsection('script')

@endsection('content')