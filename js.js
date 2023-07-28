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

/*function search_links() {
  const inputValue = document.getElementById('searchBox').value.toLowerCase();
  [...document.getElementsByClassName('searchLinks')].forEach((searchLink) => {
      const matched = inputValue && searchLink.innerHTML.toLowerCase().includes(inputValue);
      searchLink.style.display = matched ? 'list-item' : 'none';
  });
}*/


function contactInfo() {
  alert("Our help team can be contacted on 08001234567. Their hours of operation are Monday to Friday 9am-5pm");
}

function checkAge() {
  let x = userinput
  if( x >= 60 || x <= 18)
  return(1)
}

function emergencyWorker(){
  let y = userinput 
  if( y = "Army")
  return(1);
  if(y = "NHS")
  return(2);
  if(y="Essential")
  return(3);
  if(y= "Police")
  return(4);
  if(y= "None")
  return(0);
}

function vunGroup{
  let z = userinput
  if(z = 1)
  return(1);
}

function eligbiltiyResult{
  
}
