<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Caption Ideas</title>
    <style>
        :root {
            color-scheme: light;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f0ff;
            color: #241b35;
            margin: 0;
            padding: 2rem;
        }

        main {
            background: #ffffff;
            border-radius: 12px;
            margin: 0 auto;
            max-width: 680px;
            padding: 2rem;
            box-shadow: 0 12px 30px rgba(48, 30, 78, 0.12);
        }

        label,
        input,
        textarea {
            display: block;
            width: 100%;
        }

        label {
            font-weight: bold;
            margin-top: 1.25rem;
        }

        input,
        textarea {
            border: 1px solid #c9bddb;
            border-radius: 6px;
            box-sizing: border-box;
            font: inherit;
            margin-top: 0.5rem;
            padding: 0.75rem;
        }

        button {
            background: #6d28d9;
            border: 0;
            border-radius: 6px;
            color: #ffffff;
            cursor: pointer;
            font: inherit;
            font-weight: bold;
            margin-top: 1.5rem;
            padding: 0.75rem 1.25rem;
        }

        .errors,
        .submitted {
            border-radius: 6px;
            margin-top: 1.5rem;
            padding: 1rem;
        }

        .errors {
            background: #fff1f2;
            color: #9f1239;
        }

        .submitted {
            background: #f3e8ff;
        }

        .hashtag {
            color: #6d28d9;
            font-weight: bold;
        }

        .submitted ul {
            padding-left: 1.25rem;
        }
    </style>
</head>
<body>
    <main>
        <h1>Instagram Caption Ideas</h1>
        <p>Enter a photo topic and 3 to 5 keywords to get started.</p>

        @if ($errors->any())
            <div class="errors" role="alert">
                <strong>Please correct the following:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (isset($caption))
            <section class="submitted" aria-labelledby="caption-heading">
                <h2 id="caption-heading">Generated caption</h2>
                <p>{!! $formattedCaption !!}</p>
            </section>
        @endif

        <form method="POST" action="{{ route('caption.input') }}">
            @csrf

            <label for="topic">Photo topic</label>
            <input
                id="topic"
                name="topic"
                type="text"
                value="{{ old('topic', $topic ?? '') }}"
                placeholder="Example: Sunset at the beach"
                required
            >

            <label for="keywords">Keywords</label>
            <textarea
                id="keywords"
                name="keywords"
                rows="3"
                placeholder="Example: sunset, beach, travel, summer"
                required
            >{{ old('keywords', isset($keywords) ? implode(', ', $keywords) : '') }}</textarea>
            <small>Separate keywords with commas. Enter 3 to 5 keywords.</small>

            <button type="submit">Submit details</button>
        </form>

        @if (isset($submitted))
            <section class="submitted" aria-labelledby="submitted-heading">
                <h2 id="submitted-heading">Submitted data</h2>
                <p><strong>Photo topic:</strong> {{ $topic }}</p>
                <p><strong>Keywords:</strong></p>
                <ul>
                    @foreach ($keywords as $keyword)
                        <li>{{ $keyword }}</li>
                    @endforeach
                </ul>
            </section>
        @endif
    </main>
</body>
</html>
