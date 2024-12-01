<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registration form</title>
        <link rel="icon" type="img/jpg" href="img/pageIcon.jpg">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    </head>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(document).ready(function() {
  $("#myForm").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var formData = new FormData(form[0]);
    $.ajax({
      url: "<?php echo e(route('store')); ?>",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        if (response.status === 'success') {
          alert(response.message);
          form.trigger("reset");
        } else {
          alert(response.message);
        }
      },
      error: function(jqXHR, textStatus, errorMessage) {
        alert(errorMessage);
      }
    });
  });
});
</script>

</head>

<body>

   
   <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<main>
<br>
            
<form id="myForm" method="post" action="<?php echo e(route('store')); ?>" enctype="multipart/form-data" class="my-form" onsubmit="validateForm()">
<?php echo csrf_field(); ?>
            
<div class="form-group">
    <label for="full_name"><?php echo e(Lang::get('messages.full_name_label')); ?></label>
    <input type="text" name="full_name" id="full_name" placeholder="<?php echo e(Lang::get('messages.full_name_placeholder')); ?>" required>
</div>

<div class="form-group">
    <label for="user_name"><?php echo e(Lang::get('messages.user_name_label')); ?></label>
    <input type="text" name="user_name" id="user_name" placeholder="<?php echo e(Lang::get('messages.user_name_placeholder')); ?>" required>
</div>

<div class="form-group">
    <label for="birthdate"><?php echo e(Lang::get('messages.birthdate_label')); ?></label>
    <input type="date" name="birthdate" id="birthdate" placeholder="<?php echo e(Lang::get('messages.birthdate_placeholder')); ?>" required>
    <button class="btn btn-primary btn-black" id="get-actors-button"  type="button" name="get" onclick="getFamousPeople(birthdate.value)"><?php echo e(Lang::get('messages.get_actors_button_label')); ?></button>
    
</div>

<div id="container"> </div>


<div class="form-group">
    <label for="phone"><?php echo e(Lang::get('messages.phone_label')); ?></label>
    <input type="tel" name="phone" id="phone" placeholder="<?php echo e(Lang::get('messages.phone_placeholder')); ?>" required>
</div>

<div class="form-group">
    <label for="address"><?php echo e(Lang::get('messages.address_label')); ?></label>
    <input type="text" name="address" id="address" placeholder="<?php echo e(Lang::get('messages.address_placeholder')); ?>" required>
</div>

<div class="form-group">
    <label for="password"><?php echo e(Lang::get('messages.password_label')); ?></label>
    <input type="password" name="password" id="password" placeholder="<?php echo e(Lang::get('messages.password_placeholder')); ?>" required pattern="^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$" title="Password must be at least 8 characters with at least one number, one lowercase letter, one uppercase letter and one special character" required>
</div>

<div class="form-group">
    <label for="confirm_password"><?php echo e(Lang::get('messages.confirm_password_label')); ?></label>
    <input type="password" name="confirm_password" id="confirm_password" placeholder="<?php echo e(Lang::get('messages.confirm_password_placeholder')); ?>" required>
</div>

<div class="form-group">
    <label for="email"><?php echo e(Lang::get('messages.email_label')); ?></label>
    <input type="email" name="email" id="email" placeholder="<?php echo e(Lang::get('messages.email_placeholder')); ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter a valid email address." required>
</div>

<div class="form-group">
    <label for="user_image"><?php echo e(Lang::get('messages.user_image_label')); ?></label>
    <input type="file" name="user_image" id="user_image" required>
</div>
  <button type="submit" class="btn-submit" id=submit value="Add" ><?php echo e(Lang::get('messages.sub')); ?></button>
</form>
<br>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<script>

function switchLanguage(lang) {
  let baseURL = window.location.origin;
  if (lang == "en") {
    window.location.href = baseURL + "/en"
  } else {
    window.location.href = baseURL + "/ar"  
  }
}

</script>

<script src="<?php echo e(asset('js/actor_request.js')); ?>"></script>

<script src="<?php echo e(asset('js/script.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\Laravel project\Registration-Webpage-app\resources\views/index.blade.php ENDPATH**/ ?>