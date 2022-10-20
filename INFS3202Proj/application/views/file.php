<DOCTYPE 
<head>
                <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dropzone.css">
                <script src="<?php echo base_url(); ?>assets/js/dropzone.js" type='text/javascript'></script>
</head>
<body>

  <div class="container">

    <div class="row">

      <div class="col-md-12">

        <h5>Upload Files</h2>
        <form action="<?= base_url('upload/dragDropUpload') ?>" class="dropzone" method = "GET" id="videoDropzone" name="userfile">
        <!-- <button type="submit" value="Upload">Upload</button>   -->
        </form> 
        
      </div>

    </div>

  </div>

  <div class="col mb-4"><div class="card"><div class="card-body">
  </div>

  <h3></h3>
  <div class="main"> </div>

  <script>

    Dropzone.options.imageUpload = {

          maxFilesize:100//MB,

          acceptedFiles: ".jpeg,.jpg,.mp4"

      };

  </script>

</body>