<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        crud ajax
    </h1>
    <table>
        <thead>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Genero</th>
        </thead>
        <tbody id="data-empleado"></tbody>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
<script>
    let table = document.getElementById('data-empleado')
    $.ajax({
        type:"POST",
        url:'empleados.php',
        data: {
            table:'employees',
            operacion:'get'
        },

    }).done(function(data){
        console.log(typeof(data));
        data = JSON.parse(data);

        data.forEach((item) => {
            item.gender = item.gender == 'M' ? 'MASCULINO' : 'FEMENINO';
            table.innerHTML +=
            `
            <tr>
                <td>${item.first_name}</td>
                <td>${item.last_name}</td>
                <td>${item.gender}</td>
            </tr>
            
            `
            
        })
    })
</script>
</html>