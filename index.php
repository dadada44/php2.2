<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
        <form method="post">
            <label>
                :<br />
                <input type="text" name="" />
            </label><br />
            <label>
                :<br />
                <input type="text" name="" />
            </label><br />
            <label>
                :<br />
                <input type="text" name="*" />
            </label><br />
            <input type="submit" value="Registrovat" />
        </form>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "druhe";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM neco";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Email</th><th>Platforms</th><th>Region</th><th>Description</th><th>State</th><th>Subjekt</th><th>Date</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["ID"]."</td>
                    <td>".$row["Email"]."</td>
                    <td>".$row["Platforms"]."</td>
                    <td>".$row["Region"]."</td>
                    <td class='description'>".$row["Description"]."</td>
                    <td>".$row["State"]."</td>
                    <td>".$row["Subjekt"]."</td>
                    <td>".$row["Date"]."</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='text-align: center; color: #555;'>No results found</p>";
    }
    ?>
</body>

<style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 18px;
            text-align: left;
            font-size: 20px;
        }

        th {
            background-color: #5c6bc0;
            color: white;
            font-weight: bold;
        }

        td {
            background-color: #f9f9f9;
            border-bottom: 1px solid #ddd;
        }

        tr:hover td {
            background-color: #e0e0e0;
        }
        .description {
            word-wrap: break-word;  
            white-space: normal;    
            max-width: 300px;      
            overflow-wrap: break-word;  
        }
</style>
</html>
