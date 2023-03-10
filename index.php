<?php 
session_start();
if(!isset($_SESSION['email'])) {
  header('Location: login.php');
}
include "config.php";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Nstel | NFT Marketplace</title>
    <link rel="icon" type="image/x-icon" href="./assets/img/nstel-icon-logo.svg" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css" />
    <!-- <link rel="stylesheet" href="./assets/css/swiper.css" /> -->

    <!-- Box Icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="./assets/css/boxicons.min.css" /> -->

    <!-- Main CSS -->
    <link rel="stylesheet" href="./assets/css/styles.css" />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
      <div class="container">
        <a class="navbar-brand me-4" href="#">
          <img src="./assets/img/nstel-logo.svg" alt="" />
        </a>
        <form class="d-flex position-relative" role="search">
          <button class="btn-search" type="submit"><i class="bx bx-search-alt"></i></button>
          <input class="form-control navbar-search" type="search" placeholder="Collection, item or user..." aria-label="Search" />
        </form>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto me-5">
            <li class="nav-item">
              <a class="nav-link active" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#live-section">Live Bid</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#top-seller">Top Seller</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#popular-collection">Collection</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#discover-item">Discover</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#help">Help</a>
            </li>
          </ul>
          <div class="d-flex gap-2">
            <a href="#" class="nav-content">
              <i class="bx bxs-sun"></i>
            </a>
            <a href="#" class="nav-content">
              <i class="bx bxs-wallet"></i>
            </a>
            <div class="dropdown position-relative">
              <img src="./assets/img/profile.jpg" class="dropdown-toggle rounded-circle" style="cursor: pointer" data-bs-toggle="dropdown" aria-expanded="false" />
              <img class="verified position-absolute top-0" src="./assets/img/verified-icon.svg" alt="" />
              <!-- <button class="btn btn-secondary " type="button" >Dropdown button</button> -->
              <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="logout.php">Log out!</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <!-- Modal Create Items -->
    <div class="modal modal-lg fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Create Items</h1>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Title</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="item title" />
            </div>
            <label for="price" class="form-label">Price</label>
            <div class="input-group mb-3">
              <span class="input-group-text">
                <svg width="12" height="19" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4.5 0.5L0 8.18293L4.5 10.9268L9 8.18293L4.5 0.5ZM0 9.09756L4.5 15.5L9 9.09756L4.5 11.8415L0 9.09756Z" fill="grey" />
                </svg>
              </span>
              <input type="text" id="price" class="form-control" placeholder="4.99" aria-label="Amount (to the nearest dollar)" />
              <span class="input-group-text text-secondary">.ETH</span>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Description</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" placeholder='e.g  "this is very limited items"' rows="3"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="modal-btn text-dark" data-bs-dismiss="modal">Close</button>
            <button type="button" class="modal-btn bg-gradient">Upload!</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Place Bid -->
    <div class="modal fade" id="placeBidModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header d-flex flex-column">
            <h1 class="modal-title fs-5" id="exampleModalLabel">
              Place a Bid <br />
              ??? Venus Statue Of Flowers #01 ???
            </h1>
            <h6 class="mt-3">Your Balance <span class="fw-semibold">1024.321 ETH</span></h6>
          </div>

          <div class="modal-body">
            <label for="price" class="form-label">Price</label>
            <div class="input-group mb-3">
              <span class="input-group-text">
                <svg width="12" height="19" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4.5 0.5L0 8.18293L4.5 10.9268L9 8.18293L4.5 0.5ZM0 9.09756L4.5 15.5L9 9.09756L4.5 11.8415L0 9.09756Z" fill="grey" />
                </svg>
              </span>
              <input type="text" id="price" class="form-control" placeholder="0.0" aria-label="Amount (to the nearest dollar)" />
              <span class="input-group-text text-secondary">.ETH</span>
            </div>
            <div class="d-flex flex-column pt-3 gap-3">
              <div class="d-flex justify-content-between text-secondary">
                <p>You must bid at least:</p>
                <p>0.99 ETH</p>
              </div>
              <div class="d-flex justify-content-between text-secondary">
                <p>Service fee:</p>
                <p>0.05 ETH</p>
              </div>
              <div class="d-flex justify-content-between text-secondary">
                <p>Total bid amount:</p>
                <p>1.04 ETH</p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="modal-btn text-dark" data-bs-dismiss="modal">Close</button>
            <button type="button" class="modal-btn bg-gradient"><i class="bx bxs-shopping-bag me-1"></i>Place Bid!</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Hero - Section -->
    <section id="hero-section">
      <div class="container">
        <div class="row">
          <div class="col-6">
            <h1 class="hero-heading">
              Discover, Collect, and <br />
              Sell <span class="hero-highlighted">Extraordinary</span> <br />
              Rare Digital Art
            </h1>
            <p class="hero-paragraph">
              The world's best and unique digital marketplace for unequal <br />
              collection of cryptocurrencies and tokens (NFT).
            </p>
            <div class="d-flex gap-4">
              <a href="#discover-item" class="hero-btn"><i class="bx bx-rocket me-2"></i> Explore</a>
              <a type="button" class="hero-btn border-gradient" data-bs-toggle="modal" data-bs-target="#createModal"> <i class="bx bx-edit me-2"></i> Create </a>
              <!-- <a href="#" class="hero-btn border-gradient"><i class="bx bx-edit me-2"></i> Create</a> -->
            </div>
            <div class="d-flex gap-3">
              <div class="hero-sum">
                <h4>72K +</h4>
                <p>Artwork</p>
              </div>
              <hr class="hero-border mx-3" />
              <div class="hero-sum">
                <h4>1.2M +</h4>
                <p>Artist</p>
              </div>
              <hr class="hero-border mx-3" />
              <div class="hero-sum">
                <h4>49K +</h4>
                <p>Auctions</p>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="swiper swiper-hero">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="swiper-img1">
                    <div class="d-flex justify-content-between p-2">
                      <div class="d-flex gap-1">
                        <div class="badge category">Art</div>
                        <div class="badge special">Special</div>
                      </div>
                      <div class="badge like"><i class="bx bxs-heart text-danger me-1"></i> 2.8 k</div>
                    </div>
                    <a type="button" class="swiper-btn" data-bs-toggle="modal" data-bs-target="#placeBidModal"><i class="bx bxs-shopping-bag me-1"></i> Place Bid</a>
                    <div class="swiper-glass">
                      <h5>Venus Statue of Flowers #01</h5>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <h6>Current Bid</h6>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>3/11</p>
                          </div>
                        </div>
                        <div class="bidder">
                          <img src="./assets/img/profile-2.png" alt="" />
                          <img src="./assets/img/profile-3.png" alt="" />
                          <img src="./assets/img/profile-4.png" alt="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="swiper-img2">
                    <div class="d-flex justify-content-between p-2">
                      <div class="d-flex gap-1">
                        <div class="badge category">Art</div>
                        <div class="badge special">Special</div>
                      </div>
                      <div class="badge like"><i class="bx bxs-heart text-danger me-1"></i> 2.8 k</div>
                    </div>
                    <a type="button" class="swiper-btn" data-bs-toggle="modal" data-bs-target="#placeBidModal"><i class="bx bxs-shopping-bag me-1"></i> Place Bid</a>
                    <div class="swiper-glass">
                      <h5>Venus Statue of Flowers #02</h5>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <h6>Current Bid</h6>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>3/11</p>
                          </div>
                        </div>
                        <div class="bidder">
                          <img src="./assets/img/profile-2.png" alt="" />
                          <img src="./assets/img/profile-3.png" alt="" />
                          <img src="./assets/img/profile-4.png" alt="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="swiper-img3">
                    <div class="d-flex justify-content-between p-2">
                      <div class="d-flex gap-1">
                        <div class="badge category">Art</div>
                        <div class="badge special">Special</div>
                      </div>
                      <div class="badge like"><i class="bx bxs-heart text-danger me-1"></i> 2.8 k</div>
                    </div>
                    <a type="button" class="swiper-btn" data-bs-toggle="modal" data-bs-target="#placeBidModal"><i class="bx bxs-shopping-bag me-1"></i> Place Bid</a>
                    <div class="swiper-glass">
                      <h5>Venus Statue of Flowers #03</h5>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <h6>Current Bid</h6>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>3/11</p>
                          </div>
                        </div>
                        <div class="bidder">
                          <img src="./assets/img/profile-2.png" alt="" />
                          <img src="./assets/img/profile-3.png" alt="" />
                          <img src="./assets/img/profile-4.png" alt="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="swiper-img4">
                    <div class="d-flex justify-content-between p-2">
                      <div class="d-flex gap-1">
                        <div class="badge category">Art</div>
                        <div class="badge special">Special</div>
                      </div>
                      <div class="badge like"><i class="bx bxs-heart text-danger me-1"></i> 2.8 k</div>
                    </div>
                    <a type="button" class="swiper-btn" data-bs-toggle="modal" data-bs-target="#placeBidModal"><i class="bx bxs-shopping-bag me-1"></i> Place Bid</a>
                    <div class="swiper-glass">
                      <h5>Venus Statue of Flowers #04</h5>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <h6>Current Bid</h6>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>3/11</p>
                          </div>
                        </div>
                        <div class="bidder">
                          <img src="./assets/img/profile-2.png" alt="" />
                          <img src="./assets/img/profile-3.png" alt="" />
                          <img src="./assets/img/profile-4.png" alt="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="swiper-img5">
                    <div class="d-flex justify-content-between p-2">
                      <div class="d-flex gap-1">
                        <div class="badge category">Art</div>
                        <div class="badge special">Special</div>
                      </div>
                      <div class="badge like"><i class="bx bxs-heart text-danger text-danger me-1"></i> 2.8 k</div>
                    </div>
                    <a type="button" class="swiper-btn" data-bs-toggle="modal" data-bs-target="#placeBidModal"><i class="bx bxs-shopping-bag me-1"></i> Place Bid</a>
                    <div class="swiper-glass">
                      <h5>Venus Statue of Flowers #05</h5>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <h6>Current Bid</h6>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>3/11</p>
                          </div>
                        </div>
                        <div class="bidder">
                          <img src="./assets/img/profile-2.png" alt="" />
                          <img src="./assets/img/profile-3.png" alt="" />
                          <img src="./assets/img/profile-4.png" alt="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="swiper-img6">
                    <div class="d-flex justify-content-between p-2">
                      <div class="d-flex gap-1">
                        <div class="badge category">Art</div>
                        <div class="badge special">Special</div>
                      </div>
                      <div class="badge like"><i class="bx bxs-heart text-danger me-1"></i> 2.8 k</div>
                    </div>
                    <a type="button" class="swiper-btn" data-bs-toggle="modal" data-bs-target="#placeBidModal"><i class="bx bxs-shopping-bag me-1"></i> Place Bid</a>
                    <div class="swiper-glass">
                      <h5>Venus Statue of Flowers #06</h5>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <h6>Current Bid</h6>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>3/11</p>
                          </div>
                        </div>
                        <div class="bidder">
                          <img src="./assets/img/profile-2.png" alt="" />
                          <img src="./assets/img/profile-3.png" alt="" />
                          <img src="./assets/img/profile-4.png" alt="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="hero-navigation">
                <i class="bx bx-chevron-left hero-navigation-prev"></i>
                <i class="bx bx-chevron-right hero-navigation-next"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Live Auctions - Section -->
    <section id="live-section">
      <div class="container">
        <div class="row">
          <div class="col-12 heading d-flex justify-content-between">
            <h1><i class="bx bxs-hot"></i> Live Auctions</h1>
            <a href="#" class="view-all">
              <h6>View All Auctions</h6>
              <i class="bx bx-right-arrow-alt mt-1"></i>
            </a>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="swiper swiper-live">
              <div class="swiper-wrapper">
                <div class="swiper-slide bg-primary">
                  <div class="d-flex justify-content-center">
                    <div class="position-relative mt-2" style="height: 298px">
                      <img class="art" src="./assets/img/art/art-1.jpg" alt="" />
                      <div class="d-flex position-absolute top-0 p-2 gap-1">
                        <div class="badge category">Art</div>
                        <div class="badge special">Special</div>
                      </div>
                      <div class="position-absolute top-0 end-0 p-2">
                        <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                      </div>
                      <div class="swiper-glass">
                        <div class="d-flex text-center flex-column">
                          <small>Remaining Time</small>
                          <span class="d-flex align-items-center justify-content-center">
                            <i class="bx bx-time-five me-1"></i>
                            <p id="countdown">12 h : 23 m : 09 s</p>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-content">
                    <h5>Venus Statue Of Flowers #01</h5>
                    <div class="d-flex justify-content-between">
                      <div class="d-flex align-items-center">
                        <img class="creator" src="./assets/img/creator/creator-1.jpg" alt="" />
                        <div class="d-flex flex-column ms-2">
                          <h6>Gilbert Murphy</h6>
                          <span>Creator</span>
                        </div>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="badge dark me-1">bsc</div>
                        <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                      </div>
                    </div>
                    <div class="text-dark">
                      <hr />
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="d-flex flex-column">
                        <span>Highest Bid</span>
                        <div class="d-flex align-items-center">
                          <img src="./assets/img/ethereum-icon.svg" alt="" />
                          <p>0.99 ETH</p>
                          <p>1/1</p>
                        </div>
                      </div>
                      <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                        <i class="bx bxs-shopping-bag me-1"></i>
                        <p>Place bid</p>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide bg-primary">
                  <div class="d-flex justify-content-center">
                    <div class="position-relative mt-2" style="height: 298px">
                      <img class="art" src="./assets/img/art/art-2.jpg" alt="" />
                      <div class="d-flex position-absolute top-0 p-2 gap-1">
                        <div class="badge category">Art</div>
                        <div class="badge special">Special</div>
                      </div>
                      <div class="position-absolute top-0 end-0 p-2">
                        <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                      </div>
                      <div class="swiper-glass">
                        <div class="d-flex text-center flex-column">
                          <small>Remaining Time</small>
                          <span class="d-flex align-items-center justify-content-center">
                            <i class="bx bx-time-five me-1"></i>
                            <p id="countdown">12 h : 23 m : 09 s</p>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-content">
                    <h5>Venus Statue Of Flowers #02</h5>
                    <div class="d-flex justify-content-between">
                      <div class="d-flex align-items-center">
                        <img class="creator" src="./assets/img/creator/creator-2.jpg" alt="" />
                        <div class="d-flex flex-column ms-2">
                          <h6>Aleshaa Bella</h6>
                          <span>Creator</span>
                        </div>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="badge dark me-1">bsc</div>
                        <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 3.6 k</div>
                      </div>
                    </div>
                    <div class="text-dark">
                      <hr />
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="d-flex flex-column">
                        <span>Highest Bid</span>
                        <div class="d-flex align-items-center">
                          <img src="./assets/img/ethereum-icon.svg" alt="" />
                          <p>0.99 ETH</p>
                          <p>1/1</p>
                        </div>
                      </div>
                      <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                        <i class="bx bxs-shopping-bag me-1"></i>
                        <p>Place bid</p>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide bg-primary">
                  <div class="d-flex justify-content-center">
                    <div class="position-relative mt-2" style="height: 298px">
                      <img class="art" src="./assets/img/art/art-3.jpg" alt="" />
                      <div class="d-flex position-absolute top-0 p-2 gap-1">
                        <div class="badge category">Art</div>
                        <div class="badge special">Special</div>
                      </div>
                      <div class="position-absolute top-0 end-0 p-2">
                        <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                      </div>
                      <div class="swiper-glass">
                        <div class="d-flex text-center flex-column">
                          <small>Remaining Time</small>
                          <span class="d-flex align-items-center justify-content-center">
                            <i class="bx bx-time-five me-1"></i>
                            <p id="countdown">12 h : 23 m : 09 s</p>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-content">
                    <h5>Venus Statue Of Flowers #03</h5>
                    <div class="d-flex justify-content-between">
                      <div class="d-flex align-items-center">
                        <img class="creator" src="./assets/img/creator/creator-3.jpg" alt="" />
                        <div class="d-flex flex-column ms-2">
                          <h6>Jessica Jane</h6>
                          <span>Creator</span>
                        </div>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="badge dark me-1">bsc</div>
                        <div class="badge dark text-lowercase"><i class="bx bx-heart me-1"></i> 2.9 k</div>
                      </div>
                    </div>
                    <div class="text-dark">
                      <hr />
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="d-flex flex-column">
                        <span>Highest Bid</span>
                        <div class="d-flex align-items-center">
                          <img src="./assets/img/ethereum-icon.svg" alt="" />
                          <p>0.99 ETH</p>
                          <p>1/1</p>
                        </div>
                      </div>
                      <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                        <i class="bx bxs-shopping-bag me-1"></i>
                        <p>Place bid</p>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide bg-primary">
                  <div class="d-flex justify-content-center">
                    <div class="position-relative mt-2" style="height: 298px">
                      <img class="art" src="./assets/img/art/art-4.jpg" alt="" />
                      <div class="d-flex position-absolute top-0 p-2 gap-1">
                        <div class="badge category">Art</div>
                        <div class="badge special">Special</div>
                      </div>
                      <div class="position-absolute top-0 end-0 p-2">
                        <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                      </div>
                      <div class="swiper-glass">
                        <div class="d-flex text-center flex-column">
                          <small>Remaining Time</small>
                          <span class="d-flex align-items-center justify-content-center">
                            <i class="bx bx-time-five me-1"></i>
                            <p id="countdown">12 h : 23 m : 09 s</p>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-content">
                    <h5>Venus Statue Of Flowers #04</h5>
                    <div class="d-flex justify-content-between">
                      <div class="d-flex align-items-center">
                        <img class="creator" src="./assets/img/creator/creator-5.jpg" alt="" />
                        <div class="d-flex flex-column ms-2">
                          <h6>Ralph Edwards</h6>
                          <span>Creator</span>
                        </div>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="badge dark me-1">bsc</div>
                        <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                      </div>
                    </div>
                    <div class="text-dark">
                      <hr />
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="d-flex flex-column">
                        <span>Highest Bid</span>
                        <div class="d-flex align-items-center">
                          <img src="./assets/img/ethereum-icon.svg" alt="" />
                          <p>0.99 ETH</p>
                          <p>1/1</p>
                        </div>
                      </div>
                      <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                        <i class="bx bxs-shopping-bag me-1"></i>
                        <p>Place bid</p>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide bg-primary">
                  <div class="d-flex justify-content-center">
                    <div class="position-relative mt-2" style="height: 298px">
                      <img class="art" src="./assets/img/art/art-5.jpg" alt="" />
                      <div class="d-flex position-absolute top-0 p-2 gap-1">
                        <div class="badge category">Art</div>
                        <div class="badge special">Special</div>
                      </div>
                      <div class="position-absolute top-0 end-0 p-2">
                        <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                      </div>
                      <div class="swiper-glass">
                        <div class="d-flex text-center flex-column">
                          <small>Remaining Time</small>
                          <span class="d-flex align-items-center justify-content-center">
                            <i class="bx bx-time-five me-1"></i>
                            <p id="countdown">12 h : 23 m : 09 s</p>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-content">
                    <h5>Venus Statue Of Flowers #05</h5>
                    <div class="d-flex justify-content-between">
                      <div class="d-flex align-items-center">
                        <img class="creator" src="./assets/img/creator/creator-8.jpg" alt="" />
                        <div class="d-flex flex-column ms-2">
                          <h6>Cody Fisher</h6>
                          <span>Creator</span>
                        </div>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="badge dark me-1">bsc</div>
                        <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                      </div>
                    </div>
                    <div class="text-dark">
                      <hr />
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="d-flex flex-column">
                        <span>Highest Bid</span>
                        <div class="d-flex align-items-center">
                          <img src="./assets/img/ethereum-icon.svg" alt="" />
                          <p>0.99 ETH</p>
                          <p>1/1</p>
                        </div>
                      </div>
                      <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                        <i class="bx bxs-shopping-bag me-1"></i>
                        <p>Place bid</p>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide bg-primary">
                  <div class="d-flex justify-content-center">
                    <div class="position-relative mt-2" style="height: 298px">
                      <img class="art" src="./assets/img/art/art-6.jpg" alt="" />
                      <div class="d-flex position-absolute top-0 p-2 gap-1">
                        <div class="badge category">Art</div>
                        <div class="badge special">Special</div>
                      </div>
                      <div class="position-absolute top-0 end-0 p-2">
                        <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                      </div>
                      <div class="swiper-glass">
                        <div class="d-flex text-center flex-column">
                          <small>Remaining Time</small>
                          <span class="d-flex align-items-center justify-content-center">
                            <i class="bx bx-time-five me-1"></i>
                            <p id="countdownbid">12 h : 23 m : 09 s</p>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-content">
                    <h5>Venus Statue Of Flowers #06</h5>
                    <div class="d-flex justify-content-between">
                      <div class="d-flex align-items-center">
                        <img class="creator" src="./assets/img/creator/creator-6.jpg" alt="" />
                        <div class="d-flex flex-column ms-2">
                          <h6>Gennifer Rusell</h6>
                          <span>Creator</span>
                        </div>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="badge dark me-1">bsc</div>
                        <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                      </div>
                    </div>
                    <div class="text-dark">
                      <hr />
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="d-flex flex-column">
                        <span>Highest Bid</span>
                        <div class="d-flex align-items-center">
                          <img src="./assets/img/ethereum-icon.svg" alt="" />
                          <p>0.99 ETH</p>
                          <p>1/1</p>
                        </div>
                      </div>
                      <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                        <i class="bx bxs-shopping-bag me-1"></i>
                        <p>Place bid</p>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
            <div class="live-navigation">
              <i class="bx bx-chevron-left live-navigation-prev"></i>
              <i class="bx bx-chevron-right live-navigation-next"></i>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Top Sellers - Section -->
    <section id="top-seller">
      <div class="container">
        <div class="row">
          <div class="col-12 heading d-flex justify-content-between">
            <h1>Top Sellers</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <div class="d-flex align-items-center text-white">
              <h6>01.</h6>
              <div class="position-relative">
                <img src="./assets/img/creator/creator-1.jpg" alt="" />
                <img class="verified" src="./assets/img/verified-icon.svg" alt="" />
              </div>
              <div class="d-flex flex-column gap-2">
                <h2>Gilbert Murphy</h2>
                <div class="d-flex align-items-center">
                  <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 0.5L0 8.18293L4.5 10.9268L9 8.18293L4.5 0.5ZM0 9.09756L4.5 15.5L9 9.09756L4.5 11.8415L0 9.09756Z" fill="#e7a4b1" />
                  </svg>
                  <span>1024.312 ETH</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="d-flex align-items-center text-white">
              <h6>04.</h6>
              <div class="position-relative">
                <img src="./assets/img/creator/creator-6.jpg" alt="" />
                <img class="verified" src="./assets/img/verified-icon.svg" alt="" />
              </div>
              <div class="d-flex flex-column gap-2">
                <h2>Gennifer Rusell</h2>
                <div class="d-flex align-items-center">
                  <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 0.5L0 8.18293L4.5 10.9268L9 8.18293L4.5 0.5ZM0 9.09756L4.5 15.5L9 9.09756L4.5 11.8415L0 9.09756Z" fill="#e7a4b1" />
                  </svg>
                  <span>1024.312 ETH</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="d-flex align-items-center text-white">
              <h6>07.</h6>
              <div class="position-relative">
                <img src="./assets/img/creator/creator-11.jpg" alt="" />
                <img class="verified" src="./assets/img/verified-icon.svg" alt="" />
              </div>
              <div class="d-flex flex-column gap-2">
                <h2>Darlene Robert</h2>
                <div class="d-flex align-items-center">
                  <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 0.5L0 8.18293L4.5 10.9268L9 8.18293L4.5 0.5ZM0 9.09756L4.5 15.5L9 9.09756L4.5 11.8415L0 9.09756Z" fill="#e7a4b1" />
                  </svg>
                  <span>1024.312 ETH</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="d-flex align-items-center text-white">
              <h6>10.</h6>
              <div class="position-relative">
                <img src="./assets/img/creator/creator-12.jpg" alt="" />
                <img class="verified" src="./assets/img/verified-icon.svg" alt="" />
              </div>
              <div class="d-flex flex-column gap-2">
                <h2>Gilbert Murphy</h2>
                <div class="d-flex align-items-center">
                  <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 0.5L0 8.18293L4.5 10.9268L9 8.18293L4.5 0.5ZM0 9.09756L4.5 15.5L9 9.09756L4.5 11.8415L0 9.09756Z" fill="#e7a4b1" />
                  </svg>
                  <span>1024.312 ETH</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row my-4">
          <div class="col-3">
            <div class="d-flex align-items-center text-white">
              <h6>02.</h6>
              <div class="position-relative">
                <img src="./assets/img/creator/creator-2.jpg" alt="" />
                <img class="verified" src="./assets/img/verified-icon.svg" alt="" />
              </div>
              <div class="d-flex flex-column gap-2">
                <h2>Aleshaa Bella</h2>
                <div class="d-flex align-items-center">
                  <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 0.5L0 8.18293L4.5 10.9268L9 8.18293L4.5 0.5ZM0 9.09756L4.5 15.5L9 9.09756L4.5 11.8415L0 9.09756Z" fill="#e7a4b1" />
                  </svg>
                  <span>1024.312 ETH</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="d-flex align-items-center text-white">
              <h6>05.</h6>
              <div class="position-relative">
                <img src="./assets/img/creator/creator-5.jpg" alt="" />
                <img class="verified" src="./assets/img/verified-icon.svg" alt="" />
              </div>
              <div class="d-flex flex-column gap-2">
                <h2>Ralph Edwards</h2>
                <div class="d-flex align-items-center">
                  <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 0.5L0 8.18293L4.5 10.9268L9 8.18293L4.5 0.5ZM0 9.09756L4.5 15.5L9 9.09756L4.5 11.8415L0 9.09756Z" fill="#e7a4b1" />
                  </svg>
                  <span>1024.312 ETH</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="d-flex align-items-center text-white">
              <h6>08.</h6>
              <div class="position-relative">
                <img src="./assets/img/creator/creator-9.jpg" alt="" />
                <img class="verified" src="./assets/img/verified-icon.svg" alt="" />
              </div>
              <div class="d-flex flex-column gap-2">
                <h2>Marvin Lane</h2>
                <div class="d-flex align-items-center">
                  <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 0.5L0 8.18293L4.5 10.9268L9 8.18293L4.5 0.5ZM0 9.09756L4.5 15.5L9 9.09756L4.5 11.8415L0 9.09756Z" fill="#e7a4b1" />
                  </svg>
                  <span>1024.312 ETH</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="d-flex align-items-center text-white">
              <h6>11.</h6>
              <div class="position-relative">
                <img src="./assets/img/creator/creator-10.jpg" alt="" />
                <img class="verified" src="./assets/img/verified-icon.svg" alt="" />
              </div>
              <div class="d-flex flex-column gap-2">
                <h2>Esther Howard</h2>
                <div class="d-flex align-items-center">
                  <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 0.5L0 8.18293L4.5 10.9268L9 8.18293L4.5 0.5ZM0 9.09756L4.5 15.5L9 9.09756L4.5 11.8415L0 9.09756Z" fill="#e7a4b1" />
                  </svg>
                  <span>1024.312 ETH</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <div class="d-flex align-items-center text-white">
              <h6>03.</h6>
              <div class="position-relative">
                <img src="./assets/img/creator/creator-3.jpg" alt="" />
                <img class="verified" src="./assets/img/verified-icon.svg" alt="" />
              </div>
              <div class="d-flex flex-column gap-2">
                <h2>Jessica Jane</h2>
                <div class="d-flex align-items-center">
                  <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 0.5L0 8.18293L4.5 10.9268L9 8.18293L4.5 0.5ZM0 9.09756L4.5 15.5L9 9.09756L4.5 11.8415L0 9.09756Z" fill="#e7a4b1" />
                  </svg>
                  <span>1024.312 ETH</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="d-flex align-items-center text-white">
              <h6>06.</h6>
              <div class="position-relative">
                <img src="./assets/img/creator/creator-4.jpg" alt="" />
                <img class="verified" src="./assets/img/verified-icon.svg" alt="" />
              </div>
              <div class="d-flex flex-column gap-2">
                <h2>Wade Warren</h2>
                <div class="d-flex align-items-center">
                  <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 0.5L0 8.18293L4.5 10.9268L9 8.18293L4.5 0.5ZM0 9.09756L4.5 15.5L9 9.09756L4.5 11.8415L0 9.09756Z" fill="#e7a4b1" />
                  </svg>
                  <span>1024.312 ETH</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="d-flex align-items-center text-white">
              <h6>09.</h6>
              <div class="position-relative">
                <img src="./assets/img/creator/creator-7.jpg" alt="" />
                <img class="verified" src="./assets/img/verified-icon.svg" alt="" />
              </div>
              <div class="d-flex flex-column gap-2">
                <h2>Jenny Wilson</h2>
                <div class="d-flex align-items-center">
                  <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 0.5L0 8.18293L4.5 10.9268L9 8.18293L4.5 0.5ZM0 9.09756L4.5 15.5L9 9.09756L4.5 11.8415L0 9.09756Z" fill="#e7a4b1" />
                  </svg>
                  <span>1024.312 ETH</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="d-flex align-items-center text-white">
              <h6>12.</h6>
              <div class="position-relative">
                <img src="./assets/img/creator/creator-8.jpg" alt="" />
                <img class="verified" src="./assets/img/verified-icon.svg" alt="" />
              </div>
              <div class="d-flex flex-column gap-2">
                <h2>Cody Fisher</h2>
                <div class="d-flex align-items-center">
                  <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 0.5L0 8.18293L4.5 10.9268L9 8.18293L4.5 0.5ZM0 9.09756L4.5 15.5L9 9.09756L4.5 11.8415L0 9.09756Z" fill="#e7a4b1" />
                  </svg>
                  <span>1024.312 ETH</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Popular Collection - Section -->
    <section id="popular-collection">
      <div class="container">
        <div class="row">
          <div class="col-12 heading d-flex justify-content-between">
            <h1>Popular Collection</h1>
            <div class="d-flex gap-3">
              <i class="bx bx-chevron-left collection-navigation-prev"></i>
              <i class="bx bx-chevron-right collection-navigation-next"></i>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="swiper swiper-collection">
              <div class="swiper-wrapper">
                <div class="swiper-slide collection-wrapper">
                  <div class="d-flex align-items-start">
                    <img class="collection-img1" src="./assets/img/art/art-1.jpg" alt="" />
                    <div class="d-flex flex-column">
                      <img class="collection-img2" src="./assets/img/art/art-6.jpg" alt="" />
                      <div class="position-relative">
                        <img class="collection-img3" src="./assets/img/art/art-3.jpg" alt="" />
                        <h4>15+</h4>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex ps-3 pt-4 mt-2 justify-content-between">
                    <div class="d-flex flex-column">
                      <h2>Digital Art Of Abstract???s</h2>
                      <h3>Curated by <span>Gennifer Rusell</span></h3>
                    </div>
                    <a type="button" class="collection-btn">
                      <i class="bx bxs-heart text-danger me-1"></i>
                      <p>4.9 k</p>
                    </a>
                  </div>
                </div>
                <div class="swiper-slide collection-wrapper">
                  <div class="d-flex align-items-start">
                    <img class="collection-img1" src="./assets/img/art/art-2.jpg" alt="" />
                    <div class="d-flex flex-column">
                      <img class="collection-img2" src="./assets/img/art/art-5.jpg" alt="" />
                      <div class="position-relative">
                        <img class="collection-img3" src="./assets/img/art/art-4.jpg" alt="" />
                        <h4>15+</h4>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex ps-3 pt-4 mt-2 justify-content-between">
                    <div class="d-flex flex-column">
                      <h2>Digital Art Of Abstract???s</h2>
                      <h3>Curated by <span>Gennifer Rusell</span></h3>
                    </div>
                    <a type="button" class="collection-btn">
                      <i class="bx bxs-heart text-danger me-1"></i>
                      <p>4.9 k</p>
                    </a>
                  </div>
                </div>
                <div class="swiper-slide collection-wrapper">
                  <div class="d-flex align-items-start">
                    <img class="collection-img1" src="./assets/img/art/art-6.jpg" alt="" />
                    <div class="d-flex flex-column">
                      <img class="collection-img2" src="./assets/img/art/art-4.jpg" alt="" />
                      <div class="position-relative">
                        <img class="collection-img3" src="./assets/img/art/art-3.jpg" alt="" />
                        <h4>15+</h4>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex ps-3 pt-4 mt-2 justify-content-between">
                    <div class="d-flex flex-column">
                      <h2>Digital Art Of Abstract???s</h2>
                      <h3>Curated by <span>Gennifer Rusell</span></h3>
                    </div>
                    <a type="button" class="collection-btn">
                      <i class="bx bxs-heart text-danger me-1"></i>
                      <p>4.9 k</p>
                    </a>
                  </div>
                </div>
                <div class="swiper-slide collection-wrapper">
                  <div class="d-flex align-items-start">
                    <img class="collection-img1" src="./assets/img/art/art-3.jpg" alt="" />
                    <div class="d-flex flex-column">
                      <img class="collection-img2" src="./assets/img/art/art-6.jpg" alt="" />
                      <div class="position-relative">
                        <img class="collection-img3" src="./assets/img/art/art-1.jpg" alt="" />
                        <h4>15+</h4>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex ps-3 pt-4 mt-2 justify-content-between">
                    <div class="d-flex flex-column">
                      <h2>Digital Art Of Abstract???s</h2>
                      <h3>Curated by <span>Gennifer Rusell</span></h3>
                    </div>
                    <a type="button" class="collection-btn">
                      <i class="bx bxs-heart text-danger me-1"></i>
                      <p>4.9 k</p>
                    </a>
                  </div>
                </div>
                <div class="swiper-slide collection-wrapper">
                  <div class="d-flex align-items-start">
                    <img class="collection-img1" src="./assets/img/art/art-5.jpg" alt="" />
                    <div class="d-flex flex-column">
                      <img class="collection-img2" src="./assets/img/art/art-2.jpg" alt="" />
                      <div class="position-relative">
                        <img class="collection-img3" src="./assets/img/art/art-3.jpg" alt="" />
                        <h4>15+</h4>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex ps-3 pt-4 mt-2 justify-content-between">
                    <div class="d-flex flex-column">
                      <h2>Digital Art Of Abstract???s</h2>
                      <h3>Curated by <span>Gennifer Rusell</span></h3>
                    </div>
                    <a type="button" class="collection-btn">
                      <i class="bx bxs-heart text-danger me-1"></i>
                      <p>4.9 k</p>
                    </a>
                  </div>
                </div>
                <div class="swiper-slide collection-wrapper">
                  <div class="d-flex align-items-start">
                    <img class="collection-img1" src="./assets/img/art/art-6.jpg" alt="" />
                    <div class="d-flex flex-column">
                      <img class="collection-img2" src="./assets/img/art/art-5.jpg" alt="" />
                      <div class="position-relative">
                        <img class="collection-img3" src="./assets/img/art/art-2.jpg" alt="" />
                        <h4>15+</h4>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex ps-3 pt-4 mt-2 justify-content-between">
                    <div class="d-flex flex-column">
                      <h2>Digital Art Of Abstract???s</h2>
                      <h3>Curated by <span>Gennifer Rusell</span></h3>
                    </div>
                    <a type="button" class="collection-btn">
                      <i class="bx bxs-heart text-danger me-1"></i>
                      <p>4.9 k</p>
                    </a>
                  </div>
                </div>
              </div>
              <div class="swiper-pagination-collection"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Discover Items - Section -->
    <section id="discover-item">
      <div class="container">
        <div class="row">
          <div class="col-12 heading d-flex justify-content-between">
            <h1>Discover Items</h1>
            <div class="d-flex gap-3">
              <i class="bx bx-chevron-left collection-navigation-prev"></i>
              <i class="bx bx-chevron-right collection-navigation-next"></i>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <ul class="nav nav-pills mb-3 gap-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">All Category</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-art-tab" data-bs-toggle="pill" data-bs-target="#pills-art" type="button" role="tab" aria-controls="pills-art" aria-selected="true">Art</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-music-tab" data-bs-toggle="pill" data-bs-target="#pills-music" type="button" role="tab" aria-controls="pills-music" aria-selected="true">Music</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-metaverse-tab" data-bs-toggle="pill" data-bs-target="#pills-metaverse" type="button" role="tab" aria-controls="pills-metaverse" aria-selected="true">Metaverse</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-game-tab" data-bs-toggle="pill" data-bs-target="#pills-game" type="button" role="tab" aria-controls="pills-game" aria-selected="true">Game</button>
              </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">
                <div class="row">
                  <div class="swiper-slide bg-primary col-3 new-card">
                    <div class="d-flex justify-content-center">
                      <div class="position-relative mt-2" style="height: 298px">
                        <img class="art" src="./assets/img/art/art-1.jpg" alt="" />
                        <div class="d-flex position-absolute top-0 p-2 gap-1">
                          <div class="badge category">Art</div>
                          <div class="badge special">Special</div>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                          <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-content">
                      <h5>Venus Statue Of Flowers #01</h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="creator" src="./assets/img/creator/creator-5.jpg" alt="" />
                          <div class="d-flex flex-column ms-2">
                            <h6>Ralph Edwards</h6>
                            <span>Creator</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="badge dark me-1">bsc</div>
                          <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                        </div>
                      </div>
                      <div class="text-dark">
                        <hr />
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <span>Highest Bid</span>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>1/1</p>
                          </div>
                        </div>
                        <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                          <i class="bx bxs-shopping-bag me-1"></i>
                          <p>Place bid</p>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide bg-primary col-3 new-card">
                    <div class="d-flex justify-content-center">
                      <div class="position-relative mt-2" style="height: 298px">
                        <img class="art" src="./assets/img/art/art-2.jpg" alt="" />
                        <div class="d-flex position-absolute top-0 p-2 gap-1">
                          <div class="badge category">Art</div>
                          <div class="badge hot">Hot</div>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                          <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-content">
                      <h5>Venus Statue Of Flowers #02</h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="creator" src="./assets/img/creator/creator-4.jpg" alt="" />
                          <div class="d-flex flex-column ms-2">
                            <h6>Wade Warren</h6>
                            <span>Creator</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="badge dark me-1">bsc</div>
                          <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                        </div>
                      </div>
                      <div class="text-dark">
                        <hr />
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <span>Highest Bid</span>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>1/1</p>
                          </div>
                        </div>
                        <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                          <i class="bx bxs-shopping-bag me-1"></i>
                          <p>Place bid</p>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide bg-primary col-3 new-card">
                    <div class="d-flex justify-content-center">
                      <div class="position-relative mt-2" style="height: 298px">
                        <img class="art" src="./assets/img/art/art-3.jpg" alt="" />
                        <div class="d-flex position-absolute top-0 p-2 gap-1">
                          <div class="badge category">Art</div>
                          <div class="badge new">New</div>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                          <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-content">
                      <h5>Venus Statue Of Flowers #03</h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="creator" src="./assets/img/creator/creator-9.jpg" alt="" />
                          <div class="d-flex flex-column ms-2">
                            <h6>Marvin Lane</h6>
                            <span>Creator</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="badge dark me-1">bsc</div>
                          <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                        </div>
                      </div>
                      <div class="text-dark">
                        <hr />
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <span>Highest Bid</span>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>1/1</p>
                          </div>
                        </div>
                        <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                          <i class="bx bxs-shopping-bag me-1"></i>
                          <p>Place bid</p>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide bg-primary col-3 new-card">
                    <div class="d-flex justify-content-center">
                      <div class="position-relative mt-2" style="height: 298px">
                        <img class="art" src="./assets/img/art/art-6.jpg" alt="" />
                        <div class="d-flex position-absolute top-0 p-2 gap-1">
                          <div class="badge category">Art</div>
                          <div class="badge special">Special</div>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                          <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-content">
                      <h5>Venus Statue Of Flowers #04</h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="creator" src="./assets/img/creator/creator-2.jpg" alt="" />
                          <div class="d-flex flex-column ms-2">
                            <h6>Alesha Bella</h6>
                            <span>Creator</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="badge dark me-1">bsc</div>
                          <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                        </div>
                      </div>
                      <div class="text-dark">
                        <hr />
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <span>Highest Bid</span>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>1/1</p>
                          </div>
                        </div>
                        <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                          <i class="bx bxs-shopping-bag me-1"></i>
                          <p>Place bid</p>
                        </a>
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide bg-primary col-3 new-card">
                    <div class="d-flex justify-content-center">
                      <div class="position-relative mt-2" style="height: 298px">
                        <img class="art" src="./assets/img/art/art-5.jpg" alt="" />
                        <div class="d-flex position-absolute top-0 p-2 gap-1">
                          <div class="badge category">Art</div>
                          <div class="badge new">New</div>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                          <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-content">
                      <h5>Venus Statue Of Flowers #05</h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="creator" src="./assets/img/creator/creator-8.jpg" alt="" />
                          <div class="d-flex flex-column ms-2">
                            <h6>Cody Fisher</h6>
                            <span>Creator</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="badge dark me-1">bsc</div>
                          <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                        </div>
                      </div>
                      <div class="text-dark">
                        <hr />
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <span>Highest Bid</span>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>1/1</p>
                          </div>
                        </div>
                        <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                          <i class="bx bxs-shopping-bag me-1"></i>
                          <p>Place bid</p>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide bg-primary col-3 new-card">
                    <div class="d-flex justify-content-center">
                      <div class="position-relative mt-2" style="height: 298px">
                        <img class="art" src="./assets/img/art/art-2.jpg" alt="" />
                        <div class="d-flex position-absolute top-0 p-2 gap-1">
                          <div class="badge category">Art</div>
                          <div class="badge new">New</div>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                          <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-content">
                      <h5>Venus Statue Of Flowers #06</h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="creator" src="./assets/img/creator/creator-7.jpg" alt="" />
                          <div class="d-flex flex-column ms-2">
                            <h6>Jenny Wilson</h6>
                            <span>Creator</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="badge dark me-1">bsc</div>
                          <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                        </div>
                      </div>
                      <div class="text-dark">
                        <hr />
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <span>Highest Bid</span>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>1/1</p>
                          </div>
                        </div>
                        <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                          <i class="bx bxs-shopping-bag me-1"></i>
                          <p>Place bid</p>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide bg-primary col-3 new-card">
                    <div class="d-flex justify-content-center">
                      <div class="position-relative mt-2" style="height: 298px">
                        <img class="art" src="./assets/img/art/art-4.jpg" alt="" />
                        <div class="d-flex position-absolute top-0 p-2 gap-1">
                          <div class="badge category">Art</div>
                          <div class="badge new">New</div>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                          <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-content">
                      <h5>Venus Statue Of Flowers #07</h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="creator" src="./assets/img/creator/creator-10.jpg" alt="" />
                          <div class="d-flex flex-column ms-2">
                            <h6>Esther Howard</h6>
                            <span>Creator</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="badge dark me-1">bsc</div>
                          <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                        </div>
                      </div>
                      <div class="text-dark">
                        <hr />
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <span>Highest Bid</span>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>1/1</p>
                          </div>
                        </div>
                        <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                          <i class="bx bxs-shopping-bag me-1"></i>
                          <p>Place bid</p>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide bg-primary col-3 new-card">
                    <div class="d-flex justify-content-center">
                      <div class="position-relative mt-2" style="height: 298px">
                        <img class="art" src="./assets/img/art/art-1.jpg" alt="" />
                        <div class="d-flex position-absolute top-0 p-2 gap-1">
                          <div class="badge category">Art</div>
                          <div class="badge new">New</div>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                          <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-content">
                      <h5>Venus Statue Of Flowers #08</h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="creator" src="./assets/img/creator/creator-12.jpg" alt="" />
                          <div class="d-flex flex-column ms-2">
                            <h6>Wade Warren</h6>
                            <span>Creator</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="badge dark me-1">bsc</div>
                          <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                        </div>
                      </div>
                      <div class="text-dark">
                        <hr />
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <span>Highest Bid</span>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>1/1</p>
                          </div>
                        </div>
                        <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                          <i class="bx bxs-shopping-bag me-1"></i>
                          <p>Place bid</p>
                        </a>
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide bg-primary col-3 new-card">
                    <div class="d-flex justify-content-center">
                      <div class="position-relative mt-2" style="height: 298px">
                        <img class="art" src="./assets/img/art/art-1.jpg" alt="" />
                        <div class="d-flex position-absolute top-0 p-2 gap-1">
                          <div class="badge category">Art</div>
                          <div class="badge special">Special</div>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                          <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-content">
                      <h5>Venus Statue Of Flowers #09</h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="creator" src="./assets/img/creator/creator-5.jpg" alt="" />
                          <div class="d-flex flex-column ms-2">
                            <h6>Ralph Edwards</h6>
                            <span>Creator</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="badge dark me-1">bsc</div>
                          <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                        </div>
                      </div>
                      <div class="text-dark">
                        <hr />
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <span>Highest Bid</span>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>1/1</p>
                          </div>
                        </div>
                        <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                          <i class="bx bxs-shopping-bag me-1"></i>
                          <p>Place bid</p>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide bg-primary col-3 new-card">
                    <div class="d-flex justify-content-center">
                      <div class="position-relative mt-2" style="height: 298px">
                        <img class="art" src="./assets/img/art/art-2.jpg" alt="" />
                        <div class="d-flex position-absolute top-0 p-2 gap-1">
                          <div class="badge category">Art</div>
                          <div class="badge hot">Hot</div>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                          <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-content">
                      <h5>Venus Statue Of Flowers #10</h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="creator" src="./assets/img/creator/creator-4.jpg" alt="" />
                          <div class="d-flex flex-column ms-2">
                            <h6>Wade Warren</h6>
                            <span>Creator</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="badge dark me-1">bsc</div>
                          <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                        </div>
                      </div>
                      <div class="text-dark">
                        <hr />
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <span>Highest Bid</span>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>1/1</p>
                          </div>
                        </div>
                        <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                          <i class="bx bxs-shopping-bag me-1"></i>
                          <p>Place bid</p>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide bg-primary col-3 new-card">
                    <div class="d-flex justify-content-center">
                      <div class="position-relative mt-2" style="height: 298px">
                        <img class="art" src="./assets/img/art/art-3.jpg" alt="" />
                        <div class="d-flex position-absolute top-0 p-2 gap-1">
                          <div class="badge category">Art</div>
                          <div class="badge new">New</div>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                          <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-content">
                      <h5>Venus Statue Of Flowers #11</h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="creator" src="./assets/img/creator/creator-9.jpg" alt="" />
                          <div class="d-flex flex-column ms-2">
                            <h6>Marvin Lane</h6>
                            <span>Creator</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="badge dark me-1">bsc</div>
                          <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                        </div>
                      </div>
                      <div class="text-dark">
                        <hr />
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <span>Highest Bid</span>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>1/1</p>
                          </div>
                        </div>
                        <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                          <i class="bx bxs-shopping-bag me-1"></i>
                          <p>Place bid</p>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide bg-primary col-3 new-card">
                    <div class="d-flex justify-content-center">
                      <div class="position-relative mt-2" style="height: 298px">
                        <img class="art" src="./assets/img/art/art-6.jpg" alt="" />
                        <div class="d-flex position-absolute top-0 p-2 gap-1">
                          <div class="badge category">Art</div>
                          <div class="badge special">Special</div>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                          <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-content">
                      <h5>Venus Statue Of Flowers #12</h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="creator" src="./assets/img/creator/creator-2.jpg" alt="" />
                          <div class="d-flex flex-column ms-2">
                            <h6>Alesha Bella</h6>
                            <span>Creator</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="badge dark me-1">bsc</div>
                          <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                        </div>
                      </div>
                      <div class="text-dark">
                        <hr />
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <span>Highest Bid</span>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>1/1</p>
                          </div>
                        </div>
                        <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                          <i class="bx bxs-shopping-bag me-1"></i>
                          <p>Place bid</p>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 text-center mb-4">
                    <b class="new-card text-white">------------------------+ No one more NFT's +------------------------</b>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade show" id="pills-art" role="tabpanel" aria-labelledby="pills-art-tab" tabindex="0">
                <div class="row">
                  <div class="swiper-slide bg-primary col-3">
                    <div class="d-flex justify-content-center">
                      <div class="position-relative mt-2" style="height: 298px">
                        <img class="art" src="./assets/img/art/art-6.jpg" alt="" />
                        <div class="d-flex position-absolute top-0 p-2 gap-1">
                          <div class="badge category">Art</div>
                          <div class="badge hot">Hot</div>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                          <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-content">
                      <h5>Venus Statue Of Flowers #01</h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="creator" src="./assets/img/creator/creator-5.jpg" alt="" />
                          <div class="d-flex flex-column ms-2">
                            <h6>Ralph Edwards</h6>
                            <span>Creator</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="badge dark me-1">bsc</div>
                          <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                        </div>
                      </div>
                      <div class="text-dark">
                        <hr />
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <span>Highest Bid</span>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>1/1</p>
                          </div>
                        </div>
                        <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                          <i class="bx bxs-shopping-bag me-1"></i>
                          <p>Place bid</p>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide bg-primary col-3">
                    <div class="d-flex justify-content-center">
                      <div class="position-relative mt-2" style="height: 298px">
                        <img class="art" src="./assets/img/art/art-5.jpg" alt="" />
                        <div class="d-flex position-absolute top-0 p-2 gap-1">
                          <div class="badge category">Art</div>
                          <div class="badge hot">Hot</div>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                          <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-content">
                      <h5>Venus Statue Of Flowers #02</h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="creator" src="./assets/img/creator/creator-4.jpg" alt="" />
                          <div class="d-flex flex-column ms-2">
                            <h6>Wade Warren</h6>
                            <span>Creator</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="badge dark me-1">bsc</div>
                          <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                        </div>
                      </div>
                      <div class="text-dark">
                        <hr />
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <span>Highest Bid</span>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>1/1</p>
                          </div>
                        </div>
                        <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                          <i class="bx bxs-shopping-bag me-1"></i>
                          <p>Place bid</p>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide bg-primary col-3">
                    <div class="d-flex justify-content-center">
                      <div class="position-relative mt-2" style="height: 298px">
                        <img class="art" src="./assets/img/art/art-3.jpg" alt="" />
                        <div class="d-flex position-absolute top-0 p-2 gap-1">
                          <div class="badge category">Art</div>
                          <div class="badge hot">Hot</div>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                          <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-content">
                      <h5>Venus Statue Of Flowers #03</h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="creator" src="./assets/img/creator/creator-9.jpg" alt="" />
                          <div class="d-flex flex-column ms-2">
                            <h6>Marvin Lane</h6>
                            <span>Creator</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="badge dark me-1">bsc</div>
                          <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                        </div>
                      </div>
                      <div class="text-dark">
                        <hr />
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <span>Highest Bid</span>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>1/1</p>
                          </div>
                        </div>
                        <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                          <i class="bx bxs-shopping-bag me-1"></i>
                          <p>Place bid</p>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide bg-primary col-3">
                    <div class="d-flex justify-content-center">
                      <div class="position-relative mt-2" style="height: 298px">
                        <img class="art" src="./assets/img/art/art-4.jpg" alt="" />
                        <div class="d-flex position-absolute top-0 p-2 gap-1">
                          <div class="badge category">Art</div>
                          <div class="badge hot">Hot</div>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                          <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-content">
                      <h5>Venus Statue Of Flowers #04</h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="creator" src="./assets/img/creator/creator-2.jpg" alt="" />
                          <div class="d-flex flex-column ms-2">
                            <h6>Alesha Bella</h6>
                            <span>Creator</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="badge dark me-1">bsc</div>
                          <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                        </div>
                      </div>
                      <div class="text-dark">
                        <hr />
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <span>Highest Bid</span>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>1/1</p>
                          </div>
                        </div>
                        <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                          <i class="bx bxs-shopping-bag me-1"></i>
                          <p>Place bid</p>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 text-center mb-4">
                    <b class="text-white">------------------------+ No one more NFT's +------------------------</b>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade show" id="pills-music" role="tabpanel" aria-labelledby="pills-music-tab" tabindex="0">
                <div class="row">
                  <div class="swiper-slide bg-primary col-3">
                    <div class="d-flex justify-content-center">
                      <div class="position-relative mt-2" style="height: 298px">
                        <img class="art" src="./assets/img/art/art-6.jpg" alt="" />
                        <div class="d-flex position-absolute top-0 p-2 gap-1">
                          <div class="badge category">Music</div>
                          <div class="badge new">New</div>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                          <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-content">
                      <h5>Venus Statue Of Flowers #01</h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="creator" src="./assets/img/creator/creator-5.jpg" alt="" />
                          <div class="d-flex flex-column ms-2">
                            <h6>Ralph Edwards</h6>
                            <span>Creator</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="badge dark me-1">bsc</div>
                          <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                        </div>
                      </div>
                      <div class="text-dark">
                        <hr />
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <span>Highest Bid</span>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>1/1</p>
                          </div>
                        </div>
                        <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                          <i class="bx bxs-shopping-bag me-1"></i>
                          <p>Place bid</p>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide bg-primary col-3">
                    <div class="d-flex justify-content-center">
                      <div class="position-relative mt-2" style="height: 298px">
                        <img class="art" src="./assets/img/art/art-5.jpg" alt="" />
                        <div class="d-flex position-absolute top-0 p-2 gap-1">
                          <div class="badge category">Music</div>
                          <div class="badge new">New</div>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                          <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-content">
                      <h5>Venus Statue Of Flowers #02</h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="creator" src="./assets/img/creator/creator-4.jpg" alt="" />
                          <div class="d-flex flex-column ms-2">
                            <h6>Wade Warren</h6>
                            <span>Creator</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="badge dark me-1">bsc</div>
                          <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                        </div>
                      </div>
                      <div class="text-dark">
                        <hr />
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <span>Highest Bid</span>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>1/1</p>
                          </div>
                        </div>
                        <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                          <i class="bx bxs-shopping-bag me-1"></i>
                          <p>Place bid</p>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 text-center mb-4">
                    <b class="text-white">------------------------+ No one more NFT's +------------------------</b>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade show" id="pills-metaverse" role="tabpanel" aria-labelledby="pills-metaverse-tab" tabindex="0">
                <div class="row">
                  <div class="swiper-slide bg-primary col-3">
                    <div class="d-flex justify-content-center">
                      <div class="position-relative mt-2" style="height: 298px">
                        <img class="art" src="./assets/img/art/art-1.jpg" alt="" />
                        <div class="d-flex position-absolute top-0 p-2 gap-1">
                          <div class="badge category">Metaverse</div>
                          <div class="badge special">Special</div>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                          <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-content">
                      <h5>Venus Statue Of Flowers #01</h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="creator" src="./assets/img/creator/creator-5.jpg" alt="" />
                          <div class="d-flex flex-column ms-2">
                            <h6>Ralph Edwards</h6>
                            <span>Creator</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="badge dark me-1">bsc</div>
                          <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                        </div>
                      </div>
                      <div class="text-dark">
                        <hr />
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <span>Highest Bid</span>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>1/1</p>
                          </div>
                        </div>
                        <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                          <i class="bx bxs-shopping-bag me-1"></i>
                          <p>Place bid</p>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide bg-primary col-3">
                    <div class="d-flex justify-content-center">
                      <div class="position-relative mt-2" style="height: 298px">
                        <img class="art" src="./assets/img/art/art-1.jpg" alt="" />
                        <div class="d-flex position-absolute top-0 p-2 gap-1">
                          <div class="badge category">Metaverse</div>
                          <div class="badge special">Special</div>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                          <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-content">
                      <h5>Venus Statue Of Flowers #02</h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="creator" src="./assets/img/creator/creator-4.jpg" alt="" />
                          <div class="d-flex flex-column ms-2">
                            <h6>Wade Warren</h6>
                            <span>Creator</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="badge dark me-1">bsc</div>
                          <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                        </div>
                      </div>
                      <div class="text-dark">
                        <hr />
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <span>Highest Bid</span>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>1/1</p>
                          </div>
                        </div>
                        <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                          <i class="bx bxs-shopping-bag me-1"></i>
                          <p>Place bid</p>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 text-center mb-4">
                    <b class="text-white">------------------------+ No one more NFT's +------------------------</b>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade show" id="pills-game" role="tabpanel" aria-labelledby="pills-game-tab" tabindex="0">
                <div class="row">
                  <div class="swiper-slide bg-primary col-3">
                    <div class="d-flex justify-content-center">
                      <div class="position-relative mt-2" style="height: 298px">
                        <img class="art" src="./assets/img/art/art-1.jpg" alt="" />
                        <div class="d-flex position-absolute top-0 p-2 gap-1">
                          <div class="badge category">Game</div>
                          <div class="badge hot">hot</div>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                          <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-content">
                      <h5>Venus Statue Of Flowers #01</h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="creator" src="./assets/img/creator/creator-5.jpg" alt="" />
                          <div class="d-flex flex-column ms-2">
                            <h6>Ralph Edwards</h6>
                            <span>Creator</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="badge dark me-1">bsc</div>
                          <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                        </div>
                      </div>
                      <div class="text-dark">
                        <hr />
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <span>Highest Bid</span>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>1/1</p>
                          </div>
                        </div>
                        <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                          <i class="bx bxs-shopping-bag me-1"></i>
                          <p>Place bid</p>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide bg-primary col-3">
                    <div class="d-flex justify-content-center">
                      <div class="position-relative mt-2" style="height: 298px">
                        <img class="art" src="./assets/img/art/art-2.jpg" alt="" />
                        <div class="d-flex position-absolute top-0 p-2 gap-1">
                          <div class="badge category">Game</div>
                          <div class="badge special">Special</div>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                          <a href="" class="fs-4 text-white"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-content">
                      <h5>Venus Statue Of Flowers #02</h5>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="creator" src="./assets/img/creator/creator-4.jpg" alt="" />
                          <div class="d-flex flex-column ms-2">
                            <h6>Wade Warren</h6>
                            <span>Creator</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="badge dark me-1">bsc</div>
                          <div class="badge dark text-lowercase"><i class="bx bxs-heart text-danger me-1"></i> 4.9 k</div>
                        </div>
                      </div>
                      <div class="text-dark">
                        <hr />
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                          <span>Highest Bid</span>
                          <div class="d-flex align-items-center">
                            <img src="./assets/img/ethereum-icon.svg" alt="" />
                            <p>0.99 ETH</p>
                            <p>1/1</p>
                          </div>
                        </div>
                        <a type="button" class="btn-basic border-gradient" data-bs-toggle="modal" data-bs-target="#placeBidModal">
                          <i class="bx bxs-shopping-bag me-1"></i>
                          <p>Place bid</p>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 text-center mb-4">
                    <b class="text-white">------------------------+ No one more NFT's +------------------------</b>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <a type="button" class="btn btn-load">Load More...</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Help - Section -->
    <section id="help">
      <div class="container">
        <div class="row">
          <div class="col-12 heading d-flex justify-content-between">
            <h1>Create And Sell Your NFTs</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <div class="img-help">
              <img src="./assets/img/help/setup.png" alt="" />
            </div>
            <h2>Setup Your Wallet</h2>
            <p>Lorem ipsum dolor sit amet, official duo deserunt mollit anim incididuntaut rules dolore your wallet aliqua.</p>
          </div>
          <div class="col-3">
            <div class="img-help">
              <img src="./assets/img/help/create.png" alt="" />
            </div>
            <h2>Create Your Collection</h2>
            <p>Lorem ipsum dolor sit amet, official duo deserunt mollit anim incididuntaut rules dolore your wallet aliqua.</p>
          </div>
          <div class="col-3">
            <div class="img-help">
              <img class="ms-2" src="./assets/img/help/add.png" alt="" />
            </div>
            <h2>Add Your NFTs</h2>
            <p>Lorem ipsum dolor sit amet, official duo deserunt mollit anim incididuntaut rules dolore your wallet aliqua.</p>
          </div>
          <div class="col-3">
            <div class="img-help">
              <img src="./assets/img/help/sell.png" alt="" />
            </div>
            <h2>Sell Your NFTs</h2>
            <p>Lorem ipsum dolor sit amet, official duo deserunt mollit anim incididuntaut rules dolore your wallet aliqua.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row gap-4 d-flex justify-content-between">
          <div class="col-3">
            <img src="./assets/img/nstel-logo.svg" alt="" />
            <p>
              The digital marketplace for unequal collection <br />
              of cryptocurrencies and tokens (NFT).
            </p>
            <div class="d-flex gap-2">
              <a href="#!" class="footer-icon">
                <i class="bx bxl-facebook"></i>
              </a>
              <a href="#!" class="footer-icon">
                <i class="bx bxl-twitter"></i>
              </a>
              <a href="#!" class="footer-icon">
                <i class="bx bxl-instagram"></i>
              </a>
              <a href="#!" class="footer-icon">
                <i class="bx bxl-twitch"></i>
              </a>
              <a href="#!" class="footer-icon">
                <i class="bx bxl-youtube"></i>
              </a>
              <a href="#!" class="footer-icon">
                <i class="bx bxl-discord-alt"></i>
              </a>
            </div>
          </div>

          <div class="col-1 mt-5">
            <h1>Marketplace</h1>
            <ul>
              <li><a href="#">Art</a></li>
              <li><a href="#">Music</a></li>
              <li><a href="#">Photography</a></li>
              <li><a href="#">Collectibles</a></li>
            </ul>
          </div>
          <div class="col-1 mt-5">
            <h1>My Account</h1>
            <ul>
              <li><a href="#">Profile</a></li>
              <li><a href="#">Favourites</a></li>
              <li><a href="#">My Collections</a></li>
              <li><a href="#">Create Item</a></li>
            </ul>
          </div>
          <div class="col-1 mt-5">
            <h1>Resources</h1>
            <ul>
              <li><a href="#">Help Centers</a></li>
              <li><a href="#">Live Auctions</a></li>
              <li><a href="#">Items Detail</a></li>
              <li><a href="#">Activity</a></li>
            </ul>
          </div>
          <div class="col-1 mt-5">
            <h1>Company</h1>
            <ul>
              <li><a href="#">Explore</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Careers</a></li>
            </ul>
          </div>

          <div class="col-3 mt-5">
            <h1>Subscribe Us</h1>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Enter your e-mail" aria-label="Enter your e-mail" aria-describedby="button-addon2" />
              <button class="btn bg-gradient" type="button" id="button-addon2">I???m in</button>
            </div>
          </div>
        </div>

        <hr class="text-white" />
        <div class="row">
          <div class="col-12 d-flex justify-content-between align-items-center pb-2" style="height: 52px">
            <span>?? Copyright 2022 ~ Nstel by Orloop Digital Agency.</span>
            <div class="d-flex gap-3">
              <a href="#!">Terms</a>
              <a href="#!">Privacy Policy</a>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap bundle JS -->
    <script src="./assets/js/bootstrap.bundle.min.js"></script>

    <!-- Jquery JS -->
    <script src="./assets/js/jquery-3.6.1.min.js"></script>

    <!-- Swiper JS -->
    <script src="./assets/js/swiper-bundle.min.js"></script>
    <!-- Main JS -->
    <script src="./assets/js/script.js"></script>
    <script>
      var heroSwiper = new Swiper(".swiper-hero", {
        effect: "cards",
        // loop: true,
        grabCursor: true,
        navigation: {
          nextEl: ".hero-navigation-next",
          prevEl: ".hero-navigation-prev",
        },
      });
      var collectionSwiper = new Swiper(".swiper-collection", {
        slidesPerView: 3,
        spaceBetween: 34,
        // grabCursor: true,
        // loop: true,
        keyboard: {
          enabled: true,
        },
        pagination: {
          el: ".swiper-pagination-collection",
          clickable: true,
        },
        navigation: {
          nextEl: ".collection-navigation-next",
          prevEl: ".collection-navigation-prev",
        },
      });

      var liveSwiper = new Swiper(".swiper-live", {
        slidesPerView: 4,
        spaceBetween: 32,
        // grabCursor: true,
        keyboard: {
          enabled: true,
        },
        loop: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".live-navigation-next",
          prevEl: ".live-navigation-prev",
        },
      });
    </script>
  </body>
</html>
