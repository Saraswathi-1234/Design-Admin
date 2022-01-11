<!doctype html>
<html>
<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <style>
        #example{
            background: #ffffff;
            border-top: 3px solid #d2d6de;
            box-shadow: 0 1px 1px rgb(0 0 0 / 10%);
        }
    </style>

</head>
<body>
<div class='card'>



    <table id="example" class="table table-hover">
        <thead>
            <tr>
                <th></th>
                <th scope="col">ID</th>
                <th scope="col">Selector</th>
                <th scope="col">Name</th>
                <th scope="col">Unit</th>
                <th scope="col">Minimum Value</th>
                <th scope="col">Maximum Value</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($DP0_inputs as $key => $input)
            <tr>
                <td></td>
                <th scope="row">{{$key+1}}</th>
                <td>DP0</td>
                <td> {{$input->concept->name}}</td>
                <td> {{$input->concept->unitsOfMeasure}}</td>
                <td> {{$input->concept->minValue}}</td>
                <td>{{$input->concept->maxValue}}</td>
            </tr>
        @endforeach
        @foreach ($DP1_inputs as $key => $input)
            <tr>
                <td></td>
                <th scope="row">{{count($DP0_inputs) + $key + 1}}</th>
                <td>DP1</td>
                <td> {{$input->concept->name}}</td>
                <td> {{$input->concept->unitsOfMeasure}}</td>
                <td> {{$input->concept->minValue}}</td>
                <td>{{$input->concept->maxValue}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
   
</div>
</body>
</html>

