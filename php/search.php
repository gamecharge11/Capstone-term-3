<?php 
    include '../config/conf.ini.php';
    $val = $_POST['value'];
    $queryRow = mysqli_query($con,"SELECT * FROM questions WHERE title LIKE '%$val%'");
    $final = '';
    while($data = mysqli_fetch_assoc($queryRow)){
        $email = $data['email'];
        $rowUserQuery = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
        $rowUser = $rowUserQuery -> fetch_assoc();
        $username = $rowUser['username'];

        //Title of post
        $title = $data['title'];

        //Description of post
        $description = $data['description'];

        //Code of post
        $code = $data['code'];

        //Get avatar of sender
        $avatar = '';
        $avatarQuery = mysqli_query($con,"SELECT * FROM avatar_path WHERE email = '$email'");
        if (mysqli_num_rows($avatarQuery) > 0) {
            $fetchedAv = $avatarQuery -> fetch_assoc();
            $avatar = './uploads/'.$fetchedAv['path'];
        } else {
            $avatar = 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png';
        }
        $avatarRow = $avatarQuery -> fetch_assoc();
        $codeIncluded = '';
        //checking if code is included
        if ($data['code'] == '') {
            $codeIncluded = '<p style="color:red;">&lt;/&gt; Code Not Included</p>';
        } else {
            $codeIncluded = '<p style="color:lime;">&lt;/&gt; Code Included</p>';
        }

        //Getting current question id

        $id = $data['id'];

        //Generating code

        $tempStr = '<div class="outer">
                <div class="section section-a">
                    <h2 onclick="location.href=`view.php?q=$id`" style="cursor:pointer;">$title</h2>
                    <br>
                    <div class="description" onclick="location.href=`view.php?q=$id`" style="cursor:pointer;">$description</div>
                    <br>
                    $codeIncluded
                </div>
                <div class="section section-b">
                    <button id="answer" class="btn" onclick="location.href=`./answer.php?q=$id`">Answer</button>
                </div>
                <div class="section section-c">
                    <img src="$avatar" alt="" class="av" width="100" height="90" onclick="location.href=`users/$user.html`" style="cursor:pointer;">
                    <h2>Posted by<br>$username</h2>
                </div>
            </div>';
        $vars = array(
            '$title' => $title,
            '$description' => $description,
            '$avatar' => $avatar,
            '$username' => $username,
            '$codeIncluded' => $codeIncluded,
            '$id' => $id
        );

        $final .= strtr($tempStr, $vars);
            
    }
    echo $final;
    
?>