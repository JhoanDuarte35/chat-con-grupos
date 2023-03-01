const form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector(".button"),
chatBox = document.querySelector(".chat-box");
inputima = document.getElementById("file-input");

form.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

sendBtn.onclick = ()=>{
    inputField.disabled = false;
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              inputField.value = "";
              document.getElementById('file-input').value ='';
              document.getElementById('add_labels').innerHTML="";
              scrollToBottom();
          }
      }
    }
    let formData = new FormData(form);
    console.log(formData);
    xhr.send(formData);
}
chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active")){
                scrollToBottom();
              }
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }
  
document.getElementById("inputima").addEventListener('click', function() {
    document.getElementById("file-input").click();
});

document.getElementById("file-input").addEventListener('change', function() {
    let pos = this.files.length - 1;
    inputField.disabled = true;
    inputField.value = "";
    document.getElementById('add_labels').innerHTML="";
    document.getElementById("add_labels").innerHTML += `<div class="details">${this.files[pos].name} 
    <button onclick="limpiar()">x</button></div>`;
    sendBtn.classList.add("active");
});

function limpiar(){
    console.log("limpiar");
    sendBtn.classList.remove("active");
    document.getElementById('file-input').value ='';
    document.getElementById('add_labels').innerHTML="";
}

var participantes = [];

function adduser(){
    user=document.querySelector("#participantes").value;
    participantes.push(user);
    console.log(participantes);
    user=user+user;
    //document.querySelector("#user-list").value=participantes;      
          $.ajax({
              dataType:"json",
              url:"php/get-names.php",
              type:"POST",
              data:{users: JSON.stringify(participantes)},
              success: function(data){
                  if(data.success==false){
                    console.log(data);
                      $("#mensaje").show();
                      $("#mensaje").html(data.msg);
                      $('.log-status').addClass('wrong-entry');
                      $('.alert').fadeIn(700);
                  setTimeout( "$('.alert').fadeOut(1800);",1500 );
                  }else{
                    document.querySelector("#user-list").value=data;
                    console.log(data);
                  }
              },
                  error: function(response) {
                      $("#mensaje").show();
                      $("#mensaje").html(response.responseText);
                  }
          });
      };



