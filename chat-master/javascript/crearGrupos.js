const searchBar = document.querySelector(".search input"),
searchIcon = document.querySelector(".search button"),
usersList = document.querySelector(".users-list"),
usersListGroup = document.querySelector(".users-list-group"),
buttonadd=document.querySelector(".btn btn-outline-success");

searchIcon.onclick = ()=>{
  searchBar.classList.toggle("show");
  searchIcon.classList.toggle("active");
  searchBar.focus();
  if(searchBar.classList.contains("active")){
    searchBar.value = "";
    searchBar.classList.remove("active");
  }
}

searchBar.onkeyup = ()=>{
  let searchTerm = searchBar.value;
  if(searchTerm != ""){
    searchBar.classList.add("active");
  }else{
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/busquedauser.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          usersList.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
}



    var array=[];

function myfuncion(id){
    alert(id);
    let pos = array.indexOf(id);
    if(array[pos]==id){
        console.log(array); 
    }else{
        array.push(id);
        console.log(array); 
        document.getElementById(id).disabled = true;
    }

    let id_user_group = id;
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/busquedauser.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            usersListGroup.innerHTML = data;
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("id_user_group=" + id_user_group);
}


    function borraruser(id){
      alert(id);
      let pos = array.indexOf(id);
      array.splice(0, pos);
      console.log(array); 
    }

    $(document).ready(function(){
      $("#crear").submit(function(event){
        event.preventDefault();
        $.ajax({
            dataType:"json",
            url:"php/grupos-guardar.php",
            type:"POST",
            data:{nombre:$("#nombre").val(), array: JSON.stringify(array)},
            success: function(data){
                if(data.success==false){
                    $("#mensaje").show();
                    $("#mensaje").html(data.msg);
                    $('.log-status').addClass('wrong-entry');
                    $('.alert').fadeIn(700);
                setTimeout( "$('.alert').fadeOut(1800);",1500 );
                }else{
                    window.location=data.link;
                }
            },
                error: function(response) {
                    $("#mensaje").show();
                    $("#mensaje").html(response.responseText);
                }
        });
    });
    $('.form-control').keypress(function(){
        $('.log-status').removeClass('wrong-entry');
    });
  })



