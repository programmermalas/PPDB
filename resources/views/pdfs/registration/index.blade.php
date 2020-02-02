
<!DOCTYPE html>
<html>
<head>
	<title>Pendaftar</title>
</head>
<body>
    <style type="text/css">
        .header {
            width: 100%;
            border-collapse: collapse;
        }
        .header tr td {
            border-bottom: 3px double black;
        }
        .body {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        .body tr td,
        .body tr th {
            border: 1px solid black;
        }
        .text-center {
            text-align: center;
        }
    </style>
    
    <table class="header">
        <tr>
            <td class="text-center">
                <img src="{{public_path('logo/logo.png')}}" alt="Logo" height="75px">
            </td>
            <td class="text-center">
                <h4>SEKOLAH DASAR ISLAM TERPADU</h4>
                <h4>CAHAYA UMMAT</h4>
            </td>
        </tr>
    </table>

	<center>
		<h4>Pendaftar</h4>
	</center>

	<table class='body'>
		<thead>
			<tr>
				<th>Nama</th>
				<th>Number</th>
                <th>Password</th>
			</tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->number}}</td>
                <td>{{$user->password_in_string}}</td>
            </tr>
        </tbody>
	</table>

</body>
</html>
