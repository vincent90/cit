<!DOCTYPE html>
<html lang=”en”>
    <head>
        <meta charset="UTF-8" />
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/style.css') }}
		{{ HTML::style('//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css') }}

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