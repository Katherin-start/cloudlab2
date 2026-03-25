<?php
include("conexion.php");
$con = conexion();

if (!$con) {
    die('Error de conexión a la base de datos. Revisa los logs del servidor.');
}

$sql = "SELECT * FROM persona ORDER BY id DESC";
$result = pg_query($con, $sql);

if (!$result) {
    error_log('ERROR pg_query: ' . pg_last_error($con));
    die('No se pudo obtener la información.');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Personas - Reto Tokio</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        a { text-decoration: none; color: blue; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>Listado de Personas</h1>
    <p><a href="index.php">Agregar nueva persona</a></p>

    <?php if (pg_num_rows($result) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Dirección</th>
                    <th>Celular</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = pg_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['doc']); ?></td>
                        <td><?php echo htmlspecialchars($row['nom']); ?></td>
                        <td><?php echo htmlspecialchars($row['ape']); ?></td>
                        <td><?php echo htmlspecialchars($row['dir']); ?></td>
                        <td><?php echo htmlspecialchars($row['cel']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay registros en la base de datos.</p>
    <?php endif; ?>

    <?php pg_free_result($result); pg_close($con); ?>
</body>
</html>