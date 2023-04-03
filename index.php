<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT ir spēks</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
    <header>
        <div class="logo"><img src="images/logo.png">IT ir spēks</div>
        <nav class="nav">
            <ul>
                <li><a href="#home">Sākums</a></li>
                <li><a href="#aktualitates">Aktualitātes</a></li>
                <li><a href="#vakances">Vakances</a></li>
                <li><a href="#pakalpojumi">Pakalpojumi</a></li>
                <?php
                <li><a href="login.php"><i class="fa-solid fa-right-to-bracket border"></i></a></li>
                  <a href="../files/logout.php"> $lietvards = $_SESSION['lietotajvards']; echo "<b>$lietvards </b>"<i class="fas fa-power-off"></i></a>
                ?>
            </ul>
        </nav>
    </header>

    <section id="home">
        <h1>Kas ir "IT ir spēks"</h1>
        <div class="box-container">
            <div class="box">
                <img name="slide">
            <p> IT ir spēks ir tāda mājaslapa, kura ir domāta cilvēkiem, kuri vēlas atrast vakances,  aktualitātes, pakalpojumus.</p>
        </div>
    </div>
    </section>

    <section id="aktualitates">
        <h2>IT jaunākās aktualitātes</h2>
        <div class="box-container">
            <div class="box">
                <img src="images/akt1.jpg" alt="1.jaunums">
                <h3>Jauna NVIDIA RTX videokarte.</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique molestias sapiente,
                 quas modi neque distinctio non illo, quam ut, dolores quasi temporibus inventore consequatur reiciendis provident
                sit aspernatur labore nemo.</p>
                
            </div> 
    
            <div class="box">
                <img src="images/akt2.jpg" alt="2.jaunums">
                <h3>Tiek izstrādāta jauna programmēšanas valoda</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique molestias sapiente,
                    quas modi neque distinctio non illo, quam ut, dolores quasi temporibus inventore consequatur reiciendis provident
                   sit aspernatur labore nemo.</p>
            </div> 
    
            <div class="box">
                <img src="images/akt3.jpg" alt="3.jaunums">
                <h3>Automātiska WEB izstrādes programmatūra drīzumā klāt</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique molestias sapiente,
                    quas modi neque distinctio non illo, quam ut, dolores quasi temporibus inventore consequatur reiciendis provident
                   sit aspernatur labore nemo.</p>
            </div> 
        </div>
    </section>
    <section id="vakances">
        <h2>IT vakances</h2>
        <div class="box-container">
            <div class="box">
                <img src="images/programmer.jpg" alt="1.vakance">
                <h3>Programmētājs</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique molestias sapiente,
                 quas modi neque distinctio non illo, quam ut, dolores quasi temporibus inventore consequatur reiciendis provident
                sit aspernatur labore nemo.</p>
                <p><span>Atrašanās vieta:</span> Liepāja, Latvija</p>
                <p><span>Vakanču skaits:</span> 5</p>
                <p><span>Darba laiks/veids:</span> 8:00-15:00 / atālināti</p>
                <p><span>Alga:</span> 1500 euro mēnesī bruto</p>
                <a href="pieteiksanas.html" class="btn"><i class="fa fa-info-circle"></i> Pieteikties</a>
            </div> 
    
            <div class="box">
                <img src="images/slud2.jpg" alt="2.vakance">
                <h3>WEB programmētājs</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique molestias sapiente,
                 quas modi neque distinctio non illo, quam ut, dolores quasi temporibus inventore consequatur reiciendis provident
                sit aspernatur labore nemo.</p>
                <p><span>Atrašanās vieta:</span> Liepāja, Latvija</p>
                <p><span>Vakanču skaits:</span> 5</p>
                <p><span>Darba laiks/veids:</span> 8:00-15:00 / atālināti</p>
                <p><span>Alga:</span> 2500 euro mēnesī bruto</p>
                <a href="pieteiksanas.html" class="btn"><i class="fa fa-info-circle"></i>Pieteikties</a>
            </div> 
    
            <div class="box">
                <img src="images/slud3.jpg" alt="3.vakance">
                <h3>PHP programmētājs</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique molestias sapiente,
                 quas modi neque distinctio non illo, quam ut, dolores quasi temporibus inventore consequatur reiciendis provident
                sit aspernatur labore nemo.</p>
                <p><span>Atrašanās vieta:</span> Liepāja, Latvija</p>
                <p><span>Vakanču skaits:</span> 5</p>
                <p><span>Darba laiks/veids:</span> 8:00-15:00 / atālināti</p>
                <p><span>Alga:</span> 5500 euro mēnesī bruto</p>
                <a href="pieteiksanas.html" class="btn btn1"><i class="fa fa-info-circle"></i>Pieteikties</a>
            </div> 
        </div>
    </section>
    <section id="pakalpojumi">
        <h2>IT <span>jaunākie</span> pakalpojumi</h2>
        <div class="box-container">
            <div class="box">
                <img src="images/slud4.jpg" alt="1.pakalpojumus">
                <h3>Operētājsistēmas uzinstelētājs</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique molestias sapiente,
                 quas modi neque distinctio non illo, quam ut, dolores quasi temporibus inventore consequatur reiciendis provident
                sit aspernatur labore nemo.</p>
                <p><span>Atrašanās vieta:</span> Liepāja, Latvija</p>
                <p><span>Tālrunis:</span> +371 29 912 412</p>

            </div> 
    
            <div class="box">
                <img src="images/pak2.jpg" alt="1.pakalpojumus">
                <h3>Uzprogrammēs jebko</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique molestias sapiente,
                 quas modi neque distinctio non illo, quam ut, dolores quasi temporibus inventore consequatur reiciendis provident
                sit aspernatur labore nemo.</p>
                <p><span>Atrašanās vieta:</span> Liepāja, Latvija</p>
                <p><span>Tālrunis:</span> +371 23 477 412</p>
            </div> 
    
            <div class="box">
                <img src="images/pak3.jpg" alt="1.pakalpojumus">
                <h3>Tev uztaisīs jebkādu WEB mājaslapu</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique molestias sapiente,
                 quas modi neque distinctio non illo, quam ut, dolores quasi temporibus inventore consequatur reiciendis provident
                sit aspernatur labore nemo.</p>
                <p><span>Atrašanās vieta:</span> Liepāja, Latvija</p>
                <p><span>Tālrunis:</span> +371 23 412 413</p>
            </div> 
        </div>
    </section>

    <footer id="parmums kontakti">
        <div class="box-container">
    <div class="box">
        <h2>Par mums</h2>
        <p>2023. gada februārī, mēs palīdzējam atrast vakanci 1126 cilvēkiem, un turpinam meklēt darbu cilvēkiem.
    </div>
    
    
    <div class="box">
    <h2>Kontakti</h2>
    <p><i class="fa-solid fa-phone"></i>+371 22 345 622</p>
    <p><i class="fa-solid fa-envelope"></i>vakances@latvia.lv</p>
    <p><i class="fa-solid fa-location-dot"></i>Latvija</p>

    </div>
    
    </footer>
    <script src="script.js"></script>       
</body>
</html>