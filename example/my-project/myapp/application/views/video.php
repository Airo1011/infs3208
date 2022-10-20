

<style>
#result {
    width: 100%;
    height: 200px;
    overflow: scroll;
    padding: 0px 0px 10px;
}
#post-comment{
    padding: 10px 0px 0px ;
}
#video-frame{
    overflow: off;
}
i {
    padding: 5px;
}
#unclicked {
  background-color: white;
  color: black;
  border: 2px solid #639269; /* Green */
}
#clicked {
  background-color: #639269;
  color: white;
  border: 2px solid #639269; /* Green */
}
</style>
<div class="row">
    <div class="col-6 mb-2 centered">
        <div class="card">
            <div class="card-body" id="video-frame">
                <h3><?php echo $name; ?></h3>
                <video controls><source  src=<?php echo $path; ?> type="video/mp4"></video>
                <?php echo form_open_multipart('video/search/'.$id);?>
                    <?php if (!$liked){ ?> 
                        <input type="hidden" name="like" value=2 />
                        <div class="form-group">
                            <button type="submit" class="float-left btn btn-secondary" id="unclicked">Like</button>
                        </div>
                    <?php }else{ ?>
                        <input type="hidden" name="like" value=1 />
                        <div class="form-group">
                            <button type="submit" class="float-left btn btn-secondary" id="clicked" >Liked</button>
                        </div>
                    <?php }; ?>
                <?php echo form_close();?>
                <i class="float-left">Likes: <?php echo $likes ?></i>
                <?php echo form_open_multipart('video/search/'.$id);?>
                    <input type="hidden" name="username" value=<?php echo $_SESSION['username'];?> />
                    <input type="hidden" name="fileID" value=<?php echo $id;?> />
                    <?php if (!$delete){ ?> 
                        <input type="hidden" name="remove" value=2 />
                        <div class="form-group">
                            <button type="submit" class="float-right btn btn-secondary" id="unclicked" >+ Watchlist</button>
                        </div>
                    <?php }else{ ?>
                        <input type="hidden" name="remove" value=1 />
                        <div class="form-group">
                                <button type="submit" class="float-right btn btn-secondary" id="clicked" >- Remove from List</button>
                        </div>
                    <?php }; ?>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-4 mb-2 centered">
        <div class="card">
            <div class="card-body">
                <h3>Comment</h3>
                <div id="result">
                <?php if(isset($comment))
                    foreach($comment as $row){
                        echo "<p><b>$row->userID</b> says: $row->comment</p>";
                    }?>
                </div>
                <?php echo form_open_multipart('video/search/'.$id);?>
                <div id="post-comment">
                    <div class="form-group">
                            <input type="text" class="form-control" placeholder="Comment" required="required" name="comment">
                    </div>
                    <div class="form-group">
                            <button type="submit" class="float-right btn btn-secondary"  onClick="location.href=location.href">Comment</button>
                            <label class="float-left form-check-label"><input type="checkbox" name="anon"> Post Anonomously</label>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <!-- <div class="clearfix">
                    <label class="float-left form-check-label"><input type="checkbox" name="remember"> Remember me</label>
                </div> -->
                <!-- <video width="320" height="240" controls><source  src=<?php// echo $path; ?> type="video/mp4"></video> -->
            </div>
        </div>
    </div>
</div>
