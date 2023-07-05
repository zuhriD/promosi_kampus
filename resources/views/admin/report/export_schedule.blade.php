<!DOCTYPE html>
<html>

<head>
    <title>Laravel 9 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>School</th>
            <th>PIC 1</th>
            <th>PIC 2</th>
            <th>Date</th>
        </tr>
        @foreach ($schedule as $s)
            @php
                $i = 0;
            @endphp
            <tr>


                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->school->name }}</td>
                <td>{{ $s->pic2->name }}</td>
                <td>{{ $s->pic1->name }}</td>
                <td>{{ $s->date }}</td>
            </tr>
        @endforeach
    </table>

</body>

</html>
