<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/css/trix.css') }}">
</head>

<body>
    <form method="post" action={{ url('/utilities/trix') }}>
        @csrf
        <p>
            <input id="body" type="hidden" name="body" value="" />
            <trix-editor input="body" class="trix-content"></trix-editor>
        </p>
        <input type="submit" name="submit" value="Submit" />
    </form>

    <script src="{{ asset('js/trix.js') }}"></script>
    <script src="{{ asset('js/attachments.js') }}"></script>
</body>

</html>
