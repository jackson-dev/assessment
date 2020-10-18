<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Toast -->
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #000000;
                font-family: 'Arial', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                /*display: flex;*/
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 28px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>

    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <a href="/">Back to home</a>
                <div class="title m-b-md">
                    A) Programming Test
                </div>

                <hr>

                <div>
                    Number of Players: 
                    <input type="number" min="1" name="number_of_player" id="number_of_player">
                </div>

                
                <div class="form-group" style="margin-top: 8px;">
                    <button type="button" class="btn btn-primary btn-block">
                        Submit
                    </button>
                </div>

                <div id="output" style="display: none;">
                    <hr>
                    <p><b><u>Output Result</u></b></p>
                    <div id="response">
                        
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
    <script>
        $(document).ready(function(){
          $("button").click(function(){
            $.ajax({
                type: "post",
                url: "{{route('distribute-cards')}}",
                data: {
                    number_of_player: $('#number_of_player').val(),
                    _token: "{{csrf_token()}}"
                },
                success: function (data) {
                    var response = "";
                    $.each(data['player'], function(k, v) {
                        response += "<p>Player " + k + ": " + v + "</p>"
                    });
                    response += "Remainder: " + data.remainder;
                    $("#output").css("display", "block");
                    $("#response").html(response);
                    
                    toastr.success("Cards have been distributed");
                },
                error: function (res) {
                    if('responseJSON' in res && 'errors' in res.responseJSON && 'number_of_player' in res.responseJSON.errors){
                        toastr.warning(res.responseJSON.errors.number_of_player);
                    }else{
                        toastr.warning("Irregularity occurred");
                    }
                }
            });
          });
        });
    </script>
</html>
