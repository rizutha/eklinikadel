@include('templates.partials.head')

<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div class="d-flex justify-content-center align-items-center container" style="height: 100vh;">
        <div class="jumbotron text-center">
            <div class="col">
                <h1 class="display-4 typed-text"></h1>
                <p class="lead">Sistem Managemen Klinik Berbasis Laravel <br>Silahkan
                    <a href="{{ route('login') }}">Login</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        // Daftar kata-kata yang akan ditekskan
        var words = ["Selamat datang di sistem kami", "Selamat datang di e-Klinik"];
        var currentWordIndex = 0;
        var currentCharacterIndex = 0;
        var typingSpeed = 75;

        function typeText() {
            var word = words[currentWordIndex];
            var displayText = word.slice(0, currentCharacterIndex + 1);
            $(".typed-text").text(displayText);

            if (currentCharacterIndex === word.length - 1) {
                setTimeout(function() {
                    eraseText();
                }, 2000);
            } else {
                currentCharacterIndex++;
                setTimeout(typeText, typingSpeed);
            }
        }

        function eraseText() {
            var word = words[currentWordIndex];
            var displayText = word.slice(0, currentCharacterIndex);

            if (currentCharacterIndex === 17) {
                currentWordIndex++;
                if (currentWordIndex === words.length) {
                    currentWordIndex = 0;
                }
                setTimeout(typeText, typingSpeed);
            } else {
                currentCharacterIndex--;
                $(".typed-text").text(displayText);
                setTimeout(eraseText, typingSpeed);
            }
        }

        $(document).ready(function() {
            setTimeout(typeText, 1000);
        });
    </script>
</body>
@include('templates.partials.footer')
