

<div class="page-top" style="width: 100%; height: 20px; background-color: #f46b42;"></div>

<!-- Static navbar -->
<nav class="navbar navbar-default navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">TIMEA`S BOOKSTORE</a>
        </div>
        <div id="navbar">
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown"><a href="#" class="dropdown-toggle"
                                        data-toggle="dropdown" role="button" aria-haspopup="true"
                                        aria-expanded="false">BOOKS <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Browse the bookshelf</a></li>
                        <li><a href="#">Store hours &#38; Directions</a></li>
                        <li><a href="#">FAQ</a></li>

                    </ul></li>
                <form class="navbar-form">
                    <div class="form-group">
                        <input type="text" name="keyword" class="form-control"
                               placeholder="Book title" />
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">SHOPPING CART</a></li>

            <?php if(isset($_SESSION['username'])){
                echo "<li><a href='myProfile.php'>MY PROFILE</a></li>";
            }
            else{
                echo "<li><a href='myAccount.php'>SIGN IN</a></li>";
            }
            ?>

            <?php if(isset($_SESSION['username'])){
                echo "<li><a href = 'logout.php'>LOGOUT</a></li>";
            }
            ?>

            <!-- <li><a href="myProfile.php">MY PROFILE</a></li> -->


            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
</nav>
