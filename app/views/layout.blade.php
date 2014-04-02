<!DOCTYPE html>
<html lang=”en”>
    <head>
        <meta charset="UTF-8" />
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/style.css') }}
        {{ HTML::style('css/theme.bootstrap_2.css') }}
        {{ HTML::style('css/datepicker.css') }}
        {{ HTML::style('css/ui-lightness/jquery-ui-1.10.4.custom.min.css') }}
        <title>
            Tutorial
        </title>
    </head>
    <body>
        @include("header")
        <div class="content">
            <div class="container">
                @yield("content")
            </div>
        </div>
        @include("script")

        @include("footer")
    </body>
</html>