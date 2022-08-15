<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pageStyle.css">
    <title>UPLOAD PHOTO</title>
</head>

<body>
    <center>
        <div class="websiteBackground">
            <div class="background">
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <div id="image" style="text-align : center " ;>
                        <?php
                        if (isset($_POST['submitImage'])) {
                            $image_name = $_FILES['uploadImage']['name'];
                            $image_type = $_FILES['uploadImage']['type'];
                            $image_size = $_FILES['uploadImage']['size'];
                            $image_tmp_name = $_FILES['uploadImage']['tmp_name'];

                            $new_name = $_POST['newImageName'];

                            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
                            $detectedType = exif_imagetype($image_tmp_name);
                            if (!in_array($detectedType, $allowedTypes)) {
                                echo '<script>alert("Wrong file format")</script>';
                            } else {
                                move_uploaded_file($image_tmp_name, "photos/$image_name");
                                $oldname = "photos/$image_name";
                                $newname = "photos/" . $new_name . ".jpg";
                                $displaynewname = $new_name . ".jpg";

                                if (!rename($oldname, $newname)) {
                                    echo "<br>File failed to rename!";
                                } else {
                                    echo '<script>alert("Image successfully uploaded")</script>';
                                    echo "<br>File had been uploaded and renamed!";
                                    echo "<br><br><img src='$newname' style='width:40%; height:45%'>";
                                    echo "<br><br>$displaynewname";
                                }
                            }
                        }
                        ?>
                    </div>
                    <table border="1" cellspacing="0" cellpadding="5" align="center" style="width: 70%; margin: 5%">
                        <tr>
                            <td><input type="file" name="uploadImage" id="uploadImage" required style="width: 100%"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="newImageName" placeholder="Registration No. " style="width: 100%" required></td>
                        </tr>
                    </table>

                    <input type="submit" name="submitImage" id="submitImage" style="height: 25px; width: 30%"><br>
                </form>
            </div>
        </div>
    </center>
</body>

</html>