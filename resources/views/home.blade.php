@extends('layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.info')
<div class="row">

    <div class="col-8">
        <h4 class="text-center">Інформація</h4>
    </div>
    <div class="col text-center mb-3">
        <form method="POST" action="{{route('delete')}}">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Видалити дані</button>
        </form>
    </div>
    <div class="col text-center mb-3">
        <a href="#" id="buyBackBranchBtn" class="btn btn-info">Завантажити</a>
    </div>
</div>


    <div class="row justify-content-center">
        <div class="col-12">
            <input type="text" id="adIdSearch" placeholder="Search by ad ID">

            <table class="table table-striped table-bordered table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">ad_id</th>
                    <th scope="col">impressions</th>
                    <th scope="col">clicks</th>
                    <th scope="col">unique clicks</th>
                    <th scope="col">leads</th>
                    <th scope="col">conversion</th>
                    <th scope="col">roi</th>
                </tr>
                </thead>
                <tbody id="transactionTable"></tbody>
            </table>

            <input type="hidden" id="currentPage" value="1">
        </div>
    </div>
@endsection

@section('script')
    <script>
        function fetchDataAndRender() {
            $.ajax({
                url: '/api/info',
                method: 'GET',
                headers: { Authorization: 'testBearer23129912' },
                success: function(data) {
                    renderData(data);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }

        function updateData() {
            $.ajax({
                url: '/api/update-db',
                method: 'GET',
                headers: { Authorization: 'testBearer23129912' },
                success: function(data) {
                    console.log(data)
                    if (!data || data.length === 0) {
                        // Якщо отримано порожній масив або відсутні дані
                        updateData(); // Викликаємо знову, щоб отримати дані
                    } else {
                        fetchDataAndRender(); // Викликаємо відображення даних
                    }
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }

        function renderData(data) {
            let filteredTransactions = data;
            let searchTerm = $('#adIdSearch').val().toLowerCase();

            if (searchTerm) {
                filteredTransactions = filteredTransactions.filter(transaction => transaction.ad_id.toLowerCase().includes(searchTerm));
            }

            if (filteredTransactions.length === 0) {
                $('tbody').html('<tr><td colspan="8">Записи відсутні</td></tr>');
                return;
            }

            $('tbody').empty();

            for (let i = 0; i < filteredTransactions.length; i++) {
                let transaction = filteredTransactions[i];
                let row = '<tr>';
                row += '<td>' + transaction.id + '</td>';
                row += '<td>' + transaction.ad_id + '</td>';
                row += '<td>' + transaction.impressions + '</td>';
                row += '<td>' + transaction.clicks + '</td>';
                row += '<td>' + transaction.unique_clicks + '</td>';
                row += '<td>' + transaction.leads + '</td>';
                row += '<td>' + transaction.conversion + '</td>';
                row += '<td>' + transaction.roi + '</td>';
                row += '</tr>';
                $('tbody').append(row);
            }

            $('#adIdSearch').on('input', function() {
                let searchTerm = $(this).val().toLowerCase();
                let transactions = data;

                if (!transactions) {
                    fetchDataAndRender();
                } else {
                    renderData(transactions);
                }
            });
        }

        $(document).ready(function() {
            fetchDataAndRender();

            $('#buyBackBranchBtn').click(function(e) {
                e.preventDefault();
                updateData();
            });


        });


    </script>
@endsection
