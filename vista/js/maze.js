$(document).ready(function () {
    let rows = 25; 
    let cols = rows;


    let voice = new Audio('./vista/sounds/voice.mp3');
    let instruments = new Audio('./vista/sounds/instrumental.mp3');
    voice.loop = true;
    instruments.loop = true;

    let audioInitialized = false;
    let mazeCompleted = false;

    function placeItem(itemClass) {
        let pathCells = $(".cell").not('.wall, .start, .end, .active');
        let randomIndex = Math.floor(Math.random() * pathCells.length);
        let randomPathCell = $(pathCells[randomIndex]);

        randomPathCell.addClass(itemClass);
    }

    function playVoice() {
        if (!audioInitialized) {
            audioInitialized = true;
            voice.play();
            instruments.play();
            instruments.volume = 0;
        }
        voice.volume = 1;
    }

    function playInstrumental() {
        if (!audioInitialized) {
            audioInitialized = true;
            voice.play();
            instruments.play();
            voice.volume = 0;
        }
        instruments.volume = 1;
    }

    $("#dificultad").change(function () {
        const dificultad = $(this).val();
        switch (dificultad) {
            case "facil":
                rows = 15;
                cols = 15;
                break;
            case "medio":
                rows = 25;
                cols = 25;
                break;
            case "difícil":
                rows = 35;
                cols = 35;
                break;
            case "extremo":
                rows = 45;
                cols = 45;
                break;
            default:
                rows = 25;
                cols = 25;
        }
        generateMaze(rows, cols);
    });

    function generateMaze() {
        mazeCompleted = false;
        $("#maze").empty();
        $("#maze").css({
            "grid-template-columns": `repeat(${cols}, 20px)`,
            "grid-template-rows": `repeat(${rows}, 20px)`
        });

        let maze = [];
        for (let i = 0; i < rows; i++) {
            maze[i] = [];
            for (let j = 0; j < cols; j++) {
                maze[i][j] = "wall";
            }
        }

        function createPath(x, y) {
            maze[x][y] = "path";
            const directions = [
                [0, 1],
                [1, 0],
                [0, -1],
                [-1, 0]
            ];
            directions.sort(() => Math.random() - 0.5);
            for (let [dx, dy] of directions) {
                const newX = x + dx * 2;
                const newY = y + dy * 2;
                if (newX >= 1 && newX < rows && newY >= 1 && newY < cols - 1) {
                    if (maze[newX][newY] === "wall") {
                        maze[x + dx][y + dy] = "path";
                        createPath(newX, newY);
                    }
                }
            }
        }

        createPath(1, 1);
        maze[1][1] = "start";
        maze[rows - 1][cols - 2] = "end";

        for (let i = 0; i < rows; i++) {
            for (let j = 0; j < cols; j++) {
                let cell = $("<div>").addClass("cell");
                if (maze[i][j] === "start") {
                    cell.addClass("start active");
                } else if (maze[i][j] === "end") {
                    cell.addClass("end");
                } else if (maze[i][j] === "wall") {
                    cell.addClass("wall");
                }
                $("#maze").append(cell);
            }
        }
        //initializations
        placeItem("voice");
        placeItem("instrumental");
        voice.pause();
        instruments.pause();
        audioInitialized = false;
    }

    function movePlayer(newPosition) {
        if (!newPosition.hasClass("wall")) {
            $(".active").removeClass("active");
            newPosition.addClass("active");

            if (newPosition.hasClass("voice")) {
                playVoice();
                newPosition.removeClass("voice");
            }
            if (newPosition.hasClass("instrumental")) {
                playInstrumental();
                newPosition.removeClass("instrumental");
            }

            const remainingVoice = $(".voice").length;
            const remainingInstrumental = $(".instrumental").length;

            if (newPosition.hasClass("end")) {
                if (remainingVoice === 0 && remainingInstrumental === 0) {
                    Swal.fire({
                        title: '¡Felicidades!',
                        text: 'Has llegado a la salida.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    });
                    mazeCompleted = true;
                } else {
                    Swal.fire({
                        title: 'Aún faltan elementos',
                        text: 'Debes recoger todos los instrumentos y voces antes de salir.',
                        icon: 'warning',
                        confirmButtonText: 'Seguir jugando'
                    });
                }
            }
        }
    }

    $(document).keydown(function (e) {
        if (mazeCompleted) return;

        let currentPosition = $(".active");
        let currentIndex = currentPosition.index();
        let newPosition;

        switch (e.which) {
            case 37: // left
                newPosition = currentPosition.prev();
                break;
            case 38: // up
                newPosition = $("#maze .cell").eq(currentIndex - cols);
                break;
            case 39: // right
                newPosition = currentPosition.next();
                break;
            case 40: // down
                newPosition = $("#maze .cell").eq(currentIndex + cols);
                break;
            default:
                return;
        }

        if (newPosition && newPosition.length) {
            movePlayer(newPosition);
        }

        e.preventDefault();
    });

    generateMaze();

    $("#generateMaze").click(function () {
        generateMaze();
    });
});
