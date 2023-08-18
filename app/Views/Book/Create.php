<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<style>

    .invalid-feedback{
        color: blue;
    }
    </style>

<body>

    <div class="container">

        <form name="createForm" id="createForm" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="name" id="name" placeholder="Enter name" name="name" class="form-control" value="<?php echo set_value('name');?>" >

              <?php 
              if (isset($validation) && $validation->hasError('name')) {
                    echo '<p class="invalid-feedback" aria-invalid="true" >'.$validation->getError('name').'</p>';
                    
                } ?>
            </div>
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="autbor" class="form-control" id="autbor" placeholder="Enter autbor" name="autbor" value="<?php echo set_value('author');?>">
                <?php if (isset($validation) && $validation->hasError('autbor')) {
                     echo '<p class="invalid-feedback" aria-invalid="true" >'.$validation->getError('autbor').'</p>';
                } ?>
            </div>
            <div class="form-group">
                <label for="isbn_no">ISBN NO:</label>
                <input type="isbn_no" class="form-control" id="isbn_no" placeholder="Enter isbn_no" name="isbn_no"value="<?php echo set_value('isbn_no');?>">
                <?php if (isset($validation) && $validation->hasError('isbn_no')) {
                     echo '<p class="invalid-feedback" aria-invalid="true" >'.$validation->getError('isbn_no').'</p>';
                } ?>
            </div>
            

            <button type="submit" class="btn btn-info">Submit</button>
        </form>
    </div>

</body>

</html>