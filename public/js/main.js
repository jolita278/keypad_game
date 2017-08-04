var FastTyping = function () //function object
{
    const STATE_REGISTER = "register",   //game states
        STATE_LEVEL_SELECTION = "level_selection",
        STATE_GAME = "game",
        STATE_GAME_OVER = "game_over";

    var name, last_state, level, score, saveULR, start_game, end_game, time, average_spped, letterAppearance, key_press_time;

    var key_up_count = 0, time_count = 0;


    this.setSaveURL = function (value) {
        saveULR = value;
    };
//------------------------------------CHANGE STATE---------------------------------------
    function change_state(value) {

        if (last_state)
            last_state.hide(); // checks las state and hide it

        switch (value) {
            case STATE_REGISTER:
                last_state = register;
                break;

            case STATE_LEVEL_SELECTION:
                last_state = select_level;
                break;

            case STATE_GAME:
                last_state = game;
                break;

            case STATE_GAME_OVER:
                last_state = results;
                break;

            default:
                console.log("unknown state")
        }
        last_state.show();//shows new last_state object
    }

    //---------------------------------------------REGISTER------------------------------------------
    var RegisterLogics = function () {
        var view = $('#register'),
            input = $('#name'),
            button = $('#register_btn');

        this.show = function () {//remove class hidden from register view
            view.removeClass('hidden');
            enable();
        };

        this.hide = function () { //add class hidden for register view
            view.addClass('hidden');
            disable();
        };

        function enable() {

            input.keyup(function () {
                if (input.val().length >= 3) {

                    button.attr("disabled", false);
                    button.removeClass('btn-danger');
                    button.addClass('btn-success');
                }
                else {
                    button.attr("disabled", true);
                    button.addClass('btn-danger');
                    button.removeClass('btn-success');
                }
            });

            button.click(function () {
                name = input.val();
                change_state(STATE_LEVEL_SELECTION);
            })
        }

        function disable() {
            input.unbind();
            button.unbind();
            input.val("");

            button.attr("disabled", true);
            button.addClass('btn-danger');
            button.removeClass('btn-success');
        }
    };
    //----------------------------------------SELECT LEVEL----------------------------------------------

    var LevelSelectLogics = function () {
        var view = $('#levels'),
            button = $('#start');


        this.show = function () {//remove class hidden from register view
            view.removeClass('hidden');
            enable();
        };

        this.hide = function () { //add class hidden for register view
            view.addClass('hidden');
            disable();
        };

        function enable() {
            $('.title').html(name);
            $("#level_1").attr('checked', true);

            button.click(function () {
                level = $("input:radio[name=levels]:checked").val();
                start_game = Date.now();
                change_state(STATE_GAME);
            });
        }

        function disable() {
            button.unbind();
        }
    };
    //----------------------------------GAME---------------------------------------------

    var GameLogics = function () {

        var view = $('#game'),
            time_out,
            letters = "abcdefghijklmnopqrstuvwxyz",
            letter_key,
            letterPlacement = $('#letter'),
            lifeCount,
            userInput,
            userLevel = $('#user-level'),
            keyUpTime,

            isGolden;

        // clearInterval();

        this.show = function () {//remove class hidden from register view
            lifeCount = 3;
            $('#life').html(lifeCount); //TODO
            userInput = true;
            score = 0;
            view.removeClass('hidden');
            userLevel.html('<h4>You have ' + level + ' seconds to type the letter you see</h4>');// todo
            changeLetter();
            enable();
        };

        this.hide = function () { //add class hidden for register view
            view.addClass('hidden');
            disable();
        };
        function updateScore() {

            if (isGolden) {
                isGolden = false;
                for (i = 0; i < 5; i++) {
                    updateScore();
                }
            } else {
                score += 1;
            }

            if (score % 20 === 0) {

                lifeCount += 1;
                $('#life').html(lifeCount);//todo
            }

            $('#score').html(score);//todo
        }


        function removeLife() {

            lifeCount -= 1;
            $('#life').html(lifeCount);//todo

            if (lifeCount === 0) {
                end_game = Date.now();
                game_time();
                change_state(STATE_GAME_OVER);
            }
        }

        function enable() {
            $(window).keyup(
                function (e) {

                    if (e.key === letters[letter_key]) {
                        key_press_time = Date.now();
                        key_up_count = key_up_count+1;
                        speed();

                        updateScore();
                    } else {
                        removeLife();
                    }

                    keyUpTime = Date.now();

                    userInput = true;
                    changeLetter();

                }
            )
        }

        function disable() {
            $(window).unbind();
            clearTimeout(time_out);
        }

        function changeLetter() {

            if (!userInput) {
                removeLife();
            }
            clearTimeout(time_out);

            if (lifeCount <= 0) {
                return;
            }
            if (Math.random() < 0.1) {
                isGolden = true;
                letterPlacement.addClass('golden');

            } else {
                isGolden = false;
                letterPlacement.removeClass('golden');
            }
            userInput = false;
            time_out = setTimeout(changeLetter, level * 1000);
            letter_key = Math.round(Math.random() * (letters.length - 1));
            letterPlacement.html(letters[letter_key]);

            letterAppearance = Date.now();
        }
    };

    function game_time() {
        time = (end_game - start_game) * 0.001;
    }

    function speed(){
        average_spped = (key_press_time - letterAppearance);
        time_count = time_count + average_spped;
        average_spped = (time_count/key_up_count)*0.001;

        console.log(letterAppearance, key_press_time, average_spped);
    }
//------------------------------------------------GAME OVER-------------------------------------------
    var Results = function () {
        var view = $('#results'),
            button = $('#reset');

        this.show = function () {//remove class hidden from register view
            view.removeClass('hidden');
            $('#lastScore').html(score);
            enable();
        };

        this.hide = function () { //add class hidden for register view
            view.addClass('hidden');
            disable();
        };
        function enable() {

            saveResult();

            $('.title').html(name);

            button.click(function () {
                change_state(STATE_REGISTER);
            })
        }


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function saveResult() {

            $.ajax({
                url: saveULR,
                method: "POST",
                data: {
                    name: name,
                    level: level,
                    score: score,
                    time: time,
                    average_speed: average_spped
                }
            });
        }

        function disable() {
            button.unbind();
        }
    };

    var register = new RegisterLogics(),
        select_level = new LevelSelectLogics(),
        game = new GameLogics(),
        results = new Results();


    change_state(STATE_REGISTER);

    //initialize()
};

