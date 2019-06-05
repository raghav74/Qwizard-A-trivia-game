$(function () {
    var questionCounter = 0;
    var clock;
    var qProgress = 0;
    var correct_count = 0;
    var incorrect_count = 0;
    var unanswered_count = 0;
    var corr = 0;
    var quesHTML;
    var ansHTML;
    var timerHTML;
    var gameHTML;
    var counter = 100.0;
    var tscore = 0;
    var score = 0;
    var bar = document.getElementById("bar-1");
    var selectedAnswer="";

    $("nav").hide();
    $.ajax({
        url: "php/ques.php",
        method: "POST",
        data: {
            category: category
        },
        cache: false,
        success: function (data) {
            // console.log(data);
            myobj = JSON.parse(data);
            function init() {
                questionCounter = 0;
                qProgress = 0;
                correct_count = 0;
                incorrect_count = 0;
                unanswered_count = 0;
                counter = 100.0;
                tscore = 0;
                score = 0;
                corr = 0;
                tscore = 0;
                score = 0;
                selectedAnswer="";
                bar = document.getElementById("bar-1");
                $(".alert").hide();
                genQuiz();
                time(); //time is called for countdown              
            }

            init();

            //function which is called when an ans. is clicked
            $("body").unbind('click').on("click", ".answer", function () {
                selectedAnswer="";
                selectedAnswer = $(this).text();
                $(".answer").css("pointer-events", "none");
                $(".answer").css({
                    "border-color": "white",
                    "color": "white",
                });
                if (selectedAnswer === myobj[questionCounter].answer) {
                    //alert("correct");
                    correct_count++;
                    clearInterval(clock);
                    $(this).css("background-color", "#007e33");
                    //To display alert for correct answer
                    $("#message").removeClass("alert-danger-alt");
                    $("#message").removeClass("alert-warning-alt");
                    $("#message").addClass("alert-success-alt");
                    $("#highlight-text").html("Good!! ");
                    $("#light-text").html("You got it right!");
                    $(".alert").fadeIn();
                    // correct_count++;
                    tscore = tscore + counter / 10;// tscore keeps track of counter and time for giving correct ans
                    //If the correct ans is given quickly, tscore val is high
                    setTimeout(wait, 2500); //  4 sec 
                } else {
                    incorrect_count++;
                    clearInterval(clock);
                    corr = myobj[questionCounter].options.indexOf(myobj[questionCounter].answer);
                    $(this).css("background-color", "#cc0000"); //Change your wrong choice to red
                    $(".answer").eq(corr).css({
                        "background-color": "#007e33" //Change right answer to green
                    });
                    //Show alert that you got wrong answer
                    $("#message").removeClass("alert-success-alt");
                    $("#message").removeClass("alert-warning-alt");
                    $("#message").addClass("alert-danger-alt");
                    $("#highlight-text").html("Oops!! ");
                    $("#light-text").html("You got it wrong!");
                    $(".alert").fadeIn();
                    // incorrect_count++;
                    setTimeout(wait, 2500); //  4 sec            
                }
            });

            function wrongAnsDueToTimeOut() {
                unanswered_count++;
                $("#message").removeClass("alert-success-alt");
                $("#message").removeClass("alert-danger-alt");
                $("#message").addClass("alert-warning-alt");
                $("#highlight-text").html("Sorry!! ");
                $("#light-text").html("You missed it!");
                $(".alert").fadeIn();
                corr = myobj[questionCounter].options.indexOf(myobj[questionCounter].answer);
                $(".answer").css("pointer-events", "none");
                $(".answer").css({
                    "border-color": "white",
                    "color": "white",
                    "background-color": "#202020"
                });
                $(".answer").eq(corr).css({
                    "background-color": "#007e33"
                });
                setTimeout(wait, 2500);
            }

            //generates the quiz
            function genQuiz() {
                // $("body").unbind('click');
                //Question section-
                quesHTML = "<h2 class='text-center'>" + myobj[questionCounter].question + "</h2>";
                $(".ques").html(quesHTML);
                //Options section
                ansHTML = "<div class='row text-center justify-content-around'> <div class = 'op1 col-5' ><p class='btn-outline-white answer hoverable'>" + myobj[questionCounter].options[0] + "</p></div> <div class = 'op2 col-5' ><p class='btn-outline-white answer hoverable'>" + myobj[questionCounter].options[1] + "</p></div> </div> <div class = 'row text-center justify-content-around' ><div class = 'op3 col-5' ><p class='btn-outline-white answer hoverable'>" + myobj[questionCounter].options[2] + "</p></div> <div class = 'op4 col-5' ><p class='btn-outline-white answer hoverable'>" + myobj[questionCounter].options[3] + "</p></div> </div>";
                $(".optionsArea").html(ansHTML);
                //Timer section
                // timerHTML = "<p class='timer-p text-center h4' style='color:green';><span class='timer'>10</span></p>";
                // $(".clock-wrapper").html(timerHTML);
            }

            function wait() {
                if (questionCounter < 6) {
                    questionCounter++;
                    qProgress = ((questionCounter) / 7) * 100;
                    prog();
                    if (questionCounter == 0) {
                        $(".alert").hide();
                    }
                    else
                        $(".alert").fadeOut();
                    genQuiz();
                    $(".answer").css("pointer-events", "");
                    counter = 100.0;
                    bar.filledcolor = "#00C851";
                    bar.progress = 100 - (counter);
                    $(".bar_progress").html(counter);
                    time();
                } else {
                    qProgress = 100;
                    prog();
                    $(".quiz").fadeOut("slow");
                    $(".alert").hide();
                    finalScreen();

                }
            }

            function time() {
                clock = setInterval(tenSeconds, 100); //ten seconds is the function that counts down and it is called every 1 second
                function tenSeconds() {
                    if (counter == 0) {
                        clearInterval(clock);
                        wrongAnsDueToTimeOut();
                    }
                    if (counter > 0) {
                        counter--;
                    }
                    bar.progress = 100 - (counter);
                    $(".bar_progress").html(counter / 10);
                    if (counter > 60) {
                        $(".bar_progress").html(counter / 10);
                        bar.progress = 100 - (counter);
                    } else if (counter <= 60 && counter > 30) {
                        bar.filledcolor = "#ffbb33";
                        $(".bar_progress").html(counter / 10);
                        bar.progress = 100 - (counter);

                    } else {
                        bar.progress = 100 - (counter);
                        if (counter == 30 || counter == 20 || counter == 10) {
                            $(".bar_progress").html(counter / 10);
                            bar.filledcolor = "#ff4444";


                        } else if (counter == 0)
                            // $(".timer").html(counter);
                            bar.progress = 100 - (counter);


                    }
                }
            }

            /*function finalScreen() {
                gameHTML = "<p class='text-center'>End.Stats-" + "</p>" + "<p class='summary-correct'>Correct Answers: " + correct_count + "</p>" + "<p>Wrong Answers: " + incorrect_count + "</p>" + "<p>Unanswered: " + unanswered_count + "</p>" + "<p class='text-center reset-button-container'><a class='btn btn-primary btn-lg btn-block reset-button' href='#' role='button'>Reset</a></p>";
                $(".mainArea").html(gameHTML);
            }*/
            function finalScreen() {
                //finalScreen() is used to display the final screen and to calculate score after quiz is complete
                scoreCalc();
                if (score >= 0) {
                    $.ajax({
                        url: "php/score.php",
                        method: "POST",
                        cache: false,
                        data: {
                            name: name,
                            category: category,
                            score: score
                        },
                        success: function (data) {
                            console.log(data);
                        }
                    });
                }
                // gameHTML = "<div class='container'><p class='text-center'>End.Stats-" + "</p>" + "<p class='summary-correct text-center'>Correct Answers: " + correct_count + "</p>" + "<p class='text-center'>Wrong Answers: " + incorrect_count + "</p>" + "<p class='text-center'>Unanswered: " + unanswered_count + "</p>"+"<p class='text-center'>Score: "+ score +"</p>"+"<div class='text-center'><p class='btn leadbtn text-center btn-primary waves-effect'>View Leaderboards</p></div></div>";
                gameHTML = "<div class='container text-center rounded z-depth-2 pb-4' style='background-color:#1f2833';><h1 class='text-center pt-4 pb-4 white-text'>Quiz Stats</h1><p class='white-text' style='text-transform:capitalize;font-size:2em'>Correct Answers: " + correct_count + "</p><p class='white-text' style='text-transform:capitalize;font-size:2em'>Wrong Answers: " + incorrect_count + "</p><p class='white-text' style='text-transform:capitalize;font-size:2em'>Unanswered: " + unanswered_count + "</p><p class='white-text' style='text-transform:capitalize;font-size:2em'>Score: " + score + "</p><p class='btn btn-lg leadbtn hoverable font-weight-bold' style='background-color:#66fcf1; color:#1f2833;'>View Leaderboards</p></div>"
                $("#cat").html(gameHTML);
                questionCounter = 0;
                qProgress = 0;
                correct_count = 0;
                incorrect_count = 0;
                unanswered_count = 0;
                corr = 0;
                counter = 100.0;
                tscore = 0;
                score = 0;
                selectedAnswer="";
                bar = document.getElementById("bar-1");
                $(".leadbtn").click(function () {
                    $('nav').show();
                    $.ajax({
                        url: "score2.php",
                        method: "POST",
                        data: {
                            category: category
                        },
                        success: function (data) {
                            $("#cat").html(data);
                            $("#head").html(category + " Leaderboards");
                            $(".nav-item").removeClass("active");
                            $(".nav-item").eq(3).addClass("active");
                        }
                    });
                    // $.get("hscores.html", function (data, status) {
                    //     $("#cat").html(data);
                    //     $("#head").html("Leaderboards");
                    //     $(".nav-item").removeClass("active");
                    //     $(".nav-item").eq(3).addClass("active");
                    // })
                });
            }
            function prog() {
                $('.progress-bar').css('width', qProgress + '%').attr('aria-valuenow', qProgress);
            }
            function scoreCalc() {
                score = Math.round(50 * correct_count - 30 * incorrect_count - 20 * unanswered_count + 10 * tscore);
            }

            // var counter = 100.0;
        }
    });
});

