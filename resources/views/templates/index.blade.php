
<?php
session_start();
?>

        <!DOCTYPE html>
<html lang="en" xmlns:th="http://www.w3.org/1000/xhtml">

@include('common.header')

<body>

@include('common.navbar')

<div class="container">
    <div class="row">
        <!-- carousel -->
        <div class="col-xs-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0"
                                class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img
                                        src="image/img1.png" alt="..." />

                            </div>
                            <div class="item">
                                <img
                                        src="image/imgg2.png" alt="..." />

                            </div>
                            <div class="item">
                                <img
                                        src="image/img3.png" alt="..." />

                            </div>

                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic"
                           role="button" data-slide="prev"> <span
                                    class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a> <a class="right carousel-control"
                                href="#carousel-example-generic" role="button" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"
                                      aria-hidden="true"></span> <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <img src="image/logo2.png" class="img-responsive" style="width: 150%" />
        </div>
    </div>

    <hr />

    <div class="row">
        <div class="col-xs-4">
            <div clas="panel panel-default">
                <div class="panel-body">
                    <img src="image/bestseller.png" class="img-responsive" />
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div clas="panel panel-default">
                <div class="panel-body">
                    <img src="image/hours.png" class="img-responsive" />
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div clas="panel panel-default">
                <div class="panel-body">
                    <img src="image/faq.png" class="img-responsive" />
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="home-headline">
            <span>Featured Books</span>
        </div>
        <hr style="margin-top: -15px;" />
    </div>


    <div class="row">
        <div id="featured-books" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#featured-books" data-slide-to="0" class="active"></li>
                <li data-target="#featured-books" data-slide-to="1"></li>
                <li data-target="#featured-books" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="image/shelf.png" class="img-responsive" />
                    <div class="carousel-caption">
                        <div class="row">
                            <div class="col-xs-2">
                                <img class="img-responsive" src="image/book1.png" />
                            </div>
                            <div class="col-xs-2">
                                <img class="img-responsive" src="image/book1.png" />
                            </div>
                            <div class="col-xs-2">
                                <img class="img-responsive" src="image/book1.png" />
                            </div>
                            <div class="col-xs-2">
                                <img class="img-responsive" src="image/book1.png" />
                            </div>
                            <div class="col-xs-2">
                                <img class="img-responsive" src="image/book1.png" />
                            </div>
                            <div class="col-xs-2">
                                <img class="img-responsive" src="image/book1.png" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="image/shelf.png" class="img-responsive" />
                    <div class="carousel-caption">
                        <div class="row">
                            <div class="col-xs-2">
                                <img class="img-responsive" src="image/book1.png" />
                            </div>
                            <div class="col-xs-2">
                                <img class="img-responsive" src="image/book1.png" />
                            </div>
                            <div class="col-xs-2">
                                <img class="img-responsive" src="image/book1.png" />
                            </div>
                            <div class="col-xs-2">
                                <img class="img-responsive" src="image/book1.png" />
                            </div>
                            <div class="col-xs-2">
                                <img class="img-responsive" src="image/book1.png" />
                            </div>
                            <div class="col-xs-2">
                                <img class="img-responsive" src="image/book1.png" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="image/shelf.png" class="img-responsive" />
                    <div class="carousel-caption">
                        <div class="row">
                            <div class="col-xs-2">
                                <img class="img-responsive" src="image/book1.png" />
                            </div>
                            <div class="col-xs-2">
                                <img class="img-responsive" src="image/book1.png" />
                            </div>
                            <div class="col-xs-2">
                                <img class="img-responsive" src="image/book1.png" />
                            </div>
                            <div class="col-xs-2">
                                <img class="img-responsive" src="image/book1.png" />
                            </div>
                            <div class="col-xs-2">
                                <img class="img-responsive" src="image/book1.png" />
                            </div>
                            <div class="col-xs-2">
                                <img class="img-responsive" src="image/book1.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="##featured-books"
               role="button" data-slide="prev"> <span
                        class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a> <a class="right carousel-control" href="##featured-books"
                    role="button" data-slide="next"> <span
                        class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

</div>
<!-- end of container -->

@include('common.footer-scripts')

</body>
</html>
