<!DOCTYPE html>
<html lang="zxx">
<script>
    let baseUrl = "{{ url("/") }}";
    let csrf = "{{ csrf_token() }}";
</script>
<head>
    @include('fixed.head')
</head>
<body>
    @include('fixed.header')
        @yield("content")
    @include('fixed.footer')
    @yield("appendScripts")
</body>

</html>
