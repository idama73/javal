//variables 
var selectedWord="";
var selectedHint="";
var board=[];
var remainingGuesses=6;
//var words=["snake", "monkey", "bettle"];
//Creating an array if avaliable letters
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H',
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P',
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

var words=[{ word: "snake", hint: "It's a reptile"},
        {word:"monkey", hint:"It's a mammal"},
        {word:"bettle", hint:"It's an insect"}];
        
//Listener
window.onload = startGame();

$(".letter").click(function(){
    //console.log($(this).attr("id"));
    checkLetter($(this).attr("id"));
    disableButtons($(this));
});


$(".replayBtn").click(function(){
   location.reload(); 
});

$("#letterBtn").click(function(){
    //var boxVal = $("#letterBox").val();
    //console.log("The value in the box " + boxVal);
    alert($("#letterBox").val())
});

//initBoard();

//console.log(selectedWord);

//Functions
function startGame(){
    createLetters();
    pickword();
    initBoard();
    updateBoard();
}

function initBoard(){
    for(var letter in selectedWord){
        board.push("_");
    }
}

function updateBoard(){
    $("#word").empty();
    
    for(var i=0; i < board.length;i++){
        $("#word").append(board[i] + " ");
    }
    
    $("#hint").click(function(){
        
        $("#word").append("<br />");
        $("#word").append("<span class='hint'> Hint: " + selectedHint + "</span>"); 
        remainingGuesses -= 1;
        updateMan();
        $('#hint').hide();
    });
    
    // for(var letter of board){
    //     document.getElementById("word").innerHTML+=letter+" ";
    // }
}

function pickword(){
    var randomint = Math.floor(Math.random() * words.length);
    selectedWord = words[randomint].word.toUpperCase();
    selectedHint = words[randomint].hint;
}


//Create the letters inside the letters div
function createLetters(){
    for(var letter of alphabet){
        $("#letters").append("<button class='letter' id=" + letter + ">" + letter + "</button>");
    }
}

function checkLetter(letter){
    var position = new Array();
    
    for(var i = 0; i < selectedWord.length;i++){
        if(letter == selectedWord[i]){
            position.push(i);
        }
    }
    
    if(position.length > 0){
        updateWord(position, letter);
        if(!board.includes('_')){
            endGame(true);
        }
    }
    
    else
        {
            remainingGuesses -= 1;
            updateMan();
        }
        if(remainingGuesses <= 0)
        {
            endGame(false);
        }
}

function updateWord(positions, letter){
    for(var pos of positions){
        board[pos] = letter;
    }
    updateBoard();
}

function updateMan(){
     $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}

function disableButtons(btn){
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger");
}

function endGame(win){
    $("#letters").hide();
    
    if(win){
        $('#won').show();
    }
    else{
        $('#lost').show();
    }
}