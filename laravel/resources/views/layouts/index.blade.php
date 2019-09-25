<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <style>
        .has-error {
            color:red;
        }
        .has-error input.form-control {
            background-color: #f1d1d1;
            opacity: 0.6;
        }
    </style>
</head>
<body>
    @include('layouts.header')
    <div id="app" class="container py-2">
        @yield('content')
    </div>
<script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.form').on('submit', function(e){
                e.preventDefault();

                $('[data-container]').each(function(i, item) {
                    let $item = $(item);
                    $item.removeClass('has-error');
                    $item.find('.help-block').text('');
                });

                let full_link = $('#full_link').val();
                $.ajax({
                    type: 'POST',
                    // url: './store',
                    url: '{{ route('links.store') }}',
                    data: {
                        full_link: full_link
                    },
                    success: function(result) {
                        $('.response').html('Your short link: <a href="' + result['short_link'] + '">' + result['short_link'] + '</a>');
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        for(let errorProperty in errors) {
                            let $item = $('[data-container="' + errorProperty + '"]');
                            $item.addClass('has-error');
                            $item.find('.help-block').text(errors[errorProperty].join('. '));
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
