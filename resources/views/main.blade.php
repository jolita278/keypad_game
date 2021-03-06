<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Architects+Daughter|Permanent+Marker" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">


    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Fast typing game</title>
</head>
<body>
<div id="register" class="container hidden">

    <a href="{{route('app.results.index')}}">CHECK, IF ARE YOU IN THE BEST PLAYERS LIST!</a>

    <div id="main_title"><h2>Fast typing</h2></div>
    <div id="content">
        <input id="name" class="form-control" placeholder="Your name">
        <br><br>
        <button id="register_btn" class="btn btn-lg btn-danger" disabled>GO</button>
    </div>
</div>
<div id="levels" class="container hidden">
    <div class="title"></div>
    <div class="content">
        <h2>Choose level</h2>
        <form action="levels">
            <input type="radio" name="levels" id="level_3" value="6" class="radio-inline"> Easy
            <input type="radio" name="levels" id="level_2" value="4" class="radio-inline"> Medium
            <input type="radio" name="levels" id="level_1" value="2" class="radio-inline"> Hard
        </form>
        <br><br>
        <button id="start" class="btn btn-success">Start</button>
    </div>
</div>
<div id="game" class="container hidden">
    <div class="row justify-content-center">
        <div class="col-3 score text-left"></div>
        <div class="col-3 level"></div>
        <div class="col-3 title text-right"></div>
    </div>
    <div id="user-level"></div>
    <div class="content">
        <h2 id="letter"></h2>
        <div>Score: <span id="score">0</span></div>
        <div>Lives left: <span id="life">3</span></div>
    </div>
</div>
<div id="results" class="container hidden">
    <div class="title"></div>
    <div class="content">
        <h2>GAME OVER!</h2>
        <div>Your score is: <span id="lastScore"></span></div>
        <br><br>
        <button id="reset" class="btn btn-success">PLAY AGAIN</button>
        <a href="{{route('app.results.index')}}" class="button btn btn-default">RESULTS</a>
    </div>
</div>

@yield('results')

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script src="js/main.js"></script>

<script>
    var game = new FastTyping();
        game.setSaveURL ("{{route('app.results.store')}}");
</script>

</html>