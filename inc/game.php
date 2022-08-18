<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/game.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
         
    </head>
    <body>
        <article>
            <div class="header">
                <div id="header"></div>
                <div id="head_cover"></div>
            </div>
            <footer>
                <div class="footer">
                        
                       <div class="question">
                           <div class="quest_content">
                                <span class="question" id="questSpan"></span>
                           </div>
                       </div>

                       <div class="ans" id="sectora"><div class="index"><span>A.</span></div><div class="text"><span id="ansA" class="content"></span></div></div>
                       <div class="ans" id="sectorb"><div class="index"><span>B.</span></div><div class="text"><span id="ansB" class="content"></span></div></div>
                       <div class="ans" id="sectorc"><div class="index"><span>C.</span></div><div class="text"><span id="ansC" class="content"></span></div></div>
                       <div class="ans" id="sectord"><div class="index"><span>D.</span></div><div class="text"><span id="ansD" class="content"></span></div></div>
                    <div id="transparent"></div>

                </div>
            </footer>
        </article>
        <aside>
            <div id="help">
                <div class="help">
                    <div id="fifty" class="buttons"></div>
                    <div id="hall" class="buttons"></div>
                    <div id="call" class="buttons"></div>
                </div>
            </div>
            <div id="add">
                <div id="countdown">
                    <video width="100%" height="100%" id = "video" >
                        <source src="../images/timer.mp4" type="video/mp4">
 
                    </video>
                </div>
                <div id="hall_help">
                    <div id="chart">
                        <div class="chart">
                            <div class="letters">A</div>
                            <div  id="chartA" class="bar"></div> 
                        </div>
                        <div class="chart">
                            <div class="letters">B</div>
                            <div id="chartB" class="bar"></div>
                        </div>
                        <div class="chart">
                            <div class="letters">C</div>
                            <div id="chartC" class="bar"></div>

                        </div>
                        <div class="chart">
                            <div class="letters">D</div>
                            <div id="chartD" class="bar"></div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div id="money">
                <div id="money_content">
                  <ol reversed>
                    <li class="untouchable">5.000.000</li>  
                    <li>3.000.000</li>  
                    <li>1.000.000</li>  
                    <li>500.000</li>  
                    <li class="untouchable">250.000</li>  
                    <li>125.000</li>  
                    <li>64.000</li>  
                    <li>32.000</li>  
                    <li>16.000</li>  
                    <li class="untouchable">8.000</li>  
                    <li>4000</li>  
                    <li>2000</li>  
                    <li>1000</li>  
                    <li>500</li>  
                    
                  </ol>
                    
                </div>
            </div>
        </aside>
             
        <audio class="song" id="bgsound">
            <source src="../audio/beggining.mp3" type="audio/mpeg">
        </audio>
        <audio class="song" id="bgcorrect">
            <source src="../audio/correct.mp3" type="audio/mpeg">
        </audio>
        <audio class="song" id="bgwrong">
            <source src="../audio/wrong.mp3" type="audio/mpeg">
        </audio>
        <audio class="song" id="bgwin">
            <source src="../audio/win.mp3" type="audio/mpeg">
        </audio>
        <div id="avet_barseghyan"><img src="../images/avet.png"></div>
        <div id="looser"><img src="../images/loser.gif"></div>
        
      
    </body>


<script src="../js/main.js"></script> 
</html>