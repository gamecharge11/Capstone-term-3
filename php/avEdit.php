<?php
include '../config/conf.ini.php';
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0;$i < $length;$i++)
    {
        $randomString .= $characters[rand(0, $charactersLength - 1) ];
    }
    return $randomString;
}
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["av-inp"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$name = basename($_FILES["av-inp"]["name"]);
if (isset($_POST["submit"]))
{
    $check = getimagesize($_FILES["av-inp"]["tmp_name"]);
    if ($check !== false)
    {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    }
    else
    {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
if (file_exists($target_file))
{
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
if ($_FILES["av-inp"]["size"] > 500000)
{
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
{
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
if ($uploadOk == 0)
{
    echo "Sorry, your file was not uploaded.";
}
else
{
    if (move_uploaded_file($_FILES["av-inp"]["tmp_name"], $target_file))
    {
        $nm = uniqid();
        $newfl = '../uploads/' . $nm . '.' . pathinfo($name, PATHINFO_EXTENSION);
        $new = $nm . '.' . pathinfo($name, PATHINFO_EXTENSION);
        rename('../uploads/' . $name, $newfl);
        echo "The file " . htmlspecialchars(basename($_FILES["av-inp"]["name"])) . " has been uploaded.";
        $em = $_COOKIE['email'];
        $result = mysqli_query($con, "SELECT * from `avatar_path` WHERE email='$em'");
        $row = mysqli_fetch_assoc($result);
        $pt = '';
        foreach ($row as $column => $value)
        {
            if ($column == 'path')
            {
                $pt = $value;
            }
        }
        unlink('../uploads/' . $pt);
        $del = mysqli_query($con, "DELETE FROM avatar_path WHERE email = '$em'");
        $query = mysqli_query($con, "INSERT INTO avatar_path (email,path) VALUES('$em','$new')");
        setcookie('av', '../uploads/' . $nm . '.' . pathinfo($name, PATHINFO_EXTENSION) , time() + 86400, "/");
        header('Location:../settings.php');
    }
    else
    {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
