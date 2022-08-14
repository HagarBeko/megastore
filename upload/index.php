<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>images</title>
</head>

<body>
    <?php
    if (isset($_POST["upload"])) {
        $name = $_FILES['image']['name'];
        $type = $_FILES['image']['type'];
        $size = $_FILES['image']['size'];
        $error = $_FILES['image']['error'];
        $tmp = $_FILES['image']['tmp_name'];
        $result = '';
        $chr = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789";
        for ($i = 0; $i < 10; $i++) {
            $result .= $chr[rand(0, 61)];
        }
        $cut = explode(".", $name);
        $new_name = $cut[0] . "_" . $result . "." . $cut[count($cut) - 1];
        $location = dirname(__FILE__) . "/images/";
        $full = $location . $new_name;
        if ($error == 0) {
            if ($type != "image/jpeg") {
                echo "just upload images .jpg";
            } else if ($size < 1024) {
                echo " size is big";
            } else {
                move_uploaded_file($tmp, $full);
                echo $name . "<br>" . $type . "<br>" . $size . "<br>" . $error . "<br>" . $tmp;
                $success = "the image is uploaded";
            }
        }
    }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?php if (isset($success)) {



        ?>
            <div><?php echo $success; ?></div>
        <?php
        } ?>
        <input type="file" name="image">
        <br>
        <input type="submit" value="upload" name="upload">


    </form>
</body>

</html>
<!-- 
    - action [internal - external] -> https://www.google.com welcome.php
    - method [get,post]
    [get] -> URL ?username=ahmed&password=123123
    -> limited [256 char]
    -> unsecure -> password etc
    -> speed post
    [post]-> http request background
    - input type 
    - input name 
    - submit -> redirect to action url
//comment to day man to test 
-if U went upload file or image
-> add enctype


when you uploaded file Or image you mast add 
1- file name - name.png
2- file type - image/png
3- file size - 1024
4- file error - 0 or 1
5- file location - tmp