@php
// Esto asegura que los caracteres con acentos o eñes se vean bien en Excel
echo "\xEF\xBB\xBF"; 
@endphp
<table>
    <thead>
        <!-- Aquí pones los títulos de tus columnas en el Excel -->
        <tr style="background-color: #4CAF50; color: white;">
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo Electrónico</th>
            <th>Fecha de Registro</th>
        </tr>
    </thead>
    <tbody>
        <!-- Aquí recorres los datos de tu base de datos -->
        @foreach($datos as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
