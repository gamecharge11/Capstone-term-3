<?php 
    include '../config/conf.ini.php';
    error_reporting(0);
    $queryRow = mysqli_query($con,'SELECT * FROM questions');
    $rowNum = mysqli_num_rows($queryRow);
    $final = "";
    for ($i = 1;$i < $rowNum+1; $i++) {

        // get current loop row
        $loopRowQuery = mysqli_query($con,"SELECT * FROM questions WHERE id = '$i'");

        //get username of sender
        $loopRow = $loopRowQuery -> fetch_assoc();
        $email = $loopRow['email'];
        $rowUserQuery = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
        $rowUser = $rowUserQuery -> fetch_assoc();
        $username = $rowUser['username'];

        //Title of post
        $title = $loopRow['title'];

        //Description of post
        $description = $loopRow['de'];

        //Code of post
        $code = $loopRow['code'];

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
        if ($loopRow['code'] == '') {
            $codeIncluded = '<p style="color:red;">&lt;/&gt; Code Not Included</p>';
        } else {
            $codeIncluded = '<p style="color:lime;">&lt;/&gt; Code Included</p>';
        }

        //Getting current question id

        $id = $loopRow['id'];

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
            '$id' => $id,
            '$user' => str_replace(' ', '', strtolower($username))
        );

        $final .= strtr($tempStr, $vars);
            
    }
    echo $final;

?>