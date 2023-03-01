<?php
require_once __DIR__ . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = require_once __DIR__ . '/process.php';
}

?>

<html>
<head>
    <title>Fetch Country Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h2>Fetch Country Data</h2>
<form method="POST">
    <label for="country">Enter a country name:</label>
    <input type="text" id="country" name="country">
    <button type="submit">Fetch Data</button>
</form>

<?php if (!empty($data)): ?>
    <table>
        <tr>
            <th>Country Name</th>
            <th>Capital</th>
            <th>Population</th>
            <th>Region</th>
            <th>Subregion</th>
            <th>Area</th>
            <th>Languages</th>
            <th>Flag</th>
        </tr>
        <tr>
            <td><?= $data['name'] ?></td>
            <td><?= $data['capital'] ?></td>
            <td><?= $data['population'] ?></td>
            <td><?= $data['region'] ?></td>
            <td><?= $data['subregion'] ?></td>
            <td><?= $data['area'] ?></td>
            <td><?= implode(", ", $data['languages']) ?></td>
            <td><img src="<?= $data['flag']?>" alt="Flag of <?= $data['name'] ?>" width="50"></td>
        </tr>
    </table>
<?php endif; ?>
</body>
</html>

