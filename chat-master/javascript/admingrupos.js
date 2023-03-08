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

// MOSTRAR USUARIOS QUE PERTENECEN A EL GRUPO

var queryString = window.location.search;
var urlParams = new URLSearchParams(queryString);
var idgrupo = urlParams.get('idg');


  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/admingrupos.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          usersListGroup.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("id_grupo=" + idgrupo);
  

  function admin(idgrupo){
        obj = [{ "idgrupo": `${idgrupo}`, "actualizartipo": true }];
        console.log(obj)
        dbParam = JSON.stringify(obj);
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "php/admingrupos.php", true);
      xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
              let data = xhr.response;
              usersListGroup.innerHTML = data;
            }
        }
      }
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("x=" + dbParam);
  }


  

    var arrayborrar=[];
    var arrayagregar=[];

function myfuncion(id){

    alert(id);
    let pos = arrayagregar.indexOf(id);
    if(arrayagregar[pos]==id){
        console.log(arrayagregar); 
    }else{
        arrayagregar.push(id);
        console.log(arrayagregar); 
        document.getElementById(id).remove();

        obj = [{ "id_user_group": `${id}`, "estado": false }];
        console.log(obj)
        dbParam = JSON.stringify(obj);
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "php/busquedauser.php", true);
      xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            usersListGroup.innerHTML = usersListGroup.innerHTML + data;
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("x=" + dbParam);
    }

}


    function borraruser(id){
      let pos = 0;
      alert(id);
      pos = arrayborrar.indexOf(id);
      if(arrayborrar[pos]!=id){
        arrayborrar.push(id);
        document.getElementById(id).remove();
        console.log(arrayborrar);
        obj = [{ "id_user_group": `${id}`, "estado": true }];
        console.log(obj)
        dbParam = JSON.stringify(obj);
  
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/busquedauser.php", true);
        xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            usersList.innerHTML = usersList.innerHTML + data;
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("x=" + dbParam);
      }else{
        console.log(array); 
      }
      
    }
    const creargrupobar = document.getElementById("#nombre");
    botonguardar = document.querySelector('.btn-borde');

    if(creargrupobar != ""){
      searchBar.classList.add("active");
    }else{
      searchBar.classList.remove("active");
    }

    $(document).ready(function(){
      $("#crear").submit(function(event){
        event.preventDefault();
        
        $.ajax({
            dataType:"json",
            url:"php/grupos-guardar.php",
            type:"POST",
            data:{nombre:$("#nombre").val(), borrar: JSON.stringify(arrayborrar), agregar: JSON.stringify(arrayagregar),  idgrupo: idgrupo, actualizar:true},
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

  


