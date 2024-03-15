<head>
    <title>Random Number Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script> <!-- Include script.js -->
</head>

<body class="bg-gradient-to-r from-blue-200 to-purple-200 min-h-screen flex items-center justify-center">
<section class="text-center">
    <img src="random.png" alt="Random Number" class="mb-8 w-40 h-40 mx-auto animate-bounce">
    <h1 class="text-4xl font-bold text-purple-900 mb-8">Random number generator</h1>
    <div class="flex flex-col items-center space-y-4">
        <button id="generateBtn" class="bg-purple-500 text-white hover:bg-purple-400 hover:text-white font-semibold py-3 px-8 rounded-full shadow-lg transition duration-300">
            Generate random number
        </button>
        <div id="result" class="text-xl font-semibold text-purple-900"></div>
    </div>
</section>
</body>
