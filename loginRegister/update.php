<?php
session_start();
include("./database.php");

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
  $user_username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
  $current_password = filter_input(INPUT_POST, 'current_password', FILTER_SANITIZE_SPECIAL_CHARS);
  $new_password = filter_input(INPUT_POST, 'new_password', FILTER_SANITIZE_SPECIAL_CHARS);

  if ($user_username != $_SESSION['username'] && !empty($user_username)) {
    $query = "UPDATE users SET username = ? WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "si", $user_username, $_SESSION["user_id"]);
    if (mysqli_stmt_execute($stmt)) {
      $_SESSION['username'] = $user_username;

      // update password if new password is provided
      if (!empty($current_password) && !empty($new_password)) {
        // Check if the current password matches the stored password
        $pass_query = "SELECT password FROM users WHERE id = ?";
        $pass_stmt = mysqli_prepare($connection, $pass_query);
        mysqli_stmt_bind_param($pass_stmt, "s", $_SESSION['user_id']);
        mysqli_stmt_execute($pass_stmt);

        $result = mysqli_stmt_get_result($pass_stmt);
        if ($result) {
          $stored_password_row = mysqli_fetch_assoc($result);
          if ($stored_password_row) {
            $stored_password = $stored_password_row['password'];
            if (password_verify($current_password, $stored_password)) {
              $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
              $update_query = "UPDATE users SET password = ?  WHERE id = ?";
              $update_stmt = mysqli_prepare($connection, $update_query);
              mysqli_stmt_bind_param($update_stmt, "si", $new_password_hash, $_SESSION['user_id']);
              mysqli_stmt_execute($update_stmt);

              // Check if the update was successful
              if (!mysqli_stmt_affected_rows($update_stmt) > 0) {
                $error = "Something went wrong while updating password: " . mysqli_stmt_error($update_stmt);
              }
            } else {
              $error = "password is incorrect";
            }
          } else {
            $error = "something went wrong while updating password";
          }
        } else {
          $error = "cannot found user";
        }
      }

      header("Location: ./profile.php");
      exit();
    } else {
      $error = "Error updating profile: " . mysqli_error($connection);
    }
  } else {
    $error = "Please update your profile with a new username.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Update profile</h1>
  back to <a href="./profile.php">profile page</a>

  <?php if (!empty($error)) : ?>
    <p><?= $error ?></p>
  <?php endif; ?>

  <form method="post">
    username:
    <input type="text" name="username" value="<?= htmlspecialchars($_SESSION['username']); ?>"><br />
    current password:
    <input type="password" name="current_password" placeholder="current password"><br />
    new password:
    <input type="password" name="new_password" placeholder="new password"><br />
    <input type="submit" name="update" value="Update"><br />
  </form>
</body>

</html>