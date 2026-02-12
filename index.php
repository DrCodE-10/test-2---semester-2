<?php include 'includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">  
      <title>Genge Online</title>
      <link rel="stylesheet" href="style.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?
family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" 
rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css" 
integrity="sha384-NvKbDTEnL+A8F/AA5Tc5kmMLSJHUO868P+lDtTpJIeQdGYaUIuLr4lVGOEA1OcMy" 
crossorigin="anonymous">

    </head>
    
    <body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="log">
                    <img src="assets/image/log1.jpg" width="150px" height="150">
                </div>
                <h1>Dr Genge Online
                     <p>Be Fresh be Fast</p>
                </h1>
               
            </div>
        </div> 
        
       <div class="row">
            <div class="col-1">
                <h1>DR GENGE ONLINE<br> Pata bidhaa zako poa & Fresh kutoka sokoni</h1>
                <p> Jipatie bidhaa mbalimbali za nyumbani kwa matumizi ya kila siku kutoka Genge online <br>
                    Chagua chochote kutoka Genge online na utaletewa hadi nyumbani</p>
                <a href="products.php" class="btn">Explorer Now &#8594;</a>
            </div>
        <div class="col-2">
            <img src="assets/image/Food-and-Beverage.jpg" alt="Food-and-Beverage">
        </div>
       </div>
    </div>


<h2 class="title">Featured Products</h2>

<div class="card-grid">
    <div class="card">
        <h3 class="sub">Cooking Oil</h3>
        <img src="uploads/homepage/cooking oil.jpg" width="90%" height="90%">
        <p>TZS 5,000 Per 1 litre</p>
    </div>

    <div class="card">
        <h3 class="sub" >Gas Refill</h3>
        <img src="uploads/homepage/gas fillin.jpg" width="100%" height="90%">
        <p>TZS 25,000</p>
    </div>

    <div class="card">
        <h3 class="sub"> Washing Soap</h3>
        <img src="uploads/homepage/washing soap.jpg" width="100%" height="90%">
        <p>TZS 3,000</p>
    </div>
</div>

<h2 class="title">Home Services</h2>

<div class="card-grid">
    <div class="card">
        <h3 class="sub">House Cleaning</h3>
         <img src="uploads/homepage/cleaning.jpg" width="100%" height="90%">
        <p>TZS 30,000</p>
        <button>Book Service</button>
    </div>

    <div class="card">
        <h3 class="sub">Plumbing Service</h3>
         <img src="uploads/homepage/plumbing.jpg" width="100%" height="90%">
        <p>TZS 20,000</p>
        <button>Book Service</button>
    </div>
</div>

<?php include 'includes/footer.php'; ?>