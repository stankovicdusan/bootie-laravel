<!DOCTYPE html>
<html>
    <head>
        @include("admin.fixed.head")
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        @include("admin.fixed.sidebar")
        @include("admin.fixed.header")
            @yield("content")
        @include("admin.fixed.footer")
    </body>
</html>
