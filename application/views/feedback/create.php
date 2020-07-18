<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Products</title>
    <link href="<?= base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css"> -->
    <style>
        .mt40{
            margin-top: 40px;
        }
    </style>
</head>
<body>
    
<div class="container">
  
<div class="row">
    <div class="col-lg-12 mt40">
        <div class="pull-left">
            <h2>Add Products</h2>
        </div>
    </div>
</div>
     
     
<form action="<?php echo base_url('index.php/Feedback/store') ?> " method="POST" name="edit_note">
   <input type="hidden" name="id">
     <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Title</strong>
                <input type="text" name="title" class="form-control" placeholder="Enter Title">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Message</strong>
                <input type="text" name="message" class="form-control" placeholder="Enter Message">
            </div>
        </div>
        <!-- <div class="col-md-12">
            <div class="form-group">
                <strong>Description</strong>
                <textarea class="form-control" col="4" name="description"
                 placeholder="Enter Description"></textarea>
            </div>
        </div> -->
        <!-- <div class="choose-img form-group">
							<label for="userimage">Select Profile Picture</label>
							<input class="form-control" onchange="readURL(this);" type="file" name="userimage" size="20 " value="<?php echo set_value('userimg'); ?>" required>
						</div> -->
        <!-- <div class="col-md-12">
            <div class="form-group">
                <strong>Unit Price</strong>
                <input type="number" name="unit_price" class="form-control" placeholder="Enter Unit Price">
            </div>
        </div> -->
        <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>



    </form>
 
</div>
     
</body>
</html>