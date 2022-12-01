window.addEventListener("load", () => {
    function sendData() {
      const XHR = new XMLHttpRequest();
  
      // Bind the FormData object and the form element
      const FD = new FormData(form);
    
      // Define what happens on successful data submission
      XHR.addEventListener("load", (event) => {
        alert(event.target.responseText);
      });
  
      // Define what happens in case of error
      XHR.addEventListener("error", (event) => {
        alert('Oops! Something went wrong.');
      });
  
      // Set up our request
      XHR.open("POST", "http://localhost:8080/Registro/v1/registrar");
      XHR.setRequestHeader("Content-Type", "application/json");
      
      var object = {};
    FD.forEach(function(value, key){
    object[key] = value;
    });
    
    var json = JSON.stringify(object);

    var password1 = document.getElementById("input_pass").value;
    var password2 = document.getElementById("input_pass2").value;

    if (password1 == password2) {

    
      // The data sent is what the user provided in the form
      
      XHR.send(json);
    }
    else{
        alert ("Contraseñas no coinciden")
    }
    }
  
    // Get the form element
    const form = document.getElementById("myForm");
  
    // Add 'submit' event handler
    form.addEventListener("submit", (event) => {
      event.preventDefault();
     
    //xhr.send(data);  
      sendData();
      
    });

  


  });