<?php 
    error_reporting(0);
    include '../config/conf.ini.php';
    $id = $_POST['id'];
    $query = mysqli_query($con,"SELECT * FROM answers WHERE questionId = '$id'");
    $answerCount = mysqli_num_rows($query);

    $queryId = mysqli_query($con,"SELECT * FROM answers WHERE questionId = '$id'");
    $id = [];
    while ($row = mysqli_fetch_assoc($queryId)) {
        $id[] = $row['id'];
    }


    $final = '';
    $i = 0;

    while ($assocCurrent = mysqli_fetch_assoc($query)) {
        // $current = mysqli_query($con,"SELECT * FROM answers WHERE id = '$i' AND questionId = '$id'");
        // $assocCurrent = $current -> fetch_assoc();
        $i++;
        $template = '<div class="group">
                    <span class="q-id" style="display:none;position:absolute;">$qId</span>
                    <div class="sect correct" style="cursor:pointer;">
                        <h2>$id &nbsp;&nbsp;&nbsp;<br>$correct</h2>
                    </div>
                    <div class="sect">
                        <div class="answer" id="answer">
                            $answer
                        </div>
                        <div class="sender">
                            <img src="$av" alt="" class="av">
                            <h3>&nbsp;&nbsp;&nbsp;<span style="white-space:nowrap;">Posted By</span><br>&nbsp;&nbsp;&nbsp;<span style="white-space:nowrap;" class="user-$id">$username</span></h3>
                        </div>
                    </div>
                </div>';
        $correct = $assocCurrent['correct'];
        $correct = $correct == 'true'? true: false;
        $email = $assocCurrent['email'];
        $avQuery = mysqli_query($con,"SELECT * FROM avatar_path WHERE email = '$email'");
        $avatar = '';
        if (mysqli_num_rows($avQuery) > 0) {
            $assocAv = $avQuery -> fetch_assoc();
            $avatar = './uploads/'.$assocAv['path'];
        } else {
            $avatar = 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png';
        }
        $usernameQuery = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
        $usernameAssoc = $usernameQuery -> fetch_assoc();
        $username = $usernameAssoc['username'];
        $vars = array(
            '$id' => $i,
            '$correct' => $correct ? "<span style='color:lime'>✔️</span>" : "",
            '$answer' => $assocCurrent['answer'],
            '$av' => $avatar,
            '$username' => $username,
            '$qId' => $id[$i-1]
        );
        $final .= strtr($template,$vars);
    }
    echo $final;
?>