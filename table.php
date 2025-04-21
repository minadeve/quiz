<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random 42000x2000 Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 30%;
            margin: 15px auto;
            text-align: center;
        }
        td, th {
            border: 1px solid #000;
            padding: 8px;
        }
        td {
            background-color: #f2f2f2;
        }
        th {
            background-color: #007BFF;
            color: #fff;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th colspan="10">Random 10x10 Table</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // ساخت جدول 10x10
            for ($row = 0; $row < 10; $row++) {
                echo "<tr>";
                for ($col = 0; $col < 10; $col++) {
                    // تولید یک مقدار تصادفی بین 1 تا 100
                    $randomNumber = rand(1, 100);
                    echo "<td>$randomNumber</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
