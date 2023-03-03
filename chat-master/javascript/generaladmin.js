

function agregar(){

areatabla=document.getElementById('tablausers');
gnombre=document.getElementById('nombrearea').value;

console.log(gnombre);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/guardar_config.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            areatabla.innerHTML = data;
            document.getElementById('nombrearea').value='';
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("nombre="+gnombre);
  }

function borrararea(id){
    areatabla=document.getElementById('tablausers');
    
    console.log(id);
    
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
        xhr.send("id="+id);
}

function agregargrupos(){
    areatabla=document.getElementById('tablausers2');
    gnombre=document.getElementById('nombregrupo').value;

    console.log(gnombre);

    obj = [{ "nombre": `${gnombre}`, "estado": 0 }];
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

    obj = [{ "id_grupo": `${id}`, "estado": 1 }];
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
