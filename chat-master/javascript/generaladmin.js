

function agregar(){

areatabla=document.getElementById('tablausers');
gnombre=document.getElementById('nombrearea').value;

console.log(gnombre);

    obj = [{ "nombre": `${gnombre}`, "estado": 0, borrar: false }];
        console.log(obj)
        dbParam = JSON.stringify(obj);
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "php/guardar_config.php", true);
      xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            document.getElementById('nombrearea').value='';
            areatabla.innerHTML = data;
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("x=" + dbParam);
  }

function borrararea(id){
    areatabla=document.getElementById('tablausers');
    
    console.log(id);
        
        obj = [{ "id": `${id}`, "estado": 0, borrar: true }];
        console.log(obj)
        dbParam = JSON.stringify(obj);
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "php/guardar_config.php", true);
      xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            areatabla.innerHTML = data;
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("x=" + dbParam);
}

//------------Grupos---------------

function agregargrupos(){
    areatabla=document.getElementById('tablausers2');
    gnombre=document.getElementById('nombregrupo').value;

    console.log(gnombre);

    obj = [{ "nombre": `${gnombre}`, "estado": 1, borrar: false }];
        console.log(obj)
        dbParam = JSON.stringify(obj);
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "php/guardar_config.php", true);
      xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            document.getElementById('nombregrupo').value='';
            areatabla.innerHTML = data;
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("x=" + dbParam);
}

function borrargrupos(id){
    areatabla=document.getElementById('tablausers2');

    console.log(areatabla);

    obj = [{ "id_grupo": `${id}`, "estado": 1, borrar: true }];
        console.log(obj)
        dbParam = JSON.stringify(obj);
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "php/guardar_config.php", true);
      xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            areatabla.innerHTML = data;
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("x=" + dbParam);
}

function cambtamaño(){
  msgtamaño=document.getElementById("msjtamaño");
  t_img=document.getElementById('tarchivo').value;

  console.log(t_img);

  obj = [{ "t_img": `${t_img}`, "estado": 2 }];
      console.log(obj)
      dbParam = JSON.stringify(obj);
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/guardar_config.php", true);
    xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          msgtamaño.innerHTML = data;
          console.log(data);
        }else{
          console.log(data);
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("x=" + dbParam);
}
