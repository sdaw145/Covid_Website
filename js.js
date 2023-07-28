function search_links(){
  let input = document.getElementById('searchBox').value
  input= input.toLowerCase();
  let x = document.getElementsByClassName('searchLinks');

  for (i = 0; i < x.length; i++) { 
    if (!x[i].innerHTML.toLowerCase().includes(input)) {
       x[i].style.display="none";
       
    }
    else {
      x[i].style.display="list-item";
                     
    }
}
}




function contactInfo() {
  alert("Our help team can be contacted on 08001234567. Their hours of operation are Monday to Friday 9am-5pm");
}

// function to calculate the result of the survey
function tabulateAnswers() {
  // Three levels of testing depending on outcome of survey
  var c1score = 0; //pcr and lateral flow 
  var c2score = 0; //just lateral flow
  var c3score = 0; // no testing
  
  // get a list of the radio inputs on the page
  var choices = document.getElementsByTagName('input');
  // loop through all the radio inputs
  for (i=0; i<choices.length; i++) {
    // if the radio is checked..
    if (choices[i].checked) {
      // add 1 to that testing level score
      if (choices[i].value == 'c1') {
        c1score = c1score + 1;
      }
      if (choices[i].value == 'c2') {
        c2score = c2score + 1;
      }
      if (choices[i].value == 'c3') {
        c3score = c3score + 1;
      }
      // more levels could be added below
    }
  }
  
  // Find out which testing level(s) have the highest score.
  var maxscore = Math.max(c1score,c2score,c3score);

  // Display answer corresponding to that choice
  
  if (c1score == maxscore) { // If user chooses the first testing level the most, this outcome will be displayed.
    alert("You are eligible for both PCR and Lateral Flow Tesing");
  }
  if (c2score == maxscore) { // If user chooses the second testing level the most, this outcome will be displayed.
    alert("You are eligible for Lateral flow testing but not PCR testing at this time");
  }
  if (c3score == maxscore) { // If user chooses the third testing level the most, this outcome will be displayed.
    alert("You are not eligbile for testing at this time");
  }

  if (c1score & c2score == maxscore) { // If user chooses the first and second testing level the most, this outcome will be displayed.
    alert("You are eligible for both PCR and Lateral Flow Tesing");
  }

  if (c2score & c3score == maxscore) { // If user chooses the second testing level the most, this outcome will be displayed.
      alert("You are eligible for Lateral flow testing but not PCR testing at this time");
  }

  if (c1score & c3score == maxscore) { // If user chooses the first and third testing level the most, this outcome will be displayed.
    alert("You are eligible for Lateral flow testing but not PCR testing at this time");
}




}

// program the reset button


