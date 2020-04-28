
<?php include 'loggedin.php';?>


<?php 

	session_start();
	if (isset($_SESSION['username'])){
		echo "Welcome Back, ".$_SESSION['username'] ; 
	}
?> 


<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="game_screen.css">
    <title>Gemstones</title>
  </head>
  <body>
    <h1 class="page-title">Gemstones Card Game</h1>
    <div id ="jnk1">
      <span id ="pnts">Points: <label id="points-num">0</label></span>
      <span id="tm">Time | <label id = "total-time"><label id="mins">00</label>:<label id="secs">00</label></span></label>
      <script>
        var minsL = document.getElementById("mins");
        var secsL = document.getElementById("secs");
        var pointsL = document.getElementById("points-num");
        var totalTimeL = document.getElementById("total-time");
        var points = 0;
        var totalsecs = 0;
        var totalmins = 0; 
        setInterval(timer, 1000);
        
        function convert(times){
            var string = times + "";
            if(string.length < 2) {
              return "0" + string;
            }
            else {
              return string;
            }   
        }

        function timer(){
          ++totalsecs;
          secsL.innerHTML = convert(totalsecs%60);
            
          if (totalsecs == 59) {
            ++totalmins; 
            minsL.innerHTML =convert(totalmins%60);
          }
        }
      </script>
    </div>
    <br>
    <div class="game-container">
      <div class="flip-card">
        <div class="flip-card-inner green">
          <div class="flip-card-front">
          </div>

          <div class="flip-card-back flip-green">
             
          </div>
        </div>
      </div>

      <div class="flip-card">
        <div class="flip-card-inner green">
          <div class="flip-card-front">
          </div>

          <div class="flip-card-back flip-green">
            
          </div>
        </div>
      </div>

      <div class="flip-card">
        <div class="flip-card-inner pink">
          <div class="flip-card-front">
          </div>

          <div class="flip-card-back flip-pink">
            
          </div>
        </div>
      </div>

      <div class="flip-card">
        <div class="flip-card-inner blue">
          <div class="flip-card-front">
          </div>

          <div class="flip-card-back flip-blue">
            
          </div>
        </div>
      </div>

      <div class="flip-card">
        <div class="flip-card-inner pink">
          <div class="flip-card-front">
          </div>

          <div class="flip-card-back flip-pink">
             
          </div>
        </div>
      </div>

      <div class="flip-card">
        <div class="flip-card-inner blue">
          <div class="flip-card-front">
          </div>

          <div class="flip-card-back flip-blue">
            
          </div>
        </div>
      </div>

      <div class="flip-card">
        <div class="flip-card-inner green">
          <div class="flip-card-front">
          </div>

          <div class="flip-card-back flip-green">
            
          </div>
        </div>
      </div>

      <div class="flip-card">
        <div class="flip-card-inner green">
          <div class="flip-card-front">
          </div>

          <div class="flip-card-back flip-green">
            
          </div>
        </div>
      </div>
    </div>
    <div id="tempLink"><a href="score_page.html">To Score</a></div>

    <script type="text/javascript">
      // setup card toggle and scoring logic
      var current_card = null;
      var seconds_since_card_select = 0;

      function flipCard(card) {
        console.log("flip");

        card.classList.toggle('flipped');
        if (card.classList.contains("flipped")) {
          if (current_card != null) {
            var match = false;
            var card_type = "";
            // check not the same card
            if (current_card == card) {
              current_card = null;
              return;
            } else {
              // check equality of card type
              if (card.classList.contains("blue")) {
                if (current_card.classList.contains("blue")) {
                  match = true;
                  card_type = "blue";
                }
              }
              if (card.classList.contains("green")) {
                if (current_card.classList.contains("green")) {
                  match = true;
                  card_type = "green";
                }
              }
              if (card.classList.contains("pink")) {
                if (current_card.classList.contains("pink")) {
                  match = true;
                  card_type = "pink";
                }
              }
            }

            if (match) {
              // calculate points
              var divisor = Math.floor(seconds_since_card_select);
              if (divisor < 1) {
                divisor = 1;
              }
              var new_points = (100 * 1/divisor) - (totalsecs - seconds_since_card_select);

              if (new_points < 0) {
                new_points = 0;
              }

              points = points + new_points;
              pointsL.innerHTML = Math.floor(points);

              // toggle classes 
              card.classList.toggle(card_type);
              current_card.classList.toggle(card_type);
              card.style.display = "none";
              current_card.style.display = "none";

              current_card = null;

              all_cards_matched = true;
              for (i = 0; i < cards.length; i++) {
                var check_card = cards[i];
                if (!check_card.classList.contains("flipped")) {
                  all_cards_matched = false;
                }
              }
              if (all_cards_matched) {
                // do POST request to .php page for database to receive latest game score and time played
                var end_grade = "F";
                if (points > 250) {
                  end_grade = "S+";
                } else if (points > 225) {
                  end_grade = "S";
                } else if (points > 200) {
                  end_grade = "A+";
                } else if (points > 150) {
                  end_grade = "A";
                } else if (points > 100) {
                  end_grade = "B";
                } else if (points > 75) {
                  end_grade = "C";
                }
                var new_url_loc = 'score_page.html?s='+ (Math.floor(points)).toString() + '&g=' + end_grade + '&t=' + totalTimeL.textContent;
                console.log(new_url_loc);
                window.location = new_url_loc;
                // send the play6er to the Score page automatically after timer.
              }
            } else {
              current_card.classList.toggle("flipped");
              card.classList.toggle("flipped");
              current_card = null;
            }
          } else {
            // set current_card to selected card
            current_card = card;
            // set timestamp of select
            seconds_since_card_select = totalsecs;
          }
        }
        
      }

      function flipCardDelegate(card) {
        return function() {
          flipCard(card);
        }
      }

      // setup cards with flip toggle
      var cards = document.getElementsByClassName("flip-card-inner");
      var i;
      for (i = 0; i < cards.length; i++) {
        console.log(i);
        var card = cards[i];
        card.addEventListener('click', flipCardDelegate(card), false);
      }
    </script>
  </body>
</html>
