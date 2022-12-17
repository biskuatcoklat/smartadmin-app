<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1 style="text-align: center">Data Pegawai</h1>

<table id="customers">
  <tr>
    <th style="text-align: center">No</th>
    <th style="text-align: center">Nama</th>
    <th style="text-align: center">Jenis Kelamin</th>
    <th style="text-align: center">No Hp</th>
  </tr>
    @php
        $no=1;
    @endphp
    @foreach ($pegawai as $pegawais)
    <tr>
        <td style="text-align: center">{{ $no++}}</td>
        <td>{{ $pegawais->nama }}</td>
        <td>{{ $pegawais->jenis_kelamin }}</td>
        <td>{{ $pegawais->no_hp }}</td>
    </tr>
    @endforeach

</table>

</body>
</html>


