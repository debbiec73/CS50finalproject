<?php require("../includes/config.php");
?>

   <!DOCTYPE html>

        <html itemscope itemtype="http://schema.org/Article">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width-device-width, initial-scale=1">

            <title>Homeschool Helps</title>
            <link href="css/bootstrap.min.css" rel="stylesheet" />
            <link href="css/jumbotron.css" rel="stylesheet">
        </head>
        <body>
        <div id="result"></div>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"><button id="signinButton">Sign in with Google</button></span>
                    </button>
                    <a class="navbar-brand" href="http://localhost:63342/website%20with%20google%20login/public/index.php">Homeschool Helps</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="../public/student.php">Track hours</a>
                        </li>
                        <li><a href="../public/editSubjects.php">Edit Subjects</a></li>
                        <li><a href="../public/viewHours.php">View Hours</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class>
                            <a href="../public/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1>Homeschool Helps</h1>
                <h2>A Place for Homeschoolers</h2>
                <p>Here you can record all of the great things your homeschooled children are doing!  Keep track of all the academic and fun things they are doing!</p>
                <p>Please log in with your google account to get started tracking!</p>
                <p><a class="btn btn-primary btn-lg" href="student.php" role="button">Start Tracking</a></p>
                <!--<button id="revokeButton">Disconnect</button> -->
            </div>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
        <script src="js/bootstrap.min.js"></script>
        <meta name="google-signin-clientid" content="271416359764-gqqnqrla4he04cp75fddqilf5uvnk17o.apps.googleusercontent.com" />
        <meta name="google-signin-scope" content="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email" />
        <meta name="google-signin-requestvisibleactions" content="http://schemas.google.com/AddActivity" />
        <meta name="google-signin-cookiepolicy" content="single_host_origin" />
        <!--<button id="signinButton">Sign in with Google</button> -->
        <script type="text/javascript">
            var $id, $name, $email;
            (function() {
                var po = document.createElement('script');
                po.type = 'text/javascript'; po.async = true;
                po.src = 'https://apis.google.com/js/client:plusone.js?onload=render';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(po, s);
            })();

            /* Executed when the APIs finish loading */
            function render() {

                // Additional params including the callback, the rest of the params will
                // come from the page-level configuration.
                var additionalParams = {
                    'callback': signinCallback
                };

                // Attach a click listener to a button to trigger the flow.
                var signinButton = document.getElementById('signinButton');
                signinButton.addEventListener('click', function() {
                    gapi.auth.signIn(additionalParams); // Will use page level configuration
                });
            }
            function signinCallback(authResult) {
                if (authResult['status']['signed_in']) {
                    $('#revokeButton').show();
                    $('#signinButton').hide();
                    // Update the app to reflect a signed in user
                    $('#authResult').html('Auth Result: <br/>');
                    for (var field in authResult) {
                        $('authResult').append(' ' + field + ': ' + authResult[field] + '<br/>');
                    }
                    if(authResult['access_token']) {
                        $('#gConnect').hide();
                    }
                        else {
                        $('#revokeButton').hide();
                    }

                    // Hide the sign-in button now that the user is authorized, for example:
                    document.getElementById('signinButton').setAttribute('style', 'display: none');
                    gapi.client.load('plus', 'v1', loadProfile); //Trigger request to get the email address.
                } else {
                    $('#revokeButton').hide();
                    console.log('there was an error: ' + authResult['error']);
                    // Update the app to reflect a signed out user
                    // Possible error values:
                    // "user_signed_out" - User is signed-out
                    // "access_denied" - User denied access to your app
                    // "immediate_failed" - Could not automatically log in the user
                    console.log('Sign-in state: ' + authResult['error']);
                }
            }
            function loadProfile() {
                var request = gapi.client.plus.people.get({'userId' : 'me'});
                request.execute(loadProfileCallback);
            }
            function loadProfileCallback(obj) {
                profile = obj;
                email = obj['emails'].filter(function(v) {
                    return v.type === 'account'; // Filter out the primary email
                })[0].value; // get the email from the filtered results, should always be definen.
                displayProfile(profile);
            }
            function displayProfile(profile) {
                //document.getElementById('userId').innerHTML = profile['id'];
                //document.getElementById('name').innerHTML = profile['displayName'];
                //document.getElementById('email').innerHTML = email;
                $id = profile['id'];
                $name = profile['displayName'];
                $email = email;
                $.ajax({
                    url: 'signin.php',
                    type: 'POST',
                    //contentType: 'application/json; charset=utf-8',
                    data: {
                        //'profile':profile
                        'userId': profile['id'],
                        'name': profile['displayName'],
                        'email': email

                    },
                    success: function (data) {
                        alert("Thanks for signing in with your Google Account " + $name);
                        $('#gConnect').hide();

                    },
                    error: function (e) {

                        console.log(e.message);

                    }
                });
                console.log($id);
                //alert('Hi' + $id + $name + email);
                //toggleElement('profile');
            }

                function disconnectUser(access_token) {
                    var revokeUrl = 'https://accounts.google.com/o/oauth2/revoke?token=' +
                        gapi.auth.getToken().access_token;
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
                            $('#gConnect').show();
                            document.getElementById('signinButton').setAttribute('style', 'display: show');
                            document.getElementById('revokeButton').setAttribute('style', 'display: hide');
                            $('#revokeButton').hide();

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

                                //window.location = window.location;
                                $('#revokeButton').hide();
                            });
                        }


            // Could trigger the disconnect on a button click
            $('#revokeButton').click(disconnectUser);


            //$(document).ready(function() {


            //})
        </script>




        </body>
        </html>