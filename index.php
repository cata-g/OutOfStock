<?php
session_start();
$product_ids = array();


if(filter_input(INPUT_POST, 'add_to_cart')){ // check if add to cart button has been submited
    if(isset($_SESSION['shopping_cart'])){ 
        $count = count($_SESSION['shopping_cart']);  // how many products are in the cart

        $product_ids = array_column($_SESSION['shopping_cart'], 'id'); // sequantial array for matching arrays keys to products ids

        if(!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
        $_SESSION['shopping_cart'][$count] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_POST, 'quantity')
            );
        }

        else{
            for($i = 0; $i< count($product_ids); $i++){
                if($product_ids[$i] == filter_input(INPUT_GET, 'id')){
                    $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity'); //add item quantity to an existing product in the array
                }
            }
        }
    }
    else{
        // if shopping cart doesn't exist => create first product with array key 0
        $_SESSION['shopping_cart'][0] = array
        (
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),
            'quantity' => filter_input(INPUT_POST, 'quantity')
        );
    }
}


if(filter_input(INPUT_GET, 'action') == 'delete'){

    foreach($_SESSION['shopping_cart'] as $key => $product){
        if($product['id'] == filter_input(INPUT_GET, 'id')){
            unset($_SESSION['shopping_cart'][$key]);
        }
    }

    //reset session array keys 
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}


//pre_r($_SESSION);
function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}





if(isset($_POST['email']) && $_POST['email'] != ''){
  

    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

        $userName = $_POST['name'];
        $userEmail = $_POST['email'];
        $marime = $_POST['marime'];
        $message = $_POST['message'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        
    
        $to = "contact@404outofstock.ro";
        $body = "\r\n";
        $body .= "De la: ".$userName."(".$userEmail.")"."\r\n";
        $body .= "Mesaj: ".$message."\r\n";
        $body .= "Marime: ".$marime."\r\n";
        $body .= "Adresa: ".$address."\r\n";
        $body .= "Telefon: ".$phone."\r\n"; 
        $body .= "\r\n\r\n";
        $body_client = "\r\n";
        $body_client .= "Multumim ca ati ales serviciile Out Of Stock!"."\r\n"."Comanda dumneavostra este in procesare, va vom contacta in curand!"."\r\n";
        $total = 0;
        
        foreach($_SESSION['shopping_cart'] as $key => $product):
            if($_SESSION['shopping_cart'][$key]["quantity"]>0){
                $body .= $_SESSION['shopping_cart'][$key]["name"]." x ".$_SESSION['shopping_cart'][$key]["quantity"]."\r\n";
                $body_client .= $_SESSION['shopping_cart'][$key]["name"]." x ".$_SESSION['shopping_cart'][$key]["quantity"]."\r\n";
                $total += $_SESSION['shopping_cart'][$key]["quantity"]*$_SESSION['shopping_cart'][$key]["price"];
                
            }
        endforeach;
        $total += 5;
        $body .= "Total: ".$total;
        $body_client .= "Total: ".$total;
        
        $headers = "From: contact@404outofstock.ro\r\n";
        $headers .= "Reply-To: contact@404outofstock.ro\r\n";
        $headers .= "Return-Path:\r\n";
        $headers .= "CC: \r\n";
        $headers .= "BCC: \r\n";    


        mail($to,"Comanda Noua", $body);
        mail($userEmail, "Comanda OOS", $body_client, $headers);
        header("Location: multumim.html");
        $message_sent = true;

    }

    else{
        $invalid_class_name = "form-invalid";
    }

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Out of stock</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src='jquery-1.8.3.min.js'></script>
    <script src='jquery.elevatezoom.js'></script> 
    <link rel="icon" href="logo1.png" type = "image/png">
    
</head>
<body>
    <header>
        <div class="container">
            <nav class = "nav">
                <div class="menu-toggle">
                    <i class="fas fa-bars"></i>
                    <i class="fas fa-times"></i>
                </div>
                <a href="index.php" class="logo"><img src = "imagini/logo.png"></a>
                <ul class = "nav-list" >
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active1">Acasa</a>
                    </li>

                    <li class="nav-item">
                        <a href="#poveste" class="nav-link" onClick="Close();">Despre Noi</a>
                    </li>
                    <li class="nav-item">
                        <a href="#modele" class="nav-link" onClick="Close();">Modele Noi</a>
                    </li>
                    <li class="nav-item">
                        <a href="comunitate.php" class="nav-link">Comunitate</a>
                    </li>

                </ul>
            </nav>
        </div>
    </header>


    <section class="hero" id="hero">
        <div class="container">
            <h2 class="sub-headline">
                <span class="first-letter">B</span>un Venit
            </h2>
            <h1 class="headline">Out Of Stock</h1>
            <div class="headline-description">
                <div class="separator">
                    <div class="line line-left"></div>
                    <div class="asterisk"><i class="fas fa-asterisk"></i></div>
                    <div class="line line-right"></div>   
                </div>
                <div class="single-animation">
                    <a href="#poveste" class="btn cta-btn">Afla mai mult</a>
                </div>
            </div>
        </div>
    </section>

    <section class="discover-our-story" id = "poveste">
        <div class="container">
            <div class="info">
                <div class="description padding-right animate-left">
                    <div class="global-headline">
                        <h2 class="sub-headline">
                            <span class="first-letter">P</span>ovestea
                        </h2>
                        <h1 class="headline headline-dark">Noastra</h1>
                        <div class="asterisk"><i class="fas fa-asterisk"></i></div>
                    </div>
                    <p>Traim intr-o lume complexa, nesigura si ambigua, in care viteza de evolutie a societatii si constructia sa determina oamenii sa aiba probleme cu ei insisi. In viziunea noastra, societatea actuala reprezinta un portret in care depresia si anxietatea apar de la varste fragede, oamenii maturi nu isi mai vad capul de griji si probleme, iar batranii se ineaca in amaraciune si in ignoranta celorlalti. Pe scurt, lumea in care traim reprezinta un spatiu haotic in care fiinta umana nu se mai regaseste, in care uita sa fie fericita si in care uita sa traiasca cu adevarat. 404outofstock doreste sa surprinda imagini ale societatii actuale, cu scopul de a schimba perceptia tinerilor, in special, cu privire la viata. Piesele nostre vestimentare au ca scop sublinierea problemelor de care omul contemporan se loveste. Constientizarea acestora reprezinta acceptare, iar  acceptarea e primul pas pentru depasirea lor . Sperăm că de fiecare dată când purtați îmbrăcămintea noastră și ne vedeți brandul , sa realizati ca traiti in lumea pe care tocmai v-am prezentat-o si ca trebuie sa faceti o schimbare .Suntem inspirati din cruda
realitate și promovam acceptarea durerii cu scopul de a o eradica si de a aprecia cu adevărat fericirea.
                        </p>
                
                <div class="animate-right">
                    <video oncontextmenu="return false;" id="Video Prezentare"  controls controlsList="nodownload noremoteplayback"  disablePictureInPicture> 
                        <source src = "video 404.mp4" type = "video/mp4">
                    </video>
                </div>
                </div>
            </div>
        </div>
        <div class="container">
        <div class="description padding-right animate-left">
                    <div class="global-headline">
                        <h2 class="sub-headline2">
                            <span class="first-letter2">E</span>chipa
                        </h2>
                        <h1 class="headline2 headline-dark">Noastra</h1>
                    </div>
                        <p>Echipa noastră este alcătuită din adolescenți ce împărtășesc aceeași mentalitate cu scopul de a arata si sublinia problemele societatii si ale omului modern.
                        </p>
                    
                </div>
        </div>
        <div class="container" STYLE = "DISPLAY: FLEX">
            <div class="row">
				<div class="col-md-3 " style = "padding-bottom: 50px;">
                    <div class="flip-card-container" >
                        <div class="flip-card">
                            <div class="flip-card-front">
                                <img src="imagini/echipa/carina.jpg" alt="" class = "img-responsive" >
                            </div>
                             <div class="flip-card-back" style = "display: block;align-items: center;text-align: center; background-color: #252525">
                                            <h2 class="sub-headline" style = "font-size: 2rem; color: white;">
                                                <span class="first-letter" style = "font-size: 2.5rem">C</span>arina
                                             </h2>
                                         
                                            <h1 class="headline-dark" style = "font-size: 15px; color: white; letter-spacing: -1px">Founder</h1>
                                            <a href="https://www.instagram.com/carinut27/"><i class="fab fa-instagram" style = "font-size: 20px;"></i></a>
                                       </div>  
                        </div>
                    </div>
                </div>
                <div class="col-md-3 " style = "padding-bottom: 50px;">
                    <div class="flip-card-container">
                        <div class="flip-card">
                            <div class="flip-card-front">
                                <img src="imagini/echipa/cata.jpg" alt="" class = "img-responsive" >
                            </div>
                                <div class="flip-card-back" style = "display: block;align-items: center;text-align: center; background-color: #252525">
                                            <h2 class="sub-headline" style = "font-size: 2rem; color: white;">
                                                <span class="first-letter" style = "font-size: 2.5rem">C</span>atalin
                                             </h2>
                                         
                                            <h1 class="headline-dark" style = "font-size: 15px; color: white; letter-spacing: -1px">IT</h1>
                                            <a href="https://www.instagram.com/cata583/"><i class="fab fa-instagram" style = "font-size: 20px;"></i></a>
                                       </div>  
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 " style = "padding-bottom: 50px;">
                    <div class="flip-card-container">
                        <div class="flip-card">
                            <div class="flip-card-front">
                                <img src="imagini/echipa/albi.jpg" alt="" class = "img-responsive" >
                            </div>
                                                          <div class="flip-card-back" style = "display: block;align-items: center;text-align: center; background-color: #252525">
                                            <h2 class="sub-headline" style = "font-size: 2rem; color: white;">
                                                <span class="first-letter" style = "font-size: 2.5rem">A</span>lexandru
                                             </h2>
                                         
                                            <h1 class="headline-dark" style = "font-size: 15px; color: white; letter-spacing: -1px">Photographer</h1>
                                            <a href="https://www.instagram.com/alex.albita/"><i class="fab fa-instagram" style = "font-size: 20px;"></i></a>
                                       </div>  
                        </div>
                    </div>
                </div>
                <div class="col-md-3  " style = "padding-bottom: 50px;">
                    <div class="flip-card-container" >
                        <div class="flip-card">
                            <div class="flip-card-front">
                                <img src="imagini/echipa/chelu.jpg" alt="" class = "img-responsive" style = "">
                            </div>
                                                          <div class="flip-card-back" style = "display: block;align-items: center;text-align: center; background-color: #252525">
                                            <h2 class="sub-headline" style = "font-size: 2rem; color: white;">
                                                <span class="first-letter" style = "font-size: 2.5rem">C</span>ristian
                                             </h2>
                                         
                                            <h1 class="headline-dark" style = "font-size: 15px; color: white; letter-spacing: -1px">Founder</h1>
                                            <a href="https://www.instagram.com/cristianchelu/"><i class="fab fa-instagram" style = "font-size: 20px;"></i></a>
                                       </div>  
                        </div>
                    </div>
                </div>
             </div>
            
        </div>
    </section>

    <section class="modele-noi between" id = "modele"> 
        <div class="container">
            <div class="global-headline">
                <div class="animate-top">
                    <h2 class="sub-headline">
                        <span class="first-letter">M</span>odele
                    </h2>
                </div>
                <div class="animate-bottom">
                    <h1 class="headline" >Noi</h1>
                </div>
            </div>
        </div>
    </section>

        
    </section>
    <section>
    <div class = "container" id = "modele">
        <!-- OUT OF STOCK CART by Cata -->
        <?php

            $connect = mysqli_connect('localhost', 'user', 'user', 'oos');
            $query = 'SELECT * FROM products ORDER by id ASC';

            $result = mysqli_query($connect, $query);

            if( $result):
                if(mysqli_num_rows($result)>0):
                    while($product = mysqli_fetch_assoc($result)):
                    ?>
                    <div class="col-md-4">
                        <div id ="CTricou<?php echo $product['id']?>"></div>
                         <form method = "post" action= "index.php?action=add&id=<?php echo $product['id']; ?>#comanda "> 
                            <div class="products" style="border: 1px solid #ff8400;">
                                <img id = 'imagine_tricou' src="<?php echo $product['image']; ?>" class = "img-responsive" />
                                <h4 class = "text-info"> <?php echo $product['name']?></h4>
                                <h4><?php echo $product['price']; ?> LEI</h4>
                                <input type = "text" name = "quantity" class = "form-control" value = "1" />
                                <input type = "hidden" name="name" value="<?php echo $product['name']; ?>" />
                                <input type = "hidden" name="price" value="<?php echo $product['price']; ?>"/>
                                <input type="submit" name="add_to_cart" style = "margin-top: 5px; background: #ff8400;" class="btn btn-info" value = "Adauga in cos"/>
                                <a href = "#tricoul<?php echo $product['id']?>" id = "Tricou<?php echo $product['id']?>" style = "margin-top: 5px; background: #ff8400;"  class="btn btn-info">Vezi Mai Mult</a>
                            </div>
                         </form>
                    </div>
                    <?php
                    endwhile;
                endif;
            endif;
        ?>
        <div id="comanda"></div>
        </section>


 <section class="culiry-delight" style = "display:none" id = "tricoul1">
        <div class="container">
            <div class="info">
                <div class="description padding-right" style = "text-align: left">
                    <div class="global-headline">
                        <h2 class="sub-headline">
                            <span class="first-letter">T</span>ricou
                        </h2>
                        <h1 class="headline headline-dark">"Barcode"</h1>
                    </div>
                    <p>
                        190gr/<i class = "fa">&#13217;</i>
                        <br>100% bumbac Ringspun
                        <br>
                    
                       <table style = "width: 100%">
                           <tr>
                               <th>Marimi</th>
                               <th>S</th>
                               <th>M</th>
                               <th>L</th>
                               <th>XL</th>
                           </tr>
                           <tr>

                               <td>A/B</td>
                               <td>69/50</td>
                               <td>72/53</td>
                               <td>74/56</td>
                               <td>76/58</td>
                           </tr>
                       </table>
                       <img src = "imagini/trshirt.png" style = "width: 20%;">
                       <br>
                       <B>+5.00 Ron Transport (DOAR IN BUCURESTI SI ILFOV)</B>
                        </p>
                         <a href = "#CTricou1" style = "margin-top: 5px; background: #ff8400;"  class="btn btn-info">Cumpara</a>
                </div>
            <div class="w3-content w3-display-container" style = "max-width: 350px;">
<img class="mySlides2" src="imagini/barcode/2.png" style="width:100%">
<img class="mySlides2" src="imagini/barcode/3.png" style="width:100%">
<img class="mySlides2" src="imagini/barcode/4.png" style="width:100%">
<img class="mySlides2" src="imagini/barcode/5.png" style="width:100%">
  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1, 1)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1, 1)">&#10095;</button>
</div>

    </section>

    <section class="culiry-delight" style = "display:none" id = "tricoul2">
        <div class="container">
            <div class="info">
                <div class="description padding-right" style = "text-align: left">
                    <div class="global-headline">
                        <h2 class="sub-headline">
                            <span class="first-letter">T</span>ricou
                        </h2>
                        <h1 class="headline headline-dark">"404"</h1>
                    </div>
                    <p>
                        190gr/<i class = "fa">&#13217;</i>
                        <br>100% bumbac Ringspun
                        <br>
                    
                       <table style = "width: 100%">
                           <tr>
                               <th>Marimi</th>
                               <th>S</th>
                               <th>M</th>
                               <th>L</th>
                               <th>XL</th>
                           </tr>
                           <tr>

                               <td>A/B</td>
                               <td>69/50</td>
                               <td>72/53</td>
                               <td>74/56</td>
                               <td>76/58</td>
                           </tr>
                       </table>
                       <img src = "imagini/trshirt.png" style = "width: 20%;">
                       <br>
                       <B>+5.00 Ron Transport (DOAR IN BUCURESTI SI ILFOV)</B>
                        </p>
                         <a href = "#CTricou2" style = "margin-top: 5px; background: #ff8400;"  class="btn btn-info">Cumpara</a>
                </div>
                <div class="w3-content w3-display-container" style = "max-width: 350px;">
<img class="mySlides1" src="imagini/404/2.png" style="width:100%">
<img class="mySlides1" src="imagini/404/3.png" style="width:100%">
<img class="mySlides1" src="imagini/404/4.png" style="width:100%">
<img class="mySlides1" src="imagini/404/5.png" style="width:100%">
  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1, 0)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1, 0)">&#10095;</button>
</div>
            

    </section>
      
    <section class="culiry-delight" style = "display:none" id = "tricoul3">
        <div class="container">
            <div class="info">
                <div class="description padding-right" style = "text-align: left">
                    <div class="global-headline">
                        <h2 class="sub-headline">
                            <span class="first-letter">T</span>ricou
                        </h2>
                        <h1 class="headline headline-dark">"Happiness"</h1>
                    </div>
                    <p>
                        190gr/<i class = "fa">&#13217;</i>
                        <br>100% bumbac Ringspun
                        <br>
                    
                       <table style = "width: 100%">
                           <tr>
                               <th>Marimi</th>
                               <th>S</th>
                               <th>M</th>
                               <th>L</th>
                               <th>XL</th>
                           </tr>
                           <tr>

                               <td>A/B</td>
                               <td>69/50</td>
                               <td>72/53</td>
                               <td>74/56</td>
                               <td>76/58</td>
                           </tr>
                       </table>
                       <img src = "imagini/trshirt.png" style = "width: 20%;">
                       <br>
                       <B>+5.00 Ron Transport (DOAR IN BUCURESTI SI ILFOV)</B>
                        </p>
                         <a href = "#CTricou3" style = "margin-top: 5px; background: #ff8400;"  class="btn btn-info">Cumpara</a>
                         
                        
                </div>
                
                

<div class="w3-content w3-display-container" style = "max-width: 350px;">
<img class="mySlides3" src="imagini/happiness/2.png" style="width:100%">
<img class="mySlides3" src="imagini/happiness/3.png" style="width:100%">
<img class="mySlides3" src="imagini/happiness/4.png" style="width:100%">
<img class="mySlides3" src="imagini/happiness/5.png" style="width:100%">
  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1, 2)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1, 2)">&#10095;</button>
</div>
            
</section>
        <section>
        <div style = "clear:both"></div>
        <br>
        <div class="table-responsive">
            <table class="table">
                <tr><th colspan = "5"><h3>Detaliile Comenzii</h3></th></tr>
                <tr>
                    <th width = "40%">Numele produsului</th>
                    <th width = "10%">Cantitate</th>
                    <th width = "20%">Pret</th>
                    <th width = "15%">Total</th>
                    <th width = "5%">Actiune</th>
                </tr>
                <?php
                    if(!empty($_SESSION['shopping_cart'])):
                        $total =0;
                        foreach($_SESSION['shopping_cart'] as $key => $product):
                ?>
                <tr>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['quantity']; ?></td>
                    <td><?php echo $product['price']; ?> LEI</td>
                    <td><?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>
                    <td>
                     <a href="index.php?action=delete&id=<?php echo $product['id']; ?>#comanda"> 
                        <div class="btn-danger">Sterge</div>
                     </a>
                    </td>
                </tr>
                <?php
                 $total = $total + ($product['quantity'] * $product['price']);
                        endforeach;
                $total += 5;
                ?>
                
                

                <tr>
                    <td colspan = "3" align = "right">Total</td>
                    <td align = "right"> <?php echo number_format($total,2);?>LEI</td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan ="5">
                        <?php
                         if(isset($_SESSION['shopping_cart'])):
                         if(count($_SESSION['shopping_cart'])>0):
                        ?>
                        <form action="index.php" method="POST" class="form">
                            <div class="form-group">
                                <label for="name" class="form-label">Nume</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nume" tabindex="1" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input  type="email" class="form-control <?= $invalid_class_name ?? "" ?>" id="email" name="email" placeholder="Email" tabindex="2" required>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="form-label">Telefon</label>
                                <input  type="text" class="form-control" id="phone" name="phone" placeholder="Nr. Telefon" tabindex="3" required>
                            </div>
                            <div class="form-group">
                                <label for="address" class="form-label">Adresa</label>
                                <input  type="text" class="form-control" id="address" name="address" placeholder="Adresa" tabindex="4" required>
                            </div>
                            <div class="form-group">
                                <label for="marime" class="form-label">Alege o marime</label>
                                <select name = "marime" id="marime" required>
                                <option value="S" selected = "selected">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="message" class="form-label">Mesaj</label>
                                <textarea class="form-control" rows="5" cols="50" id="message" name="message" placeholder="Scrie un mesaj." tabindex="5"></textarea>
                            </div>
                            <button type="submit" style="background: #ff8400; color: white;">Plaseaza Comanda</a>
                            </form>
                         <?php endif; endif; ?>
                    </td>
                </tr>
                <?php
                endif; 
                ?>
            </table>
        </div>
    </div>
    </section>
    








    <!-- Final Sectiune-->

    <footer>
        <div class="container">
            <div class="back-to-top">
                <a href="#hero"><i class="fas fa-chevron-up"></i></a>
            </div>
                       <img src = "shmailey.png" style = "width: 150px; height: 250px; float: left; left: 10px;">
            <div class="footer-content">
                <div class="footer-content-divider animate-bottom">
                    <div class = "contact" >
                        <h4>Contact</h4>
                      <ul class = "liste">
                        <li>
                            <a href="https://www.instagram.com/404outofstock/"><i class="fab fa-instagram"></i> @404outofstock</a>
                        </li>
                        <li><a href = "#"><i style="font-size:12px" class="fa">&#xf095; </i> 0747 034 046 (8:00 - 18:00)</a></li>
                        <li><a href = "#"><i style="font-size:12px" class="fa">&#xf095; </i> 0725 352 350 (8:00 - 18:00)</a></li>
                        <li><a href = "#"><i style="font-size:18px" class="fa">&#9993; </i> contact@404outofstock.ro</a>
                        </ul></li>
                    </div>
                
                    <div class = "politici">
                        <h4>Informatii Necesare</h4>
                        <ul class = "liste">
                        <li><a href = "cum-cumpar.html">Cum Cumpar?</a></li>
                       <li> <a href = "informatii-livrare.html">Informartii Livrare</a></li>
                       <li> <a href = "metode-de-plata.html">Metode De Plata</a></li>
                        <li><a href = "politica-retur.html">Politica de Retur</a></li>
                        <li><a href = "garantia-produselor.html">Garantia Produsului</a></li>
                        <li><a href = "termeni-si-conditii.html">Termeni Si Conditii</a></li>
                        </ul>
                    </div>
                    
                    

                </div>
            </div>
            <div class = "semnatura">
                        <ul class = "liste">
                        <p>All rights reserved Out Of Stock 2020.
                        <br>Powered by Cata.</p></li>
                        </ul>
                    </div>
        </div>
    </footer>
<script src="oos2.js"></script>
<script>
    var slideIndex = [1,1,1];
var slideId = ["mySlides1", "mySlides2", "mySlides3"];
showDivs(1, 0);
showDivs(1, 1);
showDivs(1, 2);

function plusDivs(n, no) {
  showDivs(slideIndex[no] += n, no);
}

function showDivs(n, no) {
  var i;
  var x = document.getElementsByClassName(slideId[no]);
  if (n > x.length) {slideIndex[no] = 1}
  if (n < 1) {slideIndex[no] = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex[no]-1].style.display = "block";  
}


</script>
</body>
</html>