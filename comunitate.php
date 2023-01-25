<?php
        if(isset($_POST['message']) && $_POST['message'] != ''){
        $message = $_POST['message'];
        $to = "contact@404outofstock.ro";
        $body = "\r\n";
        $body .= "Mesaj: ".$message."\r\n";
        $body .= "\r\n\r\n";


        mail($to,"Comunitate", $body);
        header("Location: multumim.html");
        $message_sent = true;
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
   <style>
.between1{
    height: 25vh;
    display: flex;
    align-items: center;
    background-position: cover;
}
.liste{
    list-style: none;
    margin-bottom: 5.4rem;
    display: block;
    justify-content: center;
}
.contact, .politici, .semnatura{
    text-align: left;
    padding-right: 100px;
}
.semnatura p{
    font-size: 12px;
    color: #a6a6a6;
    position: absolute;
    bottom: 0;
    right: 0;
}

.container2{
    width:50%;
    max-width: 122.5rem;
    margin:0 auto;
    padding: 0 2.4rem;
}
.form-group{
    margin-bottom:1.5em;
    transition:all .3s;
}
.form-label{
    font-size:.75em;
    color:var(--font-color);
    display:block;
    opacity:0;
    transition: all .3s;
    transform:translateX(-50px);
}
.form-control{
    box-shadow:none;
    border-radius:0;
    border-color:#ccc;
    border-style:none none solid none;
    width:100%;
    font-size:1.25em;
    transition:all .6s;
}
.form-control::placeholder{
    color:#aaa;
}
.form-control:focus{
    box-shadow:none;
    border-color:var(--font-hover-color);
    outline:none;
}
.form-group:focus-within{
    transform:scale(1.1,1.1);
}

.form-control:invalid:focus{
    border-color:red;
}
.form-control:valid:focus{
    border-color:green;
}

.btn{
    background: 0 0 #fff;
    border:1px solid #aaa;
    border-radius:3px;
    color:var(--font-color);
    font-size:1em;
    padding:10 50px;
    text-transform:uppercase;
}
.btn:hover{
    border-color:var(--font-hover-color);
    color:var(--font-hover-color);
}
textarea{
    resize:none;
}



.focused > .form-label{
    opacity:1;
    transform:translateX(0px);

}


   </style>
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
                <ul class = "nav-list">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active1">Acasa</a>
                    </li>

                    <li class="nav-item">
                        <a href="index.php#poveste" class="nav-link">Despre Noi</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php#modele" class="nav-link">Modele Noi</a>
                    </li>
                    <li class="nav-item">
                        <a href="comunitate.php" class="nav-link">Comunitate</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

<section class="modele-noi between1" id = "modele"> 
        <div class="container">
            <div class="global-headline">
                <div class="animate-top">
                    <h2 class="sub-headline" style = "color: white; -webkit-text-stroke: 2px #ff8400;">
                        <span class="first-letter">C</span>omunitate
                    </h2>
                </div>
            </div>
        </div>
    </section>
	<section class="discover-our-team">
	<div class="row" >	
		     <div class="animate-bottom" style ="padding:10px;">
                    <p>Câți dintre noi ne simțim cu adevărat liberi să ne exprimam?Cati dintre noi știm ca putem să ne acceptam problemele?Cati dintre noi putem spune ca nu am trecut vreodată printr-un moment cu adevărat greu?Aceastea sunt 3 întrebări importante la care, din păcate, puțini  oameni  ai  generatiei  actuale ar raspunde pozitiv.De ce? Din cauza tuturor problemelor la care suntem expusi, lumii in care traim,  situatiilor pe care le interpretam  și gândurilor pe care ni le cream singuri.Pana acum nu ne am acceptat problemele sau pe noi înșine , dar, involuntar, am  acceptat negativitatea generala care a ajuns în cele din urma să fie o banalitate si in acelasi timp o problema majora. Din cauza acestei dure realitati pe care o trăim am decis sa cream o lume sigura și buna pentru toti. Ne consideram diferiți fata de alte branduri datorită comunitatii pe care dorim sa o cream chiar aici pe site ul nostru pentru ca fiecare dintre noi  sa reușească sa accepte  tot raul ca sa-l poată indeparta. Fii liber sa te exprimi, sa accepți și sa realizezi . Mai jos se vor pulica anonim experiențe personale ce vor ajuta eradicarea problemelor si sublinierea gravitatatii acestora.
                    </p>
            </div>
        </section>
        <section class="revista between" id = "modele"> 
        <div class="container">
            <div class="global-headline">
                <div class="animate-top">
                    <h2 class="sub-headline" style = "color: white; -webkit-text-stroke: 2px #ff8400;">
                        <span class="first-letter">E</span>xperiente
                    </h2>
                </div>
            </div>
        </div>
    </section>
  		<div class="column" style = "padding:10px; ">
                	                    <p>Depresia. Depresia după moartea unui părinte. Asta am ,,experimentat” eu după cum am spune noi in ziua de azi. Cea mai oribila experienta pe care un copil ar putea sa o trăiască la o vârsta atat de frageda. Sa-și vadă parintele cum își da ultima suflare in fata ochilor lui...de acolo a pornit și atacul de panica. Panica de a pierde alti oameni dragi...panica de a rămâne singur pe lume...dar și lipsa de încredere in ceilalti...am trăit pe pielea mea miștourile celorlati in acea perioada, dar am trecut peste cu ajutorul prietenilor de lângă mine și familie. <br>
                                        </p>
                                        <p style = "text-align: right">~Anonim</p>
  		</div>
  		  		<div class="column" style = "padding:10px; float:left">
                      <p>               </p>
  		</div>
  		<div class="column" style = "padding:10px; ">
                      <p>De-a lungul anilor am trecut prin fel și fel de lucruri care m-au ajutat sa-mi formez caracterul pe care îl am astăzi. Din cauza faptului ca mi-am pus încrederea in persoane nepotrivite, am avut mult de suferit și pe aceasta cale vreau sa le dau un sfat  adolescenților din ziua de azi sa abia mare grija in cine își pun încredere și pe cine considera prieteni. Este foarte important. 
Un alt lucru ar fi influența  pe care o au altii aspura ta. Mie, spre exemplu, mi-a pasat prea mult de părerea altora in loc sa imi formez propria mea parere și nu m-a ajutat deloc. Un sfat ar fi acela de a nu te interesa părerea celorlalți și de a încerca sa fi cât se pote de original și unic in felul tau. 
Sper ca am putut sa ofer câteva  sfaturi celor care au nevoie, chiar și prin câteva cuvinte mici! Mult succes cu proiectul vostru și toate cele bune


<br>
                                        </p>
                                        <p style = "text-align: right">~Anonim</p>
  		</div>
	</div>
	
		<div class="row" >	
		     
  		<div class="column" style = "padding:10px; ">
                	                    <p>
                                        </p>
                                       
  		</div>
  		<div class="column" style = "padding:10px; ">
                      <p><p>Acum ceva timp cand aveam probleme severe de incredere de sine imi canalizam furia in familie pentru lucrurile pe care nu reuseam sa le fac in afara.

<br>
                                        </p>
                                        <p style = "text-align: right">~Anonim</p>

<br>
                                        </p>
                                        
  		</div>
  		<div class="column" style = "padding:10px;">
                      <p>

<br>
                                        </p>
                                      
  		</div>
	</div>
	
	<div class="row" >	
		     
  		<div class="column" style = "padding:10px; ">
<p>
Ei bine cand vine vorba de anxietate, depresie si neincredere in sine nu cred ca exista vreun adolescent care sa spuna ca nu a suferit de niciuna dintre ele. Experienta mea cu viata de adolescent mi-a oferit pana acum cateva experiente neplacute cauzate de lipsa de incredere de sine care m-au impiedicat sa fac sau sa spun anumite lucruri asupra carora mi-as fi dorit sa actionez, dar nu am avut puterea necesara, gandindu-ma doar la ce ar fi putut spune altii despre mine. Odata ce esti un om extrovertit si care isi doreste sa ofere lucruri bune persoanelor din jurul tau , dar nu poate deoarece este incatusat de lipsa increderii in sine si a anxietatii ca nu poti fi la fel de bun ca si varianta ta originala, atunci perioada de viata in care suporti aceste sentimente devine una nefolositoare, chiar frustranta. Sunt multe modalitati prin care poti reduce aceste “boli adolescentine”. Pe mine personal ma face sa ma simt bine si sa imi ofere confortul necesar de a fi ok vorbitul cu prietenii, activitatile de creativitate si nu in ultimul rand purtarea hainelor care ma reprezinta. Aici intervine 404Outofstock. Sunt sigura ca toti dintre noi am avut sau avem un mesaj de transmis, dar nu si curajul sau puterea sa o facem. Purtarea hainelor cu un mesaj puternic ce te reprezinta si in care te simti bine poate sa iti ofere o incredere in sine neasteptata si uimitoare, am incercat pe
propria piele. Haideti sa transmitem
ceva ca sa ne putem ajuta reciproc sa trecem peste neplacerile pe care cu totii le avem... Pentru mine una dintre solutiile lipsei de incredere este purtarea hainelor ce ma definesc si care transmit mesajul pe care eu nu pot intotdeauna.

                                        </p>
                                        <p style = "text-align: right">~Anonim</p>
  		</div>
  		<div class="column" style = "padding:10px; ">
                      <p>

<br>
                                        </p>
                                        
  		</div>
  		<div class="column" style = "padding:10px;">
                      <p>- anxietate - 
Se zice că dacă ajungi să te simți mai tot timpul copleșit de situații pe care nu le poți controla este un semn ca ai nevoie de ajutor din exterior. Cu toate acestea, mă prind adesea gândindu-mă la cum s-ar zice ca am prieteni, dar mă simt invizibilă, la cum mă atașez de oameni, iar ei dau semne că n-ar avea sentimente reciproce față de mine, la cum ofer totul, dar nu primesc nimic în schimb. Modul în care îmi desconsider propria persoană punându-mi întrebări de tipul: “oare sunt chiar așa de ...?” devine îngrijorător. De altfel, indiferent de numărul mare de nopți plânse și de zâmbetul șters pe care îl port in fiecare zi pentru a le ascunde, simt că îmi voi descoperi meritul numai cu ajutorul propriei persoane.

<br>
                                        </p>
                                        <p style = "text-align: right">~Anonim</p>
  		</div>
	</div>
	</section>
<section class="modele-noi between1" id = "revista">
        <div class="container">
            <div class="global-headline">
                <div class="animate-top">
                    <h2 class="sub-headline">
                        <span class="first-letter">A</span>dauga-ti
                    </h2>
                </div>
                <div class="animate-bottom">
                    <h1 class="headline">Experienta</h1>
                </div>
            </div>
        </div>
    </section>
    <section>
    <form action="comunitate.php" method="POST" class="form">
        <div class="form-group">
            <label for="message" class="form-label">Mesaj</label>
                <textarea class="form-control" rows="5" cols="50" id="message" name="message" placeholder="Scrie un mesaj." tabindex="1"></textarea>
        </div>
        <button type="submit" style="background: #ff8400; color: white;">Trimite!</a>
        </form>

    </form>
	</section>
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
                            <a href="#"><i class="fab fa-instagram"></i> @404outofstock</a>
                        </li>
                        <li><a href = "#"><i style="font-size:12px" class="fa">&#xf095; </i> 0747 034 046 (12:00 - 18:00)</a></li>
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
    $('#form').submit(function(e){
    e.preventDefault();
    //then do the submit.
});
</script>
</body>
</html>