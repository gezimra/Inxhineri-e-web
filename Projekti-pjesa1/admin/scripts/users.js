function addUser(){
var xmlhttp = new XMLHttpRequest();   // new HttpRequest instance 
xmlhttp.open("POST", "/json-handler");
xmlhttp.setRequestHeader("Content-Type", "application/json");
xmlhttp.send(JSON.stringify({name:"John Rambo", time:"2pm"}));
}