
window.addEventListener('load',function(){
    var boton=document.getElementById("carga");
    var boton1=document.getElementById("letras");
    var boton2=document.getElementsByClassName('container');

    function intervalo(){
        var tiempo=setInterval(function(){
            boton.style.display='none';
            boton1.style.display='none';
        
            boton2[0].style.display='block';
            
            clearInterval(devuelve);        
        },2000);
        
        return tiempo;
      }
      var devuelve= intervalo();   
    

});