<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Navbar test</title>


<!-- Bootstrap -->

<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
<style>
/*
.bg-custom-2 {
    background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
}
*/

.bg-custom-2 {
    background-image: linear-gradient(15deg, #226e9d 0%, #4f7fb2 60%, #8197b7 90%, #fff 100%);
}

</style>

</head>

<body>



<!-- 
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
    <img src="..." width="30" height="30" alt="logo" class="align-bottom">
    BootstrapBay
  </a>
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Blog</a>
    </li>
  </ul>
</nav> -->

<!-- <nav class="navbar navbar-light bg-light mt-3">
  <a class="navbar-brand" href="#">
    <img src="..." width="30" height="30" alt="logo">
    Title
  </a>
</nav> -->

<!-- 
<nav class="navbar navbar-dark bg-dark mt-3">
  <a class="navbar-brand" href="#">
    <img src="..." width="30" height="30" alt="logo">
    BootstrapBay
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar-list">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Blog</a>
      </li>
    </ul>
  </div>
</nav>

 -->
<!-- 

<nav class="navbar navbar-dark bg-dark navbar-fixed navbar-expand-sm mt-3">
  <a class="navbar-brand" href="#">
    <img src="..." width="30" height="30" alt="logo">
    BootstrapBay
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-2" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar-list-2">
    <ul class="navbar-nav">
      ...    
    </ul>
  </div>
</nav>
 -->
<!-- 

<nav class="navbar navbar-dark bg-custom-2 navbar-expand-sm mt-3">

  <div class="container">
  <a class="navbar-brand" href="#">
    <img src="..." width="30" height="30" alt="logo">
    BootstrapBay
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-5">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar-list-5">
    <ul class="navbar-nav ml-auto">
       <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
 -->
<!-- 
  <nav class="navbar navbar-dark bg-dark fixed-top mt-5">
  <a class="navbar-brand" href="#">Brand</a>
  </nav> -->

<!-- 

<nav class="navbar navbar-dark bg-custom-2">
  <a class="navbar-brand" href="#a">BootstrapBay</a>
</nav>
 -->
<!-- 
<nav class="navbar navbar-dark sticky-top bg-custom-2">
  <div class="container">
    <a class="navbar-brand" href="#a">BootstrapBay</a>


      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#">Duck</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Chicken</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Kiwi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Emu</a>
        </li>
      </ul>
  </div>
</nav>
 -->



<nav class="navbar navbar-dark bg-custom-2 fixed-top justify-content-between navbar-expand-sm">

  <div class="container">
  <a class="navbar-brand" href="#">
    
    Test brand
  </a>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbar-list">
    <ul class="navbar-nav justify-content-end ml-auto">
       <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
<!-- 
<nav class="navbar navbar-dark bg-custom-2 navbar-expand-lg fixed-top justify-content-between">
  <button class="navbar-toggler order-2" type="button" data-toggle="collapse" data-target="#navbar-list-9" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse w-100 order-3 order-lg-1" id="navbar-list-9">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Blog</a>
      </li>
    </ul>
  </div>
  <a class="navbar-brand mx-lg-0 order-1 order-lg-2" href="#">
    <img src="..." width="30" height="30" alt="logo">
    BootstrapBay
  </a>
  <div class="collapse navbar-collapse justify-content-end w-100 order-3" id="navbar-list-9">
      <ul class="navbar-nav">
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="..." width="40" height="40" class="rounded-circle">
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Dashboard</a>
            <a class="dropdown-item" href="#">Edit Profile</a>
            <a class="dropdown-item" href="#">Log Out</a>
          </div>
        </li>   
      </ul>    
  </div>
</nav>
 -->


<div class="container">
  <p>
  Building websites for several years has given us an appreciation for the time and effort it takes to create beautiful work. We also understand the value of using themes & templates to kickstart the design & development process.
  </p>
  <p>
We love Bootstrap. It's easy to learn, customize, and great for rapid development of responsive websites. Whether you're a seasoned developer/designer or someone learning the basics of web design and development, Bootstrap is great way to get started with all of its out-of-the-box components.
  </p>
  <p>
Bootstrap has come a long way and we wanted to create an amazing marketplace for Bootstrap enthusiasts like ourselves.
  </p>
 


</div>


<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>