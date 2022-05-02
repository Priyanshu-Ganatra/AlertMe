<?php
global $user;
?>
<!-- navbar -->
<div class="bg-white d-flex align-items-center fixed-top shadow" style="min-height:56px; z-index:5">
    <div class="container-fluid">
        <div class="row align-items-center">

            <!-- icon -->
            <div class="col">
                <a href="?">
                    <img src="assets/images/logo.png" alt="logo" height="28">
                </a>
            </div>
            <!-- search -->
            <div class="col d-flex align-items-center">
                <div class="input-group ms-2">
                    <!-- mobile search bar -->
                    <span class="input-group-prepend d-lg-none" id="searchMenu" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">

                        <div class="input-group-text bg-gray border-0 rounded-circle" style="min-height: 40px; ">

                            <i class="fa-solid fa-magnifying-glass text-muted"></i>

                        </div>
                    </span>
                    <!-- desktop search bar -->
                    <span class="input-group-prepend d-none d-lg-block" id="searchMenu" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">

                        <div class="input-group-text bg-gray border-0 rounded-pill" style="min-height: 40px; max-width: 230px;">


                            <i class="fa-solid fa-magnifying-glass me-2 text-muted"></i>
                            <p class="m-0 fs-8 text-muted">Looking for someone?</p>


                        </div>
                    </span>
                    <!-- search menu -->
                    <ul class="dropdown-menu overflow-auto border-0 shadow p-3" aria-labelledby="searchMenu" style="width: 20em; max-height: 600px">
                        <!-- search input -->
                        <li>
                            <input type="text" class="rounded-pill search border-0 bg-gray dropdown-item" placeholder="search in appname" autofocus />
                        </li>
                        <!-- search 1 -->
                        <li class="my-4">
                            <div class="
                   alert
                   fade
                   show
                   dropdown-item
                   p-1
                   m-0
                   d-flex
                   align-items-center
                   justify-content-between
                 " role="alert">
                                <div class="d-flex align-items-center">
                                    <img src="https://source.unsplash.com/random/1" alt="avatar" class="rounded-circle me-2" style="width: 35px; height: 35px; object-fit: cover" />
                                    <p class="m-0">Lorem ipsum</p>
                                </div>
                                <button type="button" class="btn-close p-0 m-0" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </li>
                        <!-- search 2 -->
                        <li class="my-4">
                            <div class="
                   alert
                   fade
                   show
                   dropdown-item
                   p-1
                   m-0
                   d-flex
                   align-items-center
                   justify-content-between
                 " role="alert">
                                <div class="d-flex align-items-center">
                                    <img src="https://source.unsplash.com/random/2" alt="avatar" class="rounded-circle me-2" style="width: 35px; height: 35px; object-fit: cover" />
                                    <p class="m-0">Lorem ipsum</p>
                                </div>
                                <button type="button" class="btn-close p-0 m-0" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </li>
                        <!-- search 3 -->
                        <li class="my-4">
                            <div class="
                   alert
                   fade
                   show
                   dropdown-item
                   p-1
                   m-0
                   d-flex
                   align-items-center
                   justify-content-between
                 " role="alert">
                                <div class="d-flex align-items-center">
                                    <img src="https://source.unsplash.com/random/3" alt="avatar" class="rounded-circle me-2" style="width: 35px; height: 35px; object-fit: cover" />
                                    <p class="m-0">Lorem ipsum</p>
                                </div>
                                <button type="button" class="btn-close p-0 m-0" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </li>
                    </ul>


                </div>
            </div>
            <!-- menus -->
            <div class="col d-flex align-items-center justify-content-end">
                <!-- avatar -->
                <a href="?editprofile" style="text-decoration: none;">
                    <div class="d-none d-xl-flex align-items-center justify-content-end cursor-pointer me-2 px-2 py-1 rounded-pill user ">

                        <!-- avatar img -->
                        <img src="assets/images/profiles/<?= $user['pfp'] ?>" class="rounded-circle me-2" style="height: 38px; width: 38px; object-fit: cover;" alt="avatar">

                        <p class="m-0 me-2"><?= $user['f_name'] . ' ' . $user['l_name']; ?>
                        </p>

                    </div>
                </a>
                <!-- home -->
                <a href="?">
                    <div class="d-flex align-items-center justify-content-center p-1 me-2  bg-gray-icon rounded-circle cursor-pointer active-icon" style="height: 38px; width: 38px; object-fit: cover; ">
                        <i class="fa-solid fa-house"></i>
                    </div>
                </a>
                <!-- create -->

                <div class="d-flex align-items-center justify-content-center p-1 me-2 bg-gray-icon rounded-circle cursor-pointer " data-bs-toggle="modal" data-bs-target="#addpost" style="height: 38px; width: 38px; object-fit: cover;">
                    <i class="fa-solid fa-circle-plus"></i>
                </div>


                <!-- notification -->

                <div class="d-flex align-items-center justify-content-center p-1 me-2 bg-gray-icon rounded-circle cursor-pointer" style="height: 38px; width: 38px; object-fit: cover;" type="button" id="notificationMenu" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                    <i class="fa-solid fa-bell"></i>
                </div>

                <!-- notifications dd -->
                <ul class="dropdown-menu border-0 shadow p-3" aria-labelledby="notMenu" style="width: 23em; max-height: 600px; overflow-y: auto">
                    <!-- header -->
                    <li class="p-1">
                        <div class="d-flex justify-content-between">
                            <h2>Notifications</h2>

                            <!-- more icon  -->
                            <div>
                                <i class="
                 fas
                 fa-ellipsis-h
                 pointer
                 p-2
                 rounded-circle
                 bg-gray
               " type="button" data-bs-toggle="dropdown"></i>

                                <!-- drop down menu for more icon -->

                                <ul class="dropdown-menu">
                                    <li class="dropdown-item d-flex align-items-center" type="button">
                                        <i class="fa-solid fa-bell-slash me-3"></i>
                                        <p class="m-0">Mute notifications</p>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </li>
                    <!-- news -->
                    <!-- news 1 -->
                    <li class="my-2 p-1">
                        <a href="#" class="
             d-flex
             align-items-center
             justify-content-evenly
             text-decoration-none text-dark
           ">
                            <div class="d-flex align-items-center justify-content-evenly">
                                <div class="p-2">
                                    <img src="https://source.unsplash.com/random/1" alt="avatar" class="rounded-circle" style="width: 58px; height: 58px; object-fit: cover" />
                                </div>
                                <div>
                                    <p class="fs-7 m-0">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Harum unde amet at nulla quae porro.
                                    </p>
                                    <span class="fs-7 text-primary">about an hour ago</span>
                                </div>
                            </div>
                            <i class="fas fa-circle fs-7 text-primary"></i>
                        </a>
                    </li>

                </ul>
                <!--  -->

                <!-- secondary menu ... -->

                <div class="d-flex align-items-center justify-content-center p-1 me-2 bg-gray-icon rounded-circle cursor-pointer" style="height: 38px; width: 38px; object-fit: cover;" id="secondaryMenu" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                    <i class="fa-solid fa-ellipsis"></i>
                </div>

                <!--secodary dropdown  -->
                <ul class="dropdown-menu border-0 shadow p-3" aria-labelledby="secondaryMenu" style="width: 23em; max-height: 600px; ">





                    <!-- mute notification -->
                    <li class="dropdown-item p-1 my-3 rounded" type="button">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="./index.html" class="d-flex text-decoration-none text-dark">
                                    <i class="fa-solid fa-bell-slash bg-gray p-2 rounded-circle"></i>

                                    <div class="
                      ms-3
                      d-flex
                      justify-content-between
                      align-items-center
                      w-100
                    ">
                                        <p class="m-0">Mute notifications</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- account verification -->
                    <li class="dropdown-item p-1 my-3 rounded" type="button">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <div class="d-flex" data-bs-toggle="dropdown">
                                    <i class="bi bi-person-check-fill bg-gray p-2 rounded-circle"></i>
                                    <!-- <i class="bi bi-person-check-fill"></i> -->


                                    <div class="
                        ms-3
                        d-flex
                        justify-content-between
                        align-items-center
                        w-100
                      ">
                                        <p class="m-0">Account verification</p>
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                                <!-- nested menu -->
                                <ul class="dropdown-menu">
                                    <!-- VIP verification -->
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="
                            rounded-circle
                            p-1
                            bg-gray
                            d-flex
                            align-items-center
                            justify-content-center
                            me-2
                          " style="width: 38px; height: 38px">
                                                <i class="bi bi-patch-check-fill"></i>
                                            </div>
                                            <p class="m-0">VIP account verification</p>
                                        </a>
                                    </li>
                                    <!-- simple verification -->
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="
                            rounded-circle
                            p-1
                            bg-gray
                            d-flex
                            align-items-center
                            justify-content-center
                            me-2
                          " style="width: 38px; height: 38px">
                                                <i class="bi bi-patch-check"></i>
                                            </div>
                                            <p class="m-0">Simple verification</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-- logout -->
                    <li class="dropdown-item p-1 my-3 rounded" type="button">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="assets/php/actions.php?logout" class="d-flex text-decoration-none text-dark">
                                    <i class="fa-solid fa-right-from-bracket bg-gray p-2 rounded-circle"></i>

                                    <div class="
                      ms-3
                      d-flex
                      justify-content-between
                      align-items-center
                      w-100
                    ">
                                        <p class="m-0">Log Out</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>

            </div>
        </div>
    </div>
</div>