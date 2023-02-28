
const form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
outcoming_id = form.querySelector(".outcoming_id").value,
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");
inputima = document.getElementById("file-input");

chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}




setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/allchats.php", true);
    obj=[{"incoming_id": `${incoming_id}`, "outcoming_id":`${outcoming_id}`}];
    console.log(obj);
    dbParam = JSON.stringify(obj);
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
    xhr.send("x=" + dbParam);
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }
  










  


