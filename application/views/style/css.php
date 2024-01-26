<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

<style>
/*Overrides for Tailwind CSS */

/*Form fields*/
.dataTables_wrapper select,
.dataTables_wrapper .dataTables_filter input {
    color: #4a5568;
    /*text-gray-700*/
    padding-left: 1rem;
    /*pl-4*/
    padding-right: 1rem;
    /*pl-4*/
    padding-top: .5rem;
    /*pl-2*/
    padding-bottom: .5rem;
    /*pl-2*/
    line-height: 1.25;
    /*leading-tight*/
    border-width: 2px;
    /*border-2*/
    border-radius: .25rem;
    border-color: #edf2f7;
    /*border-gray-200*/
    background-color: #edf2f7;
    /*bg-gray-200*/
}

/*Row Hover*/
table.dataTable.hover tbody tr:hover,
table.dataTable.display tbody tr:hover {
    background-color: #ebf4ff;
    /*bg-indigo-100*/
}

/*Pagination Buttons*/
.dataTables_wrapper .dataTables_paginate .paginate_button {
    font-weight: 700;
    /*font-bold*/
    border-radius: .25rem;
    /*rounded*/
    border: 1px solid transparent;
    /*border border-transparent*/
}

/*Pagination Buttons - Current selected */
.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    color: #fff !important;
    /*text-white*/
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    /*shadow*/
    font-weight: 700;
    /*font-bold*/
    border-radius: .25rem;
    /*rounded*/
    background: #667eea !important;
    /*bg-indigo-500*/
    border: 1px solid transparent;
    /*border border-transparent*/
}

/*Pagination Buttons - Hover */
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    color: #fff !important;
    /*text-white*/
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    /*shadow*/
    font-weight: 700;
    /*font-bold*/
    border-radius: .25rem;
    /*rounded*/
    background: #667eea !important;
    /*bg-indigo-500*/
    border: 1px solid transparent;
    /*border border-transparent*/
}

/*Add padding to bottom border */
table.dataTable.no-footer {
    border-bottom: 1px solid #e2e8f0;
    /*border-b-1 border-gray-300*/
    margin-top: 0.75em;
    margin-bottom: 0.75em;
}

/*Change colour of responsive icon*/
table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
    background-color: #667eea !important;
    /*bg-indigo-500*/
}
</style>

<style>
.font-web {
    font-family: 'ABeeZee', sans-serif;
}
</style>