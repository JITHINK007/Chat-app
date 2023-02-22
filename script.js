const form= document.getElementById('form');

form.addEventListener('mousemove',(e)=>{

    const x = (window.innerWidth / 2 - e.pageX) / 12;
    const y = (window.innerHeight / 2 - e.pageY) / 12;

    form.style.transform = 'rotateX(' + x + 'deg) rotateY(' + y  + 'deg)';
});

form.addEventListener('mouseleave',function(){
    form.style.transform = 'rotateX(0deg) rotateY(0deg)';

});


const input = document.getElementById('input');

document.addEventListener('click',e=>{
    document.getElementById('error').style.display= 'none';
});