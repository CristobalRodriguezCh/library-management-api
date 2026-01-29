<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Library Management API</title>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Inter', sans-serif;
                background: #1a1a2e;
                color: #ddd;
                line-height: 1.7;
            }

            .readme-container {
                max-width: 860px;
                margin: 0 auto;
                padding: 2rem 2rem 4rem;
            }

            /* Headings */
            .readme-container h1 {
                font-size: 2.2rem;
                color: #fff;
                border-bottom: 2px solid #0f3460;
                padding-bottom: 0.5rem;
                margin: 2rem 0 1rem;
            }

            .readme-container h2 {
                font-size: 1.5rem;
                color: #e94560;
                margin: 2rem 0 0.8rem;
                border-bottom: 1px solid #16213e;
                padding-bottom: 0.4rem;
            }

            .readme-container h3 {
                font-size: 1.15rem;
                color: #fff;
                margin: 1.5rem 0 0.5rem;
            }

            .readme-container h4 {
                font-size: 1rem;
                color: #ccc;
                margin: 1.2rem 0 0.4rem;
            }

            /* Paragraphs & lists */
            .readme-container p {
                margin: 0.6rem 0;
                color: #bbb;
            }

            .readme-container ul, .readme-container ol {
                padding-left: 1.5rem;
                margin: 0.5rem 0;
            }

            .readme-container li {
                margin: 0.3rem 0;
                color: #bbb;
            }

            /* Links */
            .readme-container a {
                color: #e94560;
                text-decoration: none;
            }

            .readme-container a:hover {
                text-decoration: underline;
            }

            /* Code blocks */
            .readme-container pre {
                background: #0f0f23;
                border: 1px solid #16213e;
                border-radius: 6px;
                padding: 1rem;
                overflow-x: auto;
                margin: 0.8rem 0;
            }

            .readme-container pre code {
                color: #a9dc76;
                font-family: 'Courier New', monospace;
                font-size: 0.85rem;
                background: none;
                padding: 0;
                border-radius: 0;
            }

            .readme-container code {
                background: #16213e;
                color: #e94560;
                padding: 0.15rem 0.4rem;
                border-radius: 4px;
                font-family: 'Courier New', monospace;
                font-size: 0.85rem;
            }

            /* Tables */
            .readme-container table {
                width: 100%;
                border-collapse: collapse;
                margin: 1rem 0;
            }

            .readme-container th, .readme-container td {
                border: 1px solid #16213e;
                padding: 0.5rem 0.8rem;
                text-align: left;
                font-size: 0.9rem;
            }

            .readme-container th {
                background: #16213e;
                color: #e94560;
                font-weight: 600;
            }

            .readme-container td {
                color: #bbb;
            }

            /* Horizontal rules */
            .readme-container hr {
                border: none;
                border-top: 1px solid #16213e;
                margin: 2rem 0;
            }

            /* Strong & em */
            .readme-container strong {
                color: #fff;
                font-weight: 600;
            }

            .readme-container blockquote {
                border-left: 3px solid #e94560;
                padding-left: 1rem;
                margin: 1rem 0;
                color: #999;
            }
        </style>
    </head>
    <body>
        <div class="readme-container" id="readme-content"></div>

        <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
        <script>
            var readmeContent = {!! json_encode(file_get_contents(base_path('README.md'))) !!};
            document.getElementById('readme-content').innerHTML = marked.parse(readmeContent);
        </script>
    </body>
</html>
