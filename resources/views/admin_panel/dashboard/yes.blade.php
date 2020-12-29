<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>
                   Time
                </th>
                <th>
                    Status
                </th>
                <th>
                    Amount
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $s)
            <tr>
                <td class="font-weight-medium">
                    {{$s->created_at}}
                </td>
                <td class="font-weight-medium">
                    {{$s->order_status}}
                </td>
                <td class="font-weight-medium">
                    {{$s->price}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>