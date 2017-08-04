@extends('main')
@section('results')

    <div class="container">
        <a href="{{url('/')}}" class="button btn btn-default">PLAY</a>
        <h3> Highest gamers scores :</h3>

        <div class="tab">
            <button class="tablinks" onclick="openLevel(event, 'Easy')" id="defaultOpen">Easy</button>
            <button class="tablinks" onclick="openLevel(event, 'Middle')">Middle</button>
            <button class="tablinks" onclick="openLevel(event, 'Hard')">Hard</button>
        </div>

        <div id="Easy" class="tabcontent">
            <h4>Best results of Easy level</h4>
            <table class="table table-hover">
                @if(isset($list6))
                    @if(sizeof($list6)>0)
                        <thead>
                        <tr>
                            <th>NAME</th>
                            <th>SCORE</th>
                            <th>TIME</th>
                            <th>LEVEL</th>
                            <th>AVERAGE SPEED</th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach ($list6 as $key => $record)
                            <tr>
                                @foreach ($record as $key => $value)

                                    <td>{{$value}}</td>

                                @endforeach

                            </tr>

                        @endforeach

                        </tbody>
                    @else
                        <h3>No items in database!</h3>
                    @endif
            </table>
        </div>
        @endif

        <div id="Middle" class="tabcontent">
            <h4>Best results of Middle level </h4>
            <table class="table table-hover">
                @if(isset($list4))
                    @if(sizeof($list4)>0)
                        <thead>
                        <tr>
                            <th>NAME</th>
                            <th>SCORE</th>
                            <th>GAME TIME</th>
                            <th>LEVEL</th>
                            <th>AVERAGE SPEED</th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach ($list4 as $key => $record)
                            <tr>
                                @foreach ($record as $key => $value)

                                    <td>{{$value}}</td>

                                @endforeach

                            </tr>

                        @endforeach

                        </tbody>
                    @else
                        <h3>No items in database!</h3>
                    @endif
            </table>
        </div>
        @endif

        <div id="Hard" class="tabcontent">
            <h4>Best results of Hard level</h4>
            <table class="table table-hover">
                @if(isset($list2))
                    @if(sizeof($list2)>0)
                        <thead>
                        <tr>
                            <th>NAME</th>
                            <th>SCORE</th>
                            <th>TIME</th>
                            <th>LEVEL</th>
                            <th>AVERAGE SPEED</th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach ($list2 as $key => $record)
                            <tr>
                                @foreach ($record as $key => $value)

                                    <td>{{$value}}</td>

                                @endforeach

                            </tr>

                        @endforeach

                        </tbody>
                    @else
                        <h3>No items in database!</h3>
                    @endif
            </table>
        </div>

    </div>
    @endif
    <script>
        function openLevel(evt, levelName) {

            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(levelName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        document.getElementById("defaultOpen").click();
    </script>
@endsection('results')