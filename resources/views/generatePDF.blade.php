<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Resume</title>
</head>
<body>
    <div style="margin: 0 auto;display: block;width: 500px;">
        <table width="100%" border="1">
            <thead>
                <tr>
                    <th rowspan="2">
                        Particulars
                    </th>
                    <th rowspan="2">
                        Notes
                    </th>
                    <th colspan="2">
                        Amount (In Taka)
                    </th>
                </tr>
                <tr>
                    <th>
                        2021-2022
                    </th>
                    <th>
                        2020-2021
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{$item['particulars']}}</td>
                        <td>{{$item['notes']}}</td>
                        <td>{{$item['currentYear']}}</td>
                        <td>{{$item['previousYear']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>