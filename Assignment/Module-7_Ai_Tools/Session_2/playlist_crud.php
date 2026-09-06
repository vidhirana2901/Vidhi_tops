
<?php

// Database connection
$conn = mysqli_connect("localhost", "root", "", "spotify_db");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}


// ================= CREATE =================
if (isset($_POST['create'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];

    $sql = "INSERT INTO playlist (name, description)
            VALUES ('$name', '$description')";

    if (mysqli_query($conn, $sql)) {
        echo "<p>Playlist created successfully!</p>";
    }
}


// ================= UPDATE =================
if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $sql = "UPDATE playlist
            SET name='$name', description='$description'
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "<p>Playlist updated successfully!</p>";
    }
}


// ================= DELETE =================
if (isset($_POST['delete'])) {

    $id = $_POST['id'];

    $sql = "DELETE FROM playlist WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "<p>Playlist deleted successfully!</p>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Playlist CRUD</title>
</head>

<body>

<h2>Add Playlist</h2>

<form method="POST">

    <input type="text"
           name="name"
           placeholder="Playlist Name"
           required>

    <br><br>

    <textarea name="description"
              placeholder="Playlist Description"></textarea>

    <br><br>

    <button type="submit" name="create">
        Create
    </button>

</form>


<hr>

<h2>All Playlists</h2>

<?php

// ================= READ =================

$result = mysqli_query($conn, "SELECT * FROM playlist");

?>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Description</th>
    <th>Action</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>

<tr>

    <td><?php echo $row['id']; ?></td>

    <td><?php echo $row['name']; ?></td>

    <td><?php echo $row['description']; ?></td>

    <td>

        <!-- UPDATE -->
        <form method="POST" style="display:inline;">

            <input type="hidden"
                   name="id"
                   value="<?php echo $row['id']; ?>">

            <input type="text"
                   name="name"
                   value="<?php echo $row['name']; ?>">

            <input type="text"
                   name="description"
                   value="<?php echo $row['description']; ?>">

            <button type="submit" name="update">
                Update
            </button>

        </form>


        <!-- DELETE -->
        <form method="POST" style="display:inline;">

            <input type="hidden"
                   name="id"
                   value="<?php echo $row['id']; ?>">

            <button type="submit" name="delete">
                Delete
            </button>

        </form>

    </td>

</tr>

<?php } ?>

</table>

</body>
</html>

<?php

mysqli_close($conn);

?>