<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD System</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
    <style>
        .mt40{
            margin-top: 40px;
        }
    </style>
</head>
<body>
    
<div class="container">
    <div class="row mt40">
   <div class="col-md-10">
    <h2>CRUD System</h2>
   </div>
   <div class="col-md-2">
    <a href="<?php echo base_url('index.php/note/create/') ?>" class="btn btn-danger">Add Note</a>
   </div>
   <br><br>
 
    <table class="table table-bordered">
       <thead>
          <tr>
             <th>Id</th>
             <th>Title</th>
             <th>Description</th>
             <th>Created at</th>
             <td colspan="2">Action</td>
          </tr>
       </thead>
       <tbody>
          <?php if($notes): ?>
          <?php foreach($notes as $note): ?>
          <tr>
             <td><?php echo $note->id; ?></td>
             <td><?php echo $note->title; ?></td>
             <td><?php echo $note->description; ?></td>
             <td><a href="<?php echo base_url('index.php/note/edit/'.$note->id) ?>" class="btn btn-primary">Edit</a></td>
                 <td>
                <form action="<?php echo base_url('index.php/note/delete/'.$note->id) ?>" method="post">
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
    </table>
    
</div>
 
</div>
     
</body>
</html>