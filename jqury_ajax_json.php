 <html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    </head>
    <body onload="viewdata()">
        
        <script>
            function viewdata() {
              jQuery.ajax({
                    type: "GET",
                    url: "json_data.php",
                }).done(function(msg) {
                    $("#viewdata").html(msg);
                }).fail(function(jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
            }
        </script>
        <div style="margin-top: 10px;" id="viewdata"></div>
    </body> 
 </html>
 