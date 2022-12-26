<?php 
 
include 'config.php';
 
// error_reporting(0);
 
session_start();
 
if (isset($_SESSION['email'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
 
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    $cek = mysqli_num_rows($sql);
    if ($cek > 0) {
        $_SESSION['email'] = $_POST['email'];
        header("Location: index.php");
        // exit;
    } else {
        echo "<script>alert('Your email or password is incorrect. Please try again!')</script>";
    }
}
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nstel | Sign In</title>
    <link rel="icon" type="image/x-icon" href="./assets/img/nstel-icon-logo.svg" />
    <script src="./assets/js/tailwindcss.js"></script>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  </head>
  <body class="font-[Outfit] text-white flex items-center justify-center h-screen bg-[url('assets/img/login/bg-login.jpg')] bg-cover">
    <div class="container mx-auto px-52">
      <div class="flex justify-center items-center w-full">
        <div>
          <h1 class="font-semibold text-[42px]">Sign in</h1>
          <p class="font-normal text-sm">Welcome back, Please sign in first before bidding!</p>

          <form class="flex flex-col mt-7 gap-4" action="" method="POST">
            <div class="flex flex-col">
              <label for="email" class="text-sm font-normal my-2">Email</label>
              <input type="email"  id="email" name="email" placeholder="e.g example@email.com" class="text-black py-3 px-5 text-sm w-[351px] rounded-xl border border-[#EFEFEF]" required />
            </div>
            <div class="flex flex-col">
              <label for="password" class="text-sm font-normal my-2">Password</label>
              <input type="password"  name="password" id="password" placeholder="enter your password" class="text-black py-3 px-5 text-sm w-[351px] rounded-xl border border-[#EFEFEF]" required />
            </div>
            <div class="flex justify-between">
              <div class="flex">
                <input type="checkbox" id="checkbox" class="py-3 px-5 text-sm rounded-xl border border-[#EFEFEF]" />
                <label for="checkbox" class="text-sm font-normal ml-2 select-none">Remember Me!</label>
              </div>
              <a href="" class="text-sm hover:underline">Forgot password?</a>
            </div>
            <div class="flex flex-col">
              <button type="submit" name="submit" class="bg-zinc-600 hover:bg-zinc-500 py-[13px] text-white rounded-xl">Sign In</button>
            </div>
            <p class="text-white text-center text-sm">Not registered yet? <a href="register.php" class="text-blue-400 underline">Create an account!</a></p>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>


