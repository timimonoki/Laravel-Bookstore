<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.w3.org/1000/xhtml">

@include('common.header')

<body>

@include('common.navbar')

<div class="container">

    @include('partials.logo')

    <div class="row" style="margin-top: 60px;">
        <div class="col-xs-3">
            <h3><label for="category">Category</label></h3>
            <div class="list-group" id="category">
                <a th:href="@{/bookshelf(category='all')}" th:classappend="${activeAll}? 'active'" class="list-group-item">All</a>
                <a th:href="@{/searchByCategory(category='Management')}" th:classappend="${activeManagement}? 'active'" class="list-group-item">Management</a>
                <a th:href="@{/searchByCategory(category='Fiction')}" th:classappend="${activeFiction}? 'active'" class="list-group-item">Fiction</a>
                <a th:href="@{/searchByCategory(category='Engineering')}" th:classappend="${activeEngineering}? 'active'" class="list-group-item">Engineering</a>
                <a th:href="@{/searchByCategory(category='Programming')}" th:classappend="${activeProgramming}? 'active'" class="list-group-item">Programming</a>
                <a th:href="@{/searchByCategory(category='Arts &amp; Literature')}" th:classappend="${activeArtsLiterature}? 'active'" class="list-group-item">Arts &amp; Literature</a>
            </div>
        </div>

        <div class="col-xs-9">
            <div th:if="${emptyList}">
                <h5 style="font-style: italic;">Oops, no result is found. Try something else or try again later.</h5>
            </div>

            <table border="0" id="bookList">
                <thead>
                <tr>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr class="book-item" data-th-each="book : ${bookList}" >
                    <td>
                        <div th:if="${book != null}">
                            <div class="row" style="margin-bottom: 50px;">
                                <div class="col-xs-3">
                                    <a th:href="@{/bookDetail?id=}+${book.id}"><img
                                                class="img-responsive shelf-book"
                                                th:src="#{adminPath}+@{/image/book/}+${book.id}+'.png'" /></a>
                                </div>
                                <div class="col-xs-9" >
                                    <a th:href="@{/bookDetail?id=}+${book.id}"><h4
                                                th:text="${book.title}"></h4></a> <span
                                            th:text="${book.publicationDate}"></span>
                                    <p th:text="${book.author}"></p>
                                    <a th:href="@{/bookDetail?id=}+${book.id}"><span
                                                th:text="${#strings.capitalize(book.format)}"></span></a> <span
                                            th:text="${book.numberOfPages}"><span> pages</span></span><br />

                                    <a th:href="@{/bookDetail?id=}+${book.id}"><span
                                                style="font-size: x-large; color: #db3208;">$<span
                                                    th:text="${#numbers.formatDecimal(book.ourPrice, 0 , 'COMMA', 2, 'POINT')}"></span></span></a>

                                    <span style="text-decoration: line-through;">$<span
                                                th:text="${#numbers.formatDecimal(book.listPrice, 0 , 'COMMA', 2, 'POINT')}"></span></span>

                                    <p th:utext="${#strings.abbreviate(book.description, 1000)}"></p>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end of container -->


@include('common.footer-scripts')

<script>
    $(document).ready(function() {
        $('#bookList').DataTable({
            "lengthMenu":[[5,10,15,20,-1],[5,10,15,20,"All"]],
            "ordering":false,
            stateSave:true
        });

        $("#bookList").on('page.dt', function() {
            $('html, body').animate({
                scrollTop: $('#bookList').offset().top
            }, 200);
        });
    });
</script>
</body>
</html>
