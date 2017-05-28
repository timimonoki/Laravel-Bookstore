

<div class="page-top" style="width: 100%; height: 20px; background-color: #f46b42;"></div>

<!-- Static navbar -->
<nav class="navbar navbar-default navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('index') }}">TIMEA`S BOOKSTORE</a>
        </div>
        <div id="navbar">
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown"><a href="#" class="dropdown-toggle"
                                        data-toggle="dropdown" role="button" aria-haspopup="true"
                                        aria-expanded="false">BOOKS <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('bookshelf') }}">Browse the bookshelf</a></li>
                        <li><a href="{{ route('hours') }}">Store hours &#38; Directions</a></li>
                        <li><a href="{{ route('faq') }}">FAQ</a></li>

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
                <li><a href=" {{ route('myAccount') }} ">MY ACCOUNT</a></li>
                <li><a href=" {{ route('myProfile') }}">MY PROFILE</a></li>
                <li><a href="{{ route('shoppingCart') }}">SHOPPING CART</a></li>
                <li><a href='{{ route('myAccount') }}'>SIGN IN</a></li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">LOGOUT</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>

            <!-- <li><a href="myProfile.php">MY PROFILE</a></li> -->


            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
</nav>
