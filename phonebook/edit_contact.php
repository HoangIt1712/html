<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM contacts WHERE id=$id");
    $contact = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
</head>
<body>
    <h2>Edit Contact</h2>
    <form action="edit_contact.php" method="post">
        <input type="hidden" name="id" value="<?php echo $contact['id']; ?>">
        Name: <input type="text" name="name" value="<?php echo $contact['name']; ?>" required><br>
        Phone: <input type="text" name="phone" value="<?php echo $contact['phone']; ?>" required><br>
        <input type="submit" value="Save">
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("UPDATE contacts SET name=?, phone=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $phone, $id);

    if ($stmt->execute()) {
        echo "Contact updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
