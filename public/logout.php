<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $(window).load(function()
        {
            // executes when complete page is fully loaded, including all frames, objects and images
           disconnectUser();
        });

        function disconnectUser(access_token) {
    var revokeUrl = 'https://accounts.google.com/o/oauth2/revoke?token=' +
        access_token;
            gapi.auth.signOut();


            // Perform an asynchronous GET request.
    $.ajax({
    type: 'GET',
    url: revokeUrl,
    async: true,
    contentType: "application/json",
    dataType: 'jsonp',
    success: function(nullResponse) {
        // Do something now that user is disconnected
        console.log('revoke response: ' + result);
        $('#profile').empty();
        $('#authResult').empty();

        // Start account clean up
    },
    error: function(e) {
        // Handle the error
        // console.log(e);
        // You could point users to manually disconnect if unsuccessful
        // https://plus.google.com/apps
    }
  });
    $.get('killsession.php', function() {
        alert("You are now signed out");

        //Here you may do further things.

        window.location.href = "http://localhost:63342/CS50finalproject/public/index.php";
        //$('#revokeButton').hide();
    });
}
    });
// Could trigger the disconnect on a button click
//$('#revokeButton').click(disconnectUser);
</script>
<!-- <button id="revokeButton">Disconnect</button> -->
