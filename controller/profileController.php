<?php
require_once('model/user.php');


function profile()
{
    $mail = isset($_POST['mail']) ? $_POST['mail'] : null;
    $password = isset($_POST['password']) ? $_POST['password']  : null;
    $old_password  = isset($_POST['old_password']) ? $_POST['old_password'] : null;
    $old_password = crypt($old_password, 'SHA-256');
    $message = null;

    // ACCOUNT DELETED
    if (isset($_POST['del'])) {
        $message = User::deleteUser($password, $old_password);
        if ($message == 'OK') {
?>
            <script type="text/javascript">
                window.location = "index.php?action=login"
            </script>
<?php
        }

        // MODIFY USER ACCOUNT BY USER
    } else {
        if (isset($mail) || isset($password)) {
            $message = User::UpdateAcountInfo($mail, $password, $old_password);
        }
    }
    $user     = new stdClass();
    $user->id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
    $profileData = User::getUserById($user->id);

    require('view/profileView.php');
}
