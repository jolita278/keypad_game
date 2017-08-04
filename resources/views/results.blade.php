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

        <div id="Middle" class="tabcontent">
            <h4>Best results of Middle level </h4>
            <table class="table table-hover">

                @if(sizeof($list4)>0)
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


        <div id="Hard" class="tabcontent">
            <h4>Best results of Hard level</h4>
            <table class="table table-hover">

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

@endsection('results')