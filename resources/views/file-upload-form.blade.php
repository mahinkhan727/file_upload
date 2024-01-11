<!doctype html>
<html lang="en">

<head>
    <title>File Upload Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="row container ">
        <div class="col-8 left">
            @if (session('success'))
                <div>{{ session('success') }}</div>
                @if (session('fileName'))
                    <div>File Name: {{ session('fileName') }}</div>
                @endif
            @endif

            <form action="{{ route('file.upload') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" accept=".pdf, .docx, .xlsx" required>
                <button type="submit">Upload File</button>
            </form>

            @if ($files->count() > 0)
                <h2>Uploaded Files:</h2>
                <ul>
                    @foreach ($files as $file)
                        <li>
                            {{ $file->name }}
                            (<a href="{{ route('file.preview', ['fileName' => $file->name]) }}"
                                target="_blank">Preview</a>)
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="col-4 right">
            <div id="pdf-viewer"></div>
        </div>
    </div>
</body>

</html>
