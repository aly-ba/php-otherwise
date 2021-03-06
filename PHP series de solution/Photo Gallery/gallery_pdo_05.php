<?php
include './includes/title.php';
require_once './includes/connection.php';
$conn = dbConnect('read', 'pdo');
$sql = 'SELECT filename, caption FROM images';
// submit the query
$result = $conn->query($sql);
$errorInfo = $conn->errorInfo();
if (isset($errorInfo[2])) {
    $error = $errorInfo[2];
} else {
    // extract the first record as an array
    $row = $result->fetch();
    // get the name and caption for the main image
    if (isset($_GET['image'])) {
        $mainImage = $_GET['image'];
    } else {
        $mainImage = $row['filename'];
    }
    if (file_exists('images/'.$mainImage)) {
        // get the dimensions of the main image
        $imageSize = getimagesize('images/'.$mainImage)[3];
    } else {
        $error = 'Image not found.';
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Japan Journey<?php if(isset($title)) { echo "&#8212;{$title}"; } ?></title>
    <link href="styles/journey.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
    <h1>Japan Journey </h1>
</header>
<div id="wrapper">
    <?php require './includes/menu.php'; ?>
    <main>
        <h2>Images of Japan</h2>
        <?php if (isset($error)) {
            echo "<p>$error</p>";
        } else {
        ?>
        <p id="picCount">Displaying 1 to 6 of 8</p>
        <div id="gallery">
            <table id="thumbs">
                <tr>
                    <!--This row needs to be repeated-->
                    <?php
                    do {
                    // set caption if thumbnail is same as main image
                    if ($row['filename'] == $mainImage) {
                        $caption = $row['caption'];
                    }
                    ?>
                    <td><a href="<?= $_SERVER['PHP_SELF']; ?>?image=<?=$row['filename']; ?>"><img src="images/thumbs/<?= $row['filename']; ?>" alt="="<?= $row['caption']; ?>" width="80" height="54"></a></td>
                    <?php } while ($row = $result->fetch()); ?>
                </tr>
                <!-- Navigation link needs to go here -->
            </table>
            <figure id="main_image">
                <img src="images/<?= $mainImage; ?>" alt="<?= $caption; ?>" <?= $imageSize; ?>>
                <figcaption><?= $caption; ?></figcaption>
            </figure>
        </div>
        <?php } ?>
    </main>
    <?php include './includes/footer.php'; ?>
</div>
</body>
</html>