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
        <div id="navber">
            <div id="logo">
                <img src="images/ARINAUNIVERSELOGO.png" alt="logo">
            </div>

            <div class="nav">
                <select id="language" class="selectpicker form-control form-control-sm" data-width="auto" data-style="btn-primary" name="language" onchange="changelang()">
                    <option value="en">ENG</option>
                    <option value="zh_TW">TW</option>
                    <option value="zh_CN">CN</option>
                </select> 
            </div>

            <div class="nav">
                <span class="social">
                    <a href="https://www.facebook.com/GlobalIdolCoin/"><img src="images/icon/Facebook.png" alt=""></a>
                    <a href="https://twitter.com/GIC48226830"><img src="images/icon/Twitter.png" alt=""></a>
                    <a href="https://www.instagram.com/taiwan_gic/"><img src="images/icon/Instagram.png" alt=""></a>
                    <a href="https://www.youtube.com/channel/UCm5YE9imTe4LVGOJrSpoJ2g/featured?view_as=subscriber"><img src="images/icon/Youtube.png" alt=""></a>
                </span>
            </div>

            <div class="nav" id="nav-link">
                <ul>
                    <li><a href="#top" >HOME</a></li>
                    <li><a href="" >HOW TO PLAY</a></li>
                    <li><a href="" >TABLE</a></li>
                    <li><a href="" >SMART CONTRACT</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div id="header-left" class="col-sm-12 col-md-7">
                <div class="video-container">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/W1S7vUCfaEc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                            <button type="button" class="cta" id="scissors">
                                <img src="images/Scissors.png" alt="">
                            </button>

                            <button type="button" class="cta" id="stone">
                                <img src="images/Stone.png" alt="">
                            </button>

                            <button type="button" class="cta" id="paper">
                                <img src="images/Paper.png" alt="">
                            </button>
                        </div>
                    </div>

                    <div class="win-something">
                        <p data-i18n-text="winSomething"></p>

                    </div>

                    <div class="win-code">
                        <p data-i18n-text="winCode"></p>
                    </div>
                </div>

                <div class="col-sm-10 col-md-4 game-img">
                    <img src="images/ARINA05.png" alt="">
                </div>

                <div class="col-sm-12 col-md-4">
                    <div class="win-and-get">
                        <p data-i18n-text="winAndGet"></p>
                        <div>
                            <span><img src="images/ARINALOGO.png" alt=""></span>
                            <span class="win-number"><p>450</p></span>
                            <span><img src="images/GIClogo.png" alt=""></span>
                            <span class="win-number"><p>90</p></span>
                        </div>
                    </div>

                    <div class="play-history">
                        <p data-i18n-text="playHistoryTitle"></p>
                        <div>
                        <p data-i18n-text="playHistoryContent"></p>
                        </div>
                    </div>

                    <div class="prize-history">
                        <p data-i18n-text="prizeHistoryTitle"></p>
                        <div>
                        <p data-i18n-text="prizeHistoryContent"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!------list-------------------->
    <section id="list">
        <div class="container">
            <div class="row">
                <div class="col-sm-1 col-md-3 model">
                    <img src="images/ARINA01.png" alt="">
                </div>
                <div class="col-sm-10 col-md-6 list">
                    <img src="images/WINNINGBET.png" alt="">
                </div>
                <div class="col-sm-1 col-md-3 model" id="model2">
                    <img src="images/ARINA04_2.png" alt="">
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
                        <img src="images/8DAPPLISTING/dapp_logo.png" alt="">
                    </div>
                    <div class="small-dapp">
                        <img src="images/8DAPPLISTING/dappreview.png" alt="">
                    </div>
                    <div class="big-dapp">
                        <img src="images/8DAPPLISTING/dapp_online.png" alt="">
                    </div>
                    <div class="big-dapp">
                        <img src="images/8DAPPLISTING/dapptotal.png" alt="">
                    </div>
                </div>

                <div id="bottom">
                    <div class="copyright">
                        <p>Copyright&copy; 2018.GIC-COIN All Rights Reserved.</p>
                        <div></div>
                    </div>

                    <div class="footer ARINAUNIVERSELOGO">
                    <img src="images/ARINAUNIVERSELOGO.png" alt="">
                    </div>

                    <div class="footer icon">
                        <ul class="nav">
                            <li>
                                <a href="https://www.facebook.com/GlobalIdolCoin/"><img src="images/icon/Facebook.png" alt=""></a>
                                <a href="https://twitter.com/GIC48226830"><img src="images/icon/Twitter.png" alt=""></a>
                                <a href="https://www.instagram.com/taiwan_gic/"><img src="images/icon/Instagram.png" alt=""></a>
                                <a href="https://www.youtube.com/channel/UCm5YE9imTe4LVGOJrSpoJ2g/featured?view_as=subscriber"><img src="images/icon/Youtube.png" alt=""></a>
                            </li>
                        </ul>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
            
    </footer>

    



<script type="text/javascript">
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

</body>

</html>

