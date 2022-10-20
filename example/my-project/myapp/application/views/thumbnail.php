<?php foreach($posts as $post){ ?>
<div class="col mb-4 centered">
    <div class="card">
        <div class="card-body">
            <a href="<?php echo base_url(); ?>/video/search/<?php echo $post->id ?>">
                <h4> <?php echo $post->filename ?> </h4>
                <video width="320" height="240"><source  src="' +'<?php echo base_url(); ?>/uploads/<?php echo $post->filename ?>" type="video/mp4"></video>
            </a>
            <p>Uploaded by <?php echo $post->username ?></p>
        </div>
    </div>
</div>
<?php } ?>