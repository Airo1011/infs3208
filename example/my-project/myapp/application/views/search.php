<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<!-- Search Bar -->
<div class="row justify-content-center">
    <div class="col-md-4 col-md-offset-6 centered">
      <form class="form-inline my-2 my-lg-0">
        <?php echo form_open('ajax'); ?>
        <div >
          <input class="form-control mr-sm-2" type="search" id="search_text" placeholder="Search" name="search" aria-label="Search">
        </div>
        <button class="btn btn-outline-success my-2 my-sm-0" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Search </button>
        <?php echo form_close(); ?>
        <ul id = "autocomplete"></ul>

        <div class="container">
    <!-- </div> -->
        </div>
	</div>
</div>



<div class="collapse" id="collapseExample">
<h2 align="center"> Search</h2>
<div class="row row-cols-1 row-cols-md-4" id="result"></div>
</div>

<script>
    $(document).ready(function(){
    load_data();
    auto_complete();
        function load_data(query){
            $.ajax({
            url:"<?php echo base_url(); ?>ajax/fatch",
            method:"GET",
            data:{query:query},
            success:function(response){
                $('#result').html("");
                if (response == "" ) {
                    $('#result').html(response);
                }else{
                    var obj = JSON.parse(response);
                    if(obj.length>0){
                        var items=[];
                        $.each(obj, function(i,val){
                            // items.push($('<h4>').text(val.filename));
                            if (val.filename.includes("jpg")) {
                                items.push($('<div class="col mb-4 centered"><div class="card"><div class="card-body"><a href="<?php echo base_url(); ?>/video/search/'+val.id+'"><h4> '+val.filename+' </h4><img width="320" height="240" src="' +'<?php echo base_url(); ?>/uploads/' +val.filename + '" /></a><p>Uploaded by '+val.username+'</p></div></div></div>'));
                            }else{
                                items.push($('<div class="col mb-4 centered"><div class="card"><div class="card-body"><a href="<?php echo base_url(); ?>/video/search/'+val.id+'"><h4> '+val.filename+' </h4><video width="320" height="240"><source  src="' +'<?php echo base_url(); ?>/uploads/' +val.filename + '" type="video/mp4"></video></a><p>Uploaded by '+val.username+'</p></div></div></div>'));
                            }
                    });
                    $('#result').append.apply($('#result'), items);         
                    }else{
                    $('#result').html("Not Found!");
                    }; 
                };
            }
        });
        }
        function auto_complete(query){
            $.ajax({
            url:"<?php echo base_url(); ?>ajax/fatch",
            method:"GET",
            data:{query:query},
            success:function(response){
                $('#autocomplete').html("");
                if (response == "" ) {
                    $('#autocomplete').html("");
                }else{
                    var obj = JSON.parse(response);
                    if(obj.length>0){
                        var items=[];
                        $.each(obj, function(i,val){
                            // items.push($('<h4>').text(val.filename));
                            if (val.filename.includes("jpg")) {
                                items.push($('<li><a href="<?php echo base_url(); ?>/video/search/'+val.id+'">'+val.filename+'</a></li>'));
                            }else{
                                items.push($('<li><a href="<?php echo base_url(); ?>/video/search/'+val.id+'">'+val.filename+'</a></li>'));
                            }
                    });
                    $('#autocomplete').append.apply($('#autocomplete'), items);         
                    }else{
                    $('#autocomplete').html("");
                    }; 
                };
            }
        });
        }
        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != ''){
                load_data(search);
                auto_complete(search);
            }else{
                load_data();
                auto_complete();
            }
        });
    });
</script>

</body>
</html>