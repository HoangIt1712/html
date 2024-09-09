<?php
include 'db.php';

$sql = "SELECT id, name, phone FROM contacts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Phone Book</title>
</head>
<body>
    <h2>Contact List</h2>
    <table borders="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['phone']}</td>
                        <td>
                            <a href='edit_contact.php?id={$row['id']}'>Edit</a> |
                            <a href='delete_contact.php?id={$row['id']}'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No contacts found</td></tr>";
        }
        ?>
    </table>
    <h2>Add New Contact</h2>
    <form action="add_contact.php" method="post">
        Name: <input type="text" name="name" required><br>
        Phone: <input type="text" name="phone" required><br>
        <input type="submit" value="Add">
    </form>
</body>
</html>

<?php
$conn->close();
?>
