//picture editor

function editor() {
  document.getElementById("edit_img").style.display = "block";
}

var fiftyHelpButton = true;

var hallHelpButton = true;

var callHelpButton = true;

var liPlay = true;

var gameoverTimer;

var gifTimer;

var bg = document.getElementById("bgsound");

var correct = document.getElementById("bgcorrect");

var win = document.getElementById("bgwin");

var wrong = document.getElementById("bgwrong");

$("#header").on("click", begin);

var aClick = document.getElementById("sectora");

aClick.addEventListener("click", myFunction);

var bClick = document.getElementById("sectorb");

bClick.addEventListener("click", myFunction);

var cClick = document.getElementById("sectorc");

cClick.addEventListener("click", myFunction);

var dClick = document.getElementById("sectord");

dClick.addEventListener("click", myFunction);

document.getElementById("fifty").addEventListener("click", fiftyFunc);

document.getElementById("hall").addEventListener("click", hallFunc);

document.getElementById("call").addEventListener("click", callFunc);

function signinFunction() {
  if (document.getElementById("hidden_one").style.display == "none") {
    document.getElementById("regform_div").style.display = "block";

    document.getElementById("hidden_one").style.display = "block";

    document.getElementById("hidden_two").style.display = "none";
  } else {
    document.getElementById("hidden_one").style.display = "none";

    document.getElementById("regform_div").style.display = "none";
  }
}

function countdown() {
  var video = document.getElementById("video");

  $("#countdown").css("display", "block");

  clearTimeout(gifTimer);

  gifTimer = setTimeout(function () {
    $("#countdown").css("display", "none");
  }, 30000);

  video.currentTime = 0;

  video.play();
}

function regFunction() {
  if (document.getElementById("hidden_two").style.display == "none") {
    document.getElementById("hidden_two").style.display = "block";

    document.getElementById("regform_div").style.display = "block";

    document.getElementById("hidden_one").style.display = "none";
  } else {
    document.getElementById("hidden_two").style.display = "none";

    document.getElementById("regform_div").style.display = "none";
  }
}

//----------------------himnakan khakh-------------------

function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function generateArrayRandomNumber(min, max) {
  var totalNumbers = max - min + 1,
    arrayTotalNumbers = [],
    arrayRandomNumbers = [],
    tempRandomNumber;

  while (totalNumbers--) {
    arrayTotalNumbers.push(totalNumbers + min);
  }

  while (arrayTotalNumbers.length) {
    tempRandomNumber = Math.round(
      Math.random() * (arrayTotalNumbers.length - 1)
    );

    arrayRandomNumbers.push(arrayTotalNumbers[tempRandomNumber]);

    arrayTotalNumbers.splice(tempRandomNumber, 1);
  }

  return arrayRandomNumbers;
}

var indexes = Array(generateArrayRandomNumber(0, 3));

function gameover() {
  // video.pause();

  // bg.pause();

  //     wrong.load();

  // wrong.play();

  $("#transparent").css("display", "block");

  $(".content").each(function () {
    if ($(this).text() == questObj["answer"]["tru"][i]) {
      $(this).parent().parent().addClass("correctAns");

      setInterval(function () {
        $(".correctAns").css("background", "green");

        setTimeout(function () {
          $(".correctAns").css("background", "#000");
        }, 300);
      }, 600);
    }

    setTimeout(function () {
      $("body").html(
        "<div style='width:500px;margin:0 auto'><img src='../images/loser.gif' /><p style='text-align:center;padding-top:30px'><a href='game.php'><img src='../images/play-button.png' /></a></p></div>"
      );
    }, 3000);
  });
}
var questObj = {};
// new added code
$.ajax({
  type: "POST",
  url: "../js/process.php",
  data: { action: "test" },
  dataType: "JSON",
  success: function (response) {
    questObj = response;
  },
});

function begin() {
  $("#transparent").css("display", "block");

  setTimeout(game, 1000);

  document.getElementById("video").play();
}

var i = 0;

function game() {
  $("#header").css("display", "none");

  $("#head_cover").css("display", "block");

  clearTimeout(gameoverTimer);

  gameoverTimer = setTimeout(gameover, 30200);

  countdown();

  $("#transparent").css("display", "none");

  $(".text").removeClass("hidden");

  if (i > 4) {
    $(".help").css("display", "block");
  }

  if (callHelpButton == true && liPlay == true) {
    $("#money_content ol li")
      .eq(13 - i + 1)
      .removeClass("active");

    $("#money_content ol li")
      .eq(13 - i)
      .addClass("active");
  } else if (callHelpButton == false && liPlay == true) {
    $("#money_content ol li")
      .eq(13 - i + 2)
      .removeClass("active");

    $("#money_content ol li")
      .eq(13 - i + 1)
      .addClass("active");
  }

  // document.getElementById("bgsound").play();

  var questionList = [
    questObj["answer"]["tru"][i],
    questObj["answer"]["false"][i][0],
    questObj["answer"]["false"][i][1],
    questObj["answer"]["false"][i][2],
  ];

  var arrIndex = generateArrayRandomNumber(0, 3);

  var questarr = [];

  for (var j = 0; j <= 4; j++) {
    questarr.push(questionList[arrIndex[j]]);
  }

  var q = document.getElementById("questSpan");

  var a = document.getElementById("ansA");

  var b = document.getElementById("ansB");

  var c = document.getElementById("ansC");

  var d = document.getElementById("ansD");

  var bg = document.getElementById("bgsound");

  q.innerText = questObj["question"][i];

  a.innerText = questarr[0];

  b.innerText = questarr[1];

  c.innerText = questarr[2];

  d.innerText = questarr[3];

  a.style.color = "white";

  b.style.color = "white";

  c.style.color = "white";

  d.style.color = "white";

  document.getElementById("sectora").style.backgroundColor = "rgba(0,0,0,0)";
  document.getElementById("sectorb").style.backgroundColor = "rgba(0,0,0,0)";
  document.getElementById("sectorc").style.backgroundColor = "rgba(0,0,0,0)";
  document.getElementById("sectord").style.backgroundColor = "rgba(0,0,0,0)";

  bg.play();
}

//arr.le

function myFunction() {
  $("#transparent").css("display", "block");

  var answer = this.childNodes[1].childNodes[0].textContent;

  if (answer == questObj["answer"]["tru"][i]) {
    if (i < questObj.question.length - 1) {
      //                        alert("Այո, Ճիշտ պատասխան:");

      video.pause();

      clearTimeout(gameoverTimer);

      clearTimeout(gifTimer);

      bg.pause();

      correct.load();

      correct.play();

      this.style.backgroundColor = "#2DA326";

      this.childNodes[1].childNodes[0].style.color = "black";

      i++;

      liPlay = true;

      setTimeout(game, 4000);
    } else {
      //                         alert("Շնորհավորում ենք, Դուք հաղթեցիք:");

      this.style.backgroundColor = "#2DA326";

      this.childNodes[1].childNodes[0].style.color = "black";

      bg.pause();

      win.play();

      document.getElementById("avet_barseghyan").style.display = "block";
    }
  } else {
    //                         alert("Ոչ, ճիշտ պատասխանն է՝ " + questObj["answer"]["tru"][i] + " : Խաղն ավարտվեց:");

    //                         bg.pause();

    //                         wrong.load();

    //                        wrong.play();

    gameover();

    this.style.backgroundColor = "red";

    this.childNodes[1].childNodes[0].style.color = "black";

    //                        document.getElementById("looser").style.display="block";
  }
}

function fiftyFunc() {
  if (fiftyHelpButton == true) {
    var arrayChooseOne = [0, 3];

    var arrayChooseTwo = [1, 2];

    var q = getRandomInt(0, 1);

    var w = getRandomInt(0, 1);

    var aaa = arrayChooseOne[q];

    var bbb = arrayChooseTwo[w];

    if (
      q == 0 &&
      document.getElementsByClassName("ans")[aaa].childNodes[1].childNodes[0]
        .textContent == questObj["answer"]["tru"][i]
    ) {
      var aaa = arrayChooseOne[1];
    }

    if (
      q == 1 &&
      document.getElementsByClassName("ans")[aaa].childNodes[1].childNodes[0]
        .textContent == questObj["answer"]["tru"][i]
    ) {
      var aaa = arrayChooseOne[0];
    }

    if (
      w == 0 &&
      document.getElementsByClassName("ans")[bbb].childNodes[1].childNodes[0]
        .textContent == questObj["answer"]["tru"][i]
    ) {
      var bbb = arrayChooseTwo[1];
    }

    if (
      w == 1 &&
      document.getElementsByClassName("ans")[bbb].childNodes[1].childNodes[0]
        .textContent == questObj["answer"]["tru"][i]
    ) {
      var bbb = arrayChooseTwo[0];
    }

    fiftyHelpButton = false;

    document.getElementsByClassName("text")[aaa].className += " hidden";

    document.getElementsByClassName("text")[bbb].className += " hidden";

    document.getElementById("fifty").style.background =
      "url(../images/fiftyx.png)";

    document.getElementById("fifty").style.backgroundSize = "100% 100%";
  }
}

function hallFunc() {
  if (hallHelpButton == true) {
    $("#countdown").css("display", "none");

    $("#hall_help").css("display", "block");

    $(function () {
      setTimeout(function () {
        $("#hall_help").css("display", "none");

        $("#countdown").css("display", "block");
      }, 7000);
    });
  }

  var indexOfTrue;

  var percentArray = [];

  var falseArray = [];

  var aPercent = getRandomInt(40, 80);

  var bPercent = getRandomInt(1, 10);

  percentArray.push(bPercent);

  var x = Math.floor((100 - aPercent - bPercent) / 2);

  var y = getRandomInt(0, x);

  var cPercent = x - y;

  percentArray.push(cPercent);

  var dPercent = 100 - aPercent - bPercent - cPercent;

  percentArray.push(dPercent);

  for (var v = 0; v < 4; v++) {
    if ($(".content").eq(v).text() == questObj["answer"]["tru"][i]) {
      indexOfTrue = v;

      break;
    }
  }

  $(".bar")
    .eq(indexOfTrue)
    .css("height", aPercent + "%");

  $(".bar")
    .eq(indexOfTrue)
    .html(aPercent + "%");

  for (u = 0; u < 4; u++) {
    if (u != indexOfTrue) {
      falseArray.push(u);
    }
  }

  for (var p = 0; p < 3; p++) {
    $(".bar")
      .eq(falseArray[p])
      .css("height", percentArray[p] + "%");

    $(".bar")
      .eq(falseArray[p])
      .html(percentArray[p] + "%");
  }

  //    $("#chartB").css("height",bPercent +"%");

  //    $("#chartC").css("height",cPercent +"%");

  //    $("#chartD").css("height",dPercent +"%");

  //    $("#chartB").html(bPercent +"%");

  //    $("#chartC").html(cPercent +"%");

  //    $("#chartD").html(dPercent +"%");

  hallHelpButton = false;

  document.getElementById("hall").style.background = "url(../images/hallx.png)";

  document.getElementById("hall").style.backgroundSize = "100% 100%";
}

function callFunc() {
  if (callHelpButton == true) {
    callHelpButton = false;

    liPlay = false;
    questObj.question.shift();
    ++i;

    game();

    document.getElementById("call").style.background =
      "url(../images/chancex.png)";

    document.getElementById("call").style.backgroundSize = "100% 100%";
  }
}
