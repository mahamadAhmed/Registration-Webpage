<!DOCTYPE html>
<html>

<style>
    *{
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

header{
    background-color: #222;
    color: #fff;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 17px 80px;
}

.name{
    text-decoration: none;
    color: white;
    font-weight: 700;
    font-size: xx-large;
}

.navigation_bar a{
    text-decoration: none;
    color: white;
    font-weight: 700;
    padding-left: 20px;
}

.navigation_bar a:hover{
    color: white;
}

section{
    padding: 200px 200px;
}
</style>
<body>
<header>
    <div class="menu-icon">
        <i class="fa fa-bars fa-2x"></i>
    </div>
  
    <a><?php echo e(__('messages.Contact Us')); ?><i class="fas fa-contact_us"></i></a>
    <a onclick="switchLanguage('en')" id="en">
        English
    </a>
    <a onclick="switchLanguage('ar')" id="ar">
        العربية
    </a>
</header>
<?php /**PATH C:\xampp\htdocs\Laravel project\Registration-Webpage-app\resources\views/header.blade.php ENDPATH**/ ?>