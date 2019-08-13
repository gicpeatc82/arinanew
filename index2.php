<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="title" content="ARINA YAKYUKEN">
    <meta name="description" content="The World’s first DAPP for AV Star.">
    <meta name="author" content="">

    <title>ARINA YAKYUKEN</title>
    <link rel="shortcut icon" href="https://www.arinamillion.com/arinanew/images/favicon_arina.ico" type="image/x-icon" />
	<link rel="Bookmark" href="https://www.arinamillion.com/arinanew/images/favicon_arina.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Raleway:400,500,600,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="js/web3.js"></script>
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/abi.js"></script>
    <script src="js/abi2.js"></script>
    <script src="js/ethereum.js"></script>
    <script src="https://js.maxmind.com/js/apis/geoip2/v2.1/geoip2.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/jquery.gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/plugins/ModifiersPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/plugins/CSSRulePlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/plugins/TextPlugin.min.js"></script>
    

</head>



<body>
<!------header-------------------->
    <header id="header">
        <img src="images/BG.png" alt="">
        <nav class="navbar navbar-expand-md " id="navber">
            <!-- Brand/logo -->
            <div class="navbar-brand navbar-brand01" >
                <img src="images/ARINAUNIVERSELOGO.png" alt="logo">
            </div>
            <div class="navbar-brand navbar-brand02" style="display:none" >
                <img style="width:50%;" src="images/ARINALOGO.png" alt="logo">
            </div>
            
            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item nav-item-main" id="nav-link" style="max-width:20%;">
                    <span class="nav-link">
                        <a class="link-main" href="https://www.arinamillion.com/arinanew/" >HOME</a>
                    </span>
                </li>

                <li class="nav-item nav-item-main" style="max-width:37%;">
                    <span class="nav-link">
                        <a class="link-main" href="howtoplay.php" >HOW TO PLAY</a>
                    </span>
                </li>

                <li class="nav-item nav-item-main" style="max-width:20%;">
                    <span class="nav-link">
                        <a class="link-main" href="#lottery0" >TABLE</a>
                    </span>
                </li>

                <li class="nav-item nav-item-main" style="max-width:40%;">
                    <span class="nav-link">
                        <a class="link-main" href="https://etherscan.io/address/0xcCdA5213d453388fB5fB43054BC261c8636b1e51#code" >SMART CONTRACT</a>
                    </span>
                </li>

                <li class="nav-item facebook">
                    <span class="nav-link">
                        <a href="https://www.facebook.com/GlobalIdolCoin/"><img src="images/icon/Facebook.png" alt=""></a>
                    </span>
                </li>

                <li class="nav-item social">
                    <span class="nav-link">
                        <a href="https://twitter.com/GIC48226830"><img src="images/icon/Twitter.png" alt=""></a>
                    </span>
                </li>

                <li class="nav-item social">
                    <span class="nav-link">
                        <a href="https://www.instagram.com/taiwan_gic/"><img src="images/icon/Instagram.png" alt=""></a>
                    </span>
                </li>

                <li class="nav-item social">
                    <span class="nav-link">
                        <a href="https://www.youtube.com/channel/UCm5YE9imTe4LVGOJrSpoJ2g/featured?view_as=subscriber"><img src="images/icon/Youtube.png" alt=""></a>
                    </span>
                </li>

                <li class="nav-item language">
                    <select id="language" class="selectpicker form-control form-control-sm" data-width="auto" data-style="btn-primary" name="language" onchange="changelang()">
                        <option value="en">ENG</option>
                        <option value="zh_TW">TW</option>
                        <option value="zh_CN">CN</option>
                    </select> 
                </li>
            </ul>
        </nav>


        <div class="row">
            <div id="header-left" class="col-sm-12 col-md-7">
                <div class="video-container">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/W1S7vUCfaEc?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                
                        <!-- <iframe  src="https://drive.google.com/file/d/1alkC-DghxWSiKHE09j74NzV3P9MfeX6O/preview" width="720" height="480" autoplay=true></iframe>
                     -->
                        <!-- <video width="720" height="480" controls >  
                            <source src="https://drive.google.com/file/d/1alkC-DghxWSiKHE09j74NzV3P9MfeX6O/preview" type="video/mp4">
                            
                        </video> -->
                    
                </div>
                
                <img id="header-img" src="images/ARINAYAKYUKENLOGO.png" alt="">
                <p id="header-content" data-i18n-text="headerContent"></p>
            </div>
            <div class="col-sm-12  col-md-5">

            </div>
        </div>

        
    </header>
<!------game-------------------->
    <section id="game">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 game-left">
                    <div class="play-a-game">
                        <h5 data-i18n-text="playAGameH5"></h5>
                        <p data-i18n-text="playAGameP"></p>
                        <div class="cta-group">
                            <button type="button" class="cta" id="scissors" onclick="play_a_mora('scissors')">
                                <img src="images/Scissors.png" alt="">
                            </button>

                            <button type="button" class="cta" id="stone" onclick="play_a_mora('stone')">
                                <img src="images/Stone.png" alt="">
                            </button>

                            <button type="button" class="cta" id="paper" onclick="play_a_mora('paper')">
                                <img src="images/Paper.png" alt="">
                            </button>
                        </div>
                    </div>

                    <div class="win-and-get">
                        <p data-i18n-text="winSomething"></p>
                        <div>
                            <span><img src="images/ARINALOGO.png" alt=""></span>
                            <span class="win-number"><p id="win-arina">0</p></span>
                            <span><img src="images/GIClogo.png" alt=""></span>
                            <span class="win-number"><p id="win-gic">0</p></span>
                        </div>
                    </div>

                    <div class="win-code">
                        <div>
                            <p id="lottery0"></p>
                        </div>
                        <p data-i18n-text="winCode"></p>
                    </div>
                </div>

                <div class="col-sm-10 col-md-4 game-img">
                    <img src="images/ARINA05.png" alt="">
                </div>

                <div class="col-sm-12 col-md-4 game-right">
                    <div class="win-and-get">
                        <p data-i18n-text="winAndGet"></p>
                        <div>
                            <span><img src="images/ARINALOGO.png" alt=""></span>
                            <span class="win-number"><p id="expect-arina">0</p></span>
                            <span><img src="images/GIClogo.png" alt=""></span>
                            <span class="win-number"><p id="expect-gic">0</p></span>
                        </div>
                    </div>

                    <div class="play-history">
                        <p data-i18n-text="playHistoryTitle"></p>

                        <div>
                            <p id="record"></p>
                        </div>
                    </div>

                    <div class="prize-history">
                        <p data-i18n-text="prizeHistoryTitle"></p>

                        <div>
                            <p id="lottery"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- Trigger the modal with a button -->


    </div>
        <button id="paly-video" type="button" style="display:none" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div id="game-video">
                    
                    </div>
                </div>
            </div>
        </div>
    </section>
<!------list-------------------->
    <section id="list">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-3 model model1">
                    <img src="images/ARINA01.png" alt="">
                </div>
                <div class="col-sm-6 col-md-6 list">
                    <img src="images/WINNINGBET.png" alt="">
                </div>
                <div class="col-sm-3 col-md-3 model model2">
                    <img src="images/ARINA04.png" alt="">
                </div>
            </div>
        </div>
    </section>
<!------footer-------------------->
    <footer>
        <div id="footer">
            <img id="ShapeBG" src="images/ShapeBG.png" alt="">

            <div class="footer-content">
                <div id="dapp-listing" class="container">
                    <h3 data-i18n-text="dappListing"></h3>
                    <div class="small-dapp">
                        <a target="_blank" href="https://www.dapp.com/zh/dapp/arina-land-tycoon">
                            <img src="images/8DAPPLISTING/dapp_logo.png" alt="">
                        </a>
                    </div>
                    <div class="small-dapp">
                        <a target="_blank" href="https://dapp.review/dapp/11734/ARINA-LAND-TYCOON">
                            <img src="images/8DAPPLISTING/dappreview.png" alt="">
                        </a>
                    </div>
                    <div class="big-dapp">
                        <a target="_blank" href="https://dapponline.io/dappDetail/2377">
                            <img src="images/8DAPPLISTING/dapp_online.png" alt="">
                        </a>
                    </div>
                    <div class="big-dapp big-dapp2">
                        <a target="_blank" href="https://dapptotal.com/detail/8395/ARINA-LAND-TYCOON">
                            <img src="images/8DAPPLISTING/dapptotal.png" alt="">
                        </a>
                    </div>
                </div>

                <div id="bottom">
                    <hr>
                    <div class="copyright">
                        <p>Copyright&copy; 2018.GIC-COIN All Rights Reserved.</p>
                        
                    </div>

                    <div class="footer ARINAUNIVERSELOGO">
                    <img src="images/ARINAUNIVERSELOGO.png" alt="">
                    </div>

                    <div class="footer icon">
                        <ul class="nav">
                            <li>
                                <a href="https://www.facebook.com/GlobalIdolCoin/"><img src="images/icon/Facebook.png" alt=""></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/GIC48226830"><img src="images/icon/Twitter.png" alt=""></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/taiwan_gic/"><img src="images/icon/Instagram.png" alt=""></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCm5YE9imTe4LVGOJrSpoJ2g/featured?view_as=subscriber"><img src="images/icon/Youtube.png" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
            
    </footer>

    



<script type="text/javascript">
/////隱藏navber
    $(function(){
        $(window).scroll(function () {
            var scrollVal = $(this).scrollTop();
            
            if (scrollVal > 0) {
                $('#navber').addClass('navber');
            } else {
                $('#navber').removeClass('navber');
            }
        });
    });

/////自動換圖
    var imgarr = [
        '<img src="images/ARINA05.png" alt="">',
        '<img src="images/ARINA03.png" alt="">',
        '<img src="images/ARINA02.png" alt="">'
    ]

    function get_random(){
        return Math.floor(Math.random()*3)
    }
    $(function(){
        setInterval(function(){
            //console.log(imgarr[get_random()]);
            $(".game-img").empty().append(imgarr[get_random()]);
        },4000);
    });
//////
    // function get_random(){
    //     return Math.floor(Math.random()*3)+1
    // }
    // var videoPaperDraw = [
    //   '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/ehnejXfQezw?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
    //   '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/J4580IxL3iI?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
    //   '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/Eb8RRCLLK3s?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
    // ]
    // $(function(){
    //     let index = get_random()
    //     console.log(index);
    //     $("#game-video").empty().append(videoPaperDraw[index]);

    //     $("#paly-video").click();
    // });
</script>

<script type='text/javascript' src='js/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.dotdotdot/3.1.0/jquery.dotdotdot.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/89/three.min.js"></script>
<script src="js/main.js"></script>

<script type='text/javascript' src='js/masonry.pkgd.min.js'></script>
<script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
<script type='text/javascript' src='js/swiper.min.js'></script>
<script type='text/javascript' src='js/jquery.countdown.min.js'></script>
<script type='text/javascript' src='js/circle-progress.min.js'></script>
<script type='text/javascript' src='js/jquery.countTo.min.js'></script>
<script type='text/javascript' src='js/custom.js'></script>
<script type="text/javascript" src="js/jquery.i18n.properties.js"></script>
<script type="text/javascript" src="js/common_i18n.js"></script>


<script>

</script>

</body>

</html>

