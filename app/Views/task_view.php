<!DOCTYPE html>
<html>
    <head>
        <title>Pattern Generator</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            html, body {
                color: rgba(33, 37, 41, 1);
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
                font-size: 16px;
                margin: 0;
                padding: 0;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
                text-rendering: optimizeLegibility;
            }
    
            ul {
                border-bottom: 1px solid rgba(242, 242, 242, 1);
                list-style-type: none;
                margin: 0;
                overflow: hidden;
                padding: 0;
            }            
        
        </style>

    </head>
    <body> 
    <div class="container">
        <div class="modal-dialog">
        <div class="modal-content">
            <form id="myform" method="post">
                <div class="modal-header">
                <h4 class="modal-title">Number</h4>
                </div>
                <div class="modal-body">
                <p><input type="text" placeholder="Enter numbers" name="num" required="" class="form-control"></p>
                </div>
                <div class="modal-footer flex">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Submit</button><button style="display:none" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
        <br>
            <h3>Numbers:</h3>
            <div id="result"></div>
        </div>  
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(function(){
        $("#myform").submit(function(event){
            event.preventDefault();         
            var dataString = $(this).serialize();         
            $.ajax({
                type: "POST",
                url: "generatenum", 
                data: dataString,
                success: function(data){                    
                    //alert(data);
                    var obj = JSON.parse(data);
                    var html = '<ul>';
                    $.each(obj.numbers, function(index, array) {
                        html += '<li>';
                        $.each(array, function(innerIndex, value) {
                            html += value + ' ';
                        });
                        html += '</li>';
                    });
                    html += '</ul>';
                    $("#result").html(html);

                    $("#result").addClass("alert alert-success");
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
    </script>
    </body>
</html>
