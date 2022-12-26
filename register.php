<?php 
 
include 'config.php';
 
// error_reporting(0);
 
session_start();
 
if (isset($_SESSION['email'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $confirm = md5($_POST['confirm']);

    if($password !== $confirm) {
      echo "<script>alert('Confirm your password is wrong, Please try again!')</script>";
    } else {
      $sql = mysqli_query($conn, "INSERT INTO users (id, name, email, password) VALUES ('', '$name', '$email', '$password')");
      echo "<script>alert('Data added successfully, Log in now!')</script>";
      header('Location: login.php');
    }
 
    // $cek = mysqli_num_rows($sql);
    // if ($cek > 0) {
    //     $_SESSION['email'] = $_POST['email'];
    //     header("Location: index.php");
    //     // exit;
    // } else {
    //     echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    // }
}
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nstel | Sign Up</title>
    <link rel="icon" type="image/x-icon" href="./assets/img/nstel-icon-logo.svg" />
    <script src="./assets/js/tailwindcss.js"></script>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  </head>
  <body class="font-[Outfit] text-white flex items-center justify-center h-screen bg-[url('assets/img/login/bg-login.jpg')] bg-cover">
    <div class="container mx-auto px-52">
      <div class="flex justify-center items-center w-full">
        <div>
          <h1 class="font-semibold text-[42px]">Sign up</h1>
          <p class="font-normal text-sm">Let's level up your brand together!</p>
          <!-- <div class="rounded-md bg-[#FFF0F0] p-4 mt-5">
            <p class="flex items-center text-sm font-medium text-[#BC1C21]">
              <span class="pr-3">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="10" cy="10" r="10" fill="#BC1C21"></circle>
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M10.0002 5.54922C7.54253 5.54922 5.5502 7.54155 5.5502 9.99922C5.5502 12.4569 7.54253 14.4492 10.0002 14.4492C12.4579 14.4492 14.4502 12.4569 14.4502 9.99922C14.4502 7.54155 12.4579 5.54922 10.0002 5.54922ZM4.4502 9.99922C4.4502 6.93404 6.93502 4.44922 10.0002 4.44922C13.0654 4.44922 15.5502 6.93404 15.5502 9.99922C15.5502 13.0644 13.0654 15.5492 10.0002 15.5492C6.93502 15.5492 4.4502 13.0644 4.4502 9.99922Z"
                    fill="white"
                  ></path>
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M10.0002 7.44922C10.304 7.44922 10.5502 7.69546 10.5502 7.99922V9.99922C10.5502 10.303 10.304 10.5492 10.0002 10.5492C9.69644 10.5492 9.4502 10.303 9.4502 9.99922V7.99922C9.4502 7.69546 9.69644 7.44922 10.0002 7.44922Z"
                    fill="white"
                  ></path>
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M9.4502 11.9992C9.4502 11.6955 9.69644 11.4492 10.0002 11.4492H10.0052C10.309 11.4492 10.5552 11.6955 10.5552 11.9992C10.5552 12.303 10.309 12.5492 10.0052 12.5492H10.0002C9.69644 12.5492 9.4502 12.303 9.4502 11.9992Z"
                    fill="white"
                  ></path>
                </svg>
              </span>
              Sorry, your confirmation password is wrong!
            </p>
          </div> -->

          <form class="flex flex-col mt-4 gap-4" action="" method="POST">
            <div class="flex flex-col">
              <label for="name" class="text-sm font-normal my-2">Name</label>
              <input type="name" id="name" name="name" placeholder="Enter your name" class="text-black py-3 px-5 text-sm w-[351px] rounded-xl border border-[#EFEFEF]" required />
            </div>
            <div class="flex flex-col">
              <label for="email" class="text-sm font-normal my-2">Email</label>
              <input type="email" id="email" name="email" placeholder="Enter your email" class="text-black py-3 px-5 text-sm w-[351px] rounded-xl border border-[#EFEFEF]" required />
            </div>
            <div class="flex flex-col">
              <label for="password" class="text-sm font-normal my-2">Password</label>
              <input type="password" id="password" name="password" placeholder="Enter your password" class="text-black py-3 px-5 text-sm w-[351px] rounded-xl border border-[#EFEFEF]" required />
            </div>
            <div class="flex flex-col">
              <label for="confirm" class="text-sm font-normal my-2">Password Confirm</label>
              <input type="password" id="confirm" name="confirm" placeholder="Enter confirm password" class="text-black py-3 px-5 text-sm w-[351px] rounded-xl border border-[#EFEFEF]" required />
            </div>
            <div class="flex">
              <input type="checkbox" id="checkbox" class="py-3 px-5 text-sm rounded-xl border border-[#EFEFEF]" required />
              <label for="checkbox" class="text-sm font-normal ml-2 select-none">I agree with Terms and Privacy Policy. </label>
            </div>
            <div class="flex flex-col">
              <button type="submit" name="submit" class="bg-zinc-600 hover:bg-zinc-500 py-[13px] text-white rounded-xl">Sign Up</button>
            </div>
            <p class="text-white text-center text-sm">Already have an account? <a href="login.php" class="text-blue-400 underline">Sign in!</a></p>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
