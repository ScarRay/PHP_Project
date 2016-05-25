jQuery(document).ready(function() {
    $('#ulsite1 li').on('click', function(){
        $('#listesites1').html($(this).text());   
        $('#listesites1').attr("href", $(this).children('a').attr("href"))
        
    });
    jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
        console.log("test"); 
        e.preventDefault();
    });
});


function myGetElementsByClassName(selector) {
    if ( document.getElementsByClassName ) {
        return document.getElementsByClassName(selector);
    }

    var returnList = new Array();
    var nodes = document.getElementsByTagName('div');
    var max = nodes.length;
    for ( var i = 0; i < max; i++ ) {
        if ( nodes[i].className == selector ) {
            returnList[returnList.length] = nodes[i];
        }
    }
    return returnList;
}

var rssReader = {
    containers : null,

    // initialization function
    init : function(selector) {
        containers = myGetElementsByClassName(selector);
        for(i=0;i<containers.length;i++){
            // getting necessary variables
            var rssUrl = containers[i].getAttribute('rss_url');
            var num = document.getElementById("rss_num").value;
            var id = containers[i].getAttribute('id');

            // creating temp scripts which will help us to transform XML (RSS) to JSON
            var url = encodeURIComponent(rssUrl);
            var googUrl = 'https://ajax.googleapis.com/ajax/services/feed/load?v=1.0&num='+num+'&q='+url+'&callback=rssReader.parse&context='+id;

            var script = document.createElement('script');
            script.setAttribute('type','text/javascript');
            script.setAttribute('charset','utf-8');
            script.setAttribute('src',googUrl);
            containers[i].appendChild(script);
        }
    },

    // parsing of results by google
    parse : function(context, data) {
        var container = document.getElementById(context);
        container.innerHTML = '';

        // creating list of elements
        var mainList = document.createElement('div');

        // also creating its childs (subitems)
        var entries = data.feed.entries;
        for (var i=0; i<entries.length; i++) {
            var listItem = document.createElement('div');
            var titleAndDate = document.createElement('div');
            titleAndDate.className = "titleAndDate";
            var pdate = document.createElement('p');
            var ptitle = document.createElement('p');
            var link = document.createElement('p');
            
            listItem.className = "article";
            pdate.className = "date";
            ptitle.className = "title";

            var title = entries[i].title;
            var date = entries[i].publishedDate.substr(0,25);
            var contentSnippet = entries[i].contentSnippet;
            var contentSnippetText = document.createTextNode(contentSnippet);

            link.setAttribute('data-href', entries[i].link);
            var containerId = container.id;
                containerId = containerId.substr(12,15);
            /*if(containerId < 100) {
                //link.setAttribute('target','newsIframe');
                link.onclick = function() {loadMyIframe(this.getAttribute('data-href'),document.getElementById('iframeContainer1'))};
            } else {
                //link.setAttribute('target','newsIframe2');
                link.onclick = function() {loadMyIframe(this.getAttribute('data-href'),document.getElementById('iframeContainer2'))};
            }*/
            link.onclick = function() {loadMyIframe(this.getAttribute('data-href'),document.getElementById('iframeContainer1'))};
            
            var text = document.createTextNode(title);
            var dtext = document.createTextNode(date);
            link.appendChild(text); 
            ptitle.appendChild(link);
            pdate.appendChild(dtext);
            titleAndDate.appendChild(ptitle);
            titleAndDate.appendChild(pdate);
            listItem.appendChild(titleAndDate);

            var desc = document.createElement('p');
            desc.appendChild(contentSnippetText);
            mainList.appendChild(listItem);
        }
        container.appendChild(mainList);
    }
};

window.onload = function() {
    rssReader.init('post_results');
}

$(document).on('change','#rss_num',function(){
    rssReader.init('post_results');
});

function loadMyIframe(link, div, element) {
    while (div.firstChild) {
        div.removeChild(div.firstChild);
    }   
    console.log(link);
    var newiframe= document.createElement('iframe');
    newiframe.style.width="100%";
    newiframe.style.height="1000px";
    newiframe.setAttribute("src",link)
    /*if(div == document.getElementById('iframeContainer2')) newiframe.align = "right";
    else newiframe.align = "left";*/
    newiframe.align = "left";
    
    div.appendChild(newiframe);
    $("#footerReload").load("/PHP_Project/view/bodysite/footer.php");
}