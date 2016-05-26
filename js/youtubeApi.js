
$(document).ready(function () {

	$("#hideCeleb").rotate({ endDeg:180,duration:0.2, persist:true });
 




var inputUserName = '';
var apiKey = "AIzaSyAGL37W8vsO8Mn8-SE8hKBjyj2r6aohSDQ";

$('#submitUserName').click(function() {
      inputUserName = $('#userName').val();  
  $.get(
          "https://www.googleapis.com/youtube/v3/channels", {
            part: 'snippet',
            forUsername: inputUserName,
            key: apiKey
           },
  function (data) {

    $.each(data.items, function (i, item) {
      console.log(item);
      addUser(item);
      //pid = item.contentDetails.relatedPlaylists.likes;
      //console.log(pid.snippet.thumbnails.default.url);
      //gitVids(pid);

    });
  });

  function addUser(item) {
  		//console.log(item.snippet.title);
  		//console.log(item.snippet.description);
		//console.log(item.snippet.thumbnails.default.url);
		
        $.ajax(
        {
            url:'/PHP_Project/model/channel_post.php',
            type:'POST',
            data : {
                title: item.snippet.title,
                description: item.snippet.description,
                imgUrl: item.snippet.thumbnails.high.url
            },
            success:function(response) {
                console.log(response);
            }
        }
        );
        location.reload();
		
  }
  /*function gitVids(pid) {
    $.get("https://www.googleapis.com/youtube/v3/playlistItems", {
              part: 'snippet',
              maxResults: 50,
              playlistId: pid,
              key: apiKey
            },
    function (data) {

      var output;
      $.each(data.items, function (i, item) {
	      console.log(item);
        vidTitle = item.snippet.title;
        vidId = item.snippet.resourceId.videoId;

        
      });

    }
    );}*/
});


$('#q').keyup( function(){
    if($('#q').val().length != 0) {
        $("#cancelButton").prop("disabled",false);
        $field = $(this);
        $('#results').html(''); // on vide les resultats
        $('#ajax-loader').remove(); // on retire le loader

        // on commence à traiter à partir du 2ème caractère saisie
        if( $field.val().length > 1 )
        {
          // on envoie la valeur recherché en GET au fichier de traitement
          $.ajax({
            type : 'GET', // envoi des données en GET ou POST
            url : '/PHP_Project/controller/ajax-search.php' , // url du fichier de traitement
            data : 'q='+$(this).val() , // données à envoyer en  GET ou POST
            beforeSend : function() { // traitements JS à faire AVANT l'envoi
                $field.after('<img src="/PHP_Project/view/citizen/img/loading.gif" alt="loader" id="ajax-loader" />'); // ajout d'un loader pour signifier l'action
            },
            success : function(data){ // traitements JS à faire APRES le retour d'ajax-search.php
                $('#ajax-loader').remove(); // on enleve le loader
                $('#results').html(data); // affichage des résultats dans le bloc
            }
        });
        } 
    }      

    $("#cancelButton").click(function() {
        location.reload();
    });
  });
});