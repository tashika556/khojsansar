<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light"
    data-header-styles="light" data-menu-styles="light" data-toggled="close">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Mamix - PHP Bootstrap 5 Premium Admin & Dashboard Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="phpadmin, php template, admin panel, admin, admin dashboard, php admin panel, admin dashboard ui, php admin, dashboard, php framework, admin dashboard template, bootstrap dashboard, admin theme, admin panel template, php developer">
    <title>@yield('page-title') </title>
    @stack('before-styles')
    <link rel="stylesheet" href="{{ URL::asset('admin/css/styles.css')}}" />
    <link rel="stylesheet" href="{{ URL::asset('admin/libs/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ URL::asset('admin/icon-fonts/icons.css')}}" />


    <link rel="icon" href="{{ URL::asset('frontend/img/favicon.ico') }}" type="image/x-icon">
    @stack('after-styles')
</head>

<body class="bg-white">
    @section('container')
    @show
    @stack('before-scripts')
    <script src="{{ URL::asset('admin/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ URL::asset('admin/js/show-password.js')}}"></script>
    <script src="{{ URL::asset('frontend/js/font-awesom.js')}} "></script>
    <script>
    function confirmDelete() {
        return confirm('Do you really want to delete this data ? ');
    }
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const rowsPerPage = 10;
        const tableBody = document.querySelector('#dataTable');
        let allRows = Array.from(tableBody.querySelectorAll('tr'));
        let filteredRows = allRows;
        const paginationControls = document.querySelector('#pagination-controls');
        let currentPage = 1;
        const maxPageNumbers = 3;

        function getTotalPages() {
            return Math.ceil(filteredRows.length / rowsPerPage);
        }

        function showPage(page) {
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            tableBody.innerHTML = '';
            filteredRows.slice(start, end).forEach(row => {
                tableBody.appendChild(row);
            });
            currentPage = page;
            createPaginationControls();
        }

        function createPaginationControls() {
            paginationControls.innerHTML = '';
            const totalPages = getTotalPages();
            let startPage = Math.max(1, currentPage - Math.floor(maxPageNumbers / 2));
            let endPage = Math.min(totalPages, startPage + maxPageNumbers - 1);

            if (endPage - startPage < maxPageNumbers - 1) {
                startPage = Math.max(1, endPage - maxPageNumbers + 1);
            }


            if (currentPage > 1) {
                const prevButton = document.createElement('button');
                prevButton.textContent = 'Previous';
                prevButton.classList.add('btn', 'btn-outline-primary', 'mx-1');
                prevButton.addEventListener('click', () => showPage(currentPage - 1));
                paginationControls.appendChild(prevButton);
            }


            for (let i = startPage; i <= endPage; i++) {
                const button = document.createElement('button');
                button.textContent = i;
                button.classList.add('btn', 'btn-outline-primary', 'mx-1');
                if (i === currentPage) {
                    button.classList.add('active');
                }
                button.addEventListener('click', () => showPage(i));
                paginationControls.appendChild(button);
            }


            if (currentPage < totalPages) {
                const nextButton = document.createElement('button');
                nextButton.textContent = 'Next';
                nextButton.classList.add('btn', 'btn-outline-primary', 'mx-1');
                nextButton.addEventListener('click', () => showPage(currentPage + 1));
                paginationControls.appendChild(nextButton);
            }
        }

        document.getElementById('header-search').addEventListener('keyup', function() {
            let query = this.value.toLowerCase();
            filteredRows = allRows.filter(row => {
                let districtName = row.querySelector('.data-name') ? row.querySelector(
                    '.data-name').textContent.toLowerCase() : '';
                let provinceName = row.querySelector('.province-name') ? row.querySelector(
                    '.province-name').textContent.toLowerCase() : '';
                let muniName = row.querySelector('.muni-name') ? row.querySelector('.muni-name')
                    .textContent.toLowerCase() : '';
                return districtName.includes(query) || provinceName.includes(query) || muniName
                    .includes(query);
            });
            showPage(1);
        });


        showPage(1);
    });
    </script>


    @stack('after-scripts')
</body>

</html>