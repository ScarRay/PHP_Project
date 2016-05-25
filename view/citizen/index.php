<!DOCTYPE html>
<html>
<head>
    
    
    <script src="/PHP_Project/js/jquery-1.12.3.js"></script>
    <script src="/PHP_Project/css/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/PHP_Project/css/main.css">
    <link href="/PHP_Project/css/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="/PHP_Project/css/citizen.css">
     <script type="text/javascript" src="/PHP_Project/js/tabs.js"></script>

</head>
<body>
    <?php include("../bodysite/entete.php"); ?>
    <?php include("../bodysite/menu.php"); ?>
    <div id="container">
    <h1 class="page-header">Citizen News</h1>
    <div align="center" width="100%">
        <select id="rss_num">
            <option value=5>5 articles</option>
            <option value=10 selected="selected">10 articles</option>
            <option value=15>15 articles</option>
            <option value=20>20 articles</option>
        </select>
    </div>
    <br/>
    <div id="containerNews">
        <div id="une" class="tabs">
            <div class="tab-links btn-group">
                <a type="button" class="btn btn-primary" href="#monde">Le Monde</a>
                <a type="button" class="btn btn-primary" href="#libera">Liberation</a>
                <a type="button" class="btn btn-primary" href="#lequipe">L'equipe</a>
                <a type="button" class="btn btn-primary" href="#parisien">Le Parisien</a>
                <a type="button" class="btn btn-primary" href="#lcp">LCP</a>
            <div class="input-group">                                            
                <a type="button" ID="listesites1" Class="form-control"></a>
            <div class="input-group-btn">
                <button type="button" class="btn btn-primary dropdown-toggle pull-left" data-toggle="dropdown">
                    <span class="caret"></span>
                </button>
                <ul id="ulsite1" class="dropdown-menu dropdown-menu-right">
                    <li><a href="#jvc">Jeux video.com</a></li>
                    <li><a href="#figaro">Le Figaro</a></li>
                </ul>
            </div>
                 </div>
        </div>

            <div class="tab-content">
                <div id="monde" class="tab active">
                    <div class="post_results" id="post_results001" rss_num="10" rss_url="http://www.lemonde.fr/rss/une.xml">
                        <div class="loading_rss">
                            <img alt="Loading..." src="img/loading.gif" />
                        </div>
                    </div>
                </div>
                <div id="libera" class="tab">
                    <div class="post_results" id="post_results002" rss_num="10" rss_url="http://www.liberation.fr/rss/latest">
                        <div class="loading_rss">
                            <img alt="Loading..." src="img/loading.gif" />
                        </div>
                    </div>
                </div>
                <div id="figaro" class="tab">
                    <div class="post_results" id="post_results003" rss_num="10" rss_url="http://rss.lefigaro.fr/lefigaro/laune?format=xml">
                        <div class="loading_rss">
                            <img alt="Loading..." src="img/loading.gif" />
                        </div>
                    </div>
                </div>
                <div id="lcp" class="tab">
                    <div class="post_results" id="post_results004" rss_num="10" rss_url="http://www.lcp.fr/rss-site">
                        <div class="loading_rss">
                            <img alt="Loading..." src="img/loading.gif" />
                        </div>
                    </div>
                
                </div>
                <div id="parisien" class="tab">
                    <div class="post_results" id="post_results005" rss_num="10" rss_url="http://www.leparisien.fr/une/rss.xml">
                        <div class="loading_rss">
                            <img alt="Loading..." src="img/loading.gif" />
                        </div>
                    </div>
                </div>
                <div id="lequipe" class="tab">
                    <div class="post_results" id="post_results006" rss_num="10" rss_url="http://www.lequipe.fr/rss/actu_rss_Football.xml">
                        <div class="loading_rss">
                            <img alt="Loading..." src="img/loading.gif" />
                        </div>
                    </div>
                </div>
                <div id="jvc" class="tab">
                    <div class="post_results" id="post_results007" rss_num="10" rss_url="http://www.jeuxvideo.com/rss/rss.xml">
                        <div class="loading_rss">
                            <img alt="Loading..." src="img/loading.gif" />
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <div id="iframeContainer1" style="height:1000px;" class="iframeContainer">
    <div id="loadingFrame"> <img style="margin-left:60px;margin-bottom:30px;" alt="Loading..." src="img/loading.gif" />
        <p>Please select an article</p>
        </div>
       
        <!--<iframe id="iframe1" width="49%" height="1000px" sandbox="" src="about:blank" name="newsIframe" seamless align="left"></iframe>--> 
    </div>
     </div>
    <?php include("../bodysite/footer.php"); ?>
    <!--<div id="iframeContainer2" class="iframeContainer">
    </div>-->
    
</body>
</html>


