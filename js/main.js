var FastTyping = function () //function object
{
    const STATE_REGISTER = "register",   //game states
        STATE_LEVEL_SELECTION = "level_selection",
        STATE_GAME = "game",
        STATE_GAME_OVER = "game_over";

    var name, last_state, level;

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
    }
    var LevelSelectLogics = function () {
        var view = $('#levels'),
            button = $('#start');


        this.show = function () {//remove class hidden from register view
            view.removeClass('hidden');
            enable();
        }

        this.hide = function () { //add class hidden for register view
            view.addClass('hidden');
            disable();
        }

        function enable() {
            $('.title').html(name);
            $("#level_1").attr('checked', true);

            button.click(function () {
                level = $("input:radio[name=levels]:checked").val();

                change_state(STATE_GAME);
            });
        }

        function disable() {
            button.unbind();
        }
    }

    var GameLogics = function () {
        var view = $('#game'),
            button = $('#stop'),
            time_out,
            //interval = setInterval(900),
            letters = "ABCDEFGHIKLMNOPQRSTVXYZabcdefghijklmnopqrstuvwxyz",
            letter_key,
            letterPlacement = $('#letter');
            clearInterval();

        this.show = function () {//remove class hidden from register view
            view.removeClass('hidden');
            enable();
        }

        this.hide = function () { //add class hidden for register view
            view.addClass('hidden');
            // disable();
        }
        function enable(){
            $('.score').html('00001');
            $('.level').html("LEVEL " + level);
            $('.title').html(name);

            time_out = setTimeout(changeLetter, level*500);

            switch (level) {
                case "3":
                    $('.level').html("LEVEL " + level);
                    break;

                case "6":
                    $('.level').html("LEVEL " + level);
                    break;

                case "9":
                    $('.level').html("LEVEL " + level);
                    break;

                default:

            }
            function changeLetter(){
                letter_key = Math.round(Math.random()*(letters.length -1));
                letterPlacement.html(letters[letter_key]);

            }
        }

    }

    var Results = function () {
        var view = $('#results'),
            button = $('#reset');

        this.show = function () {//remove class hidden from register view
            view.removeClass('hidden');
            enable();
        }

        this.hide = function () { //add class hidden for register view
            view.addClass('hidden');
            disable();
        }
        function enable() {
            $('.title').html(name);

            button.click(function () {
                change_state(STATE_REGISTER);
            })
        }

        function disable() {
            button.unbind();
        }


    }

    var register = new RegisterLogics(),
        select_level = new LevelSelectLogics(),
        game = new GameLogics(),
        results = new Results();


    change_state(STATE_REGISTER);

    //initialize()
}

function initialize() {

}
