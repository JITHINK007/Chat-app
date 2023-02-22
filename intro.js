let stars=document.getElementById('stars');
let moon=document.getElementById('moon');
let mountains_behind=document.getElementById('mountains_behind');
let moutains_front=document.getElementById('mountains_front');
let text=document.getElementById('text');
let btn=document.getElementById('btn');
const toggleMenu=document.querySelector('.toggle');
const navigation=document.querySelector('.navigation');

window.addEventListener('scroll',function(){
	let value=window.scrollY;
	stars.style.left=value*0.25+'px';
	moon.style.top=value*1.05+'px';
	mountains_behind.style.top=value*0.5+'px';
	moutains_front.style.top=value*0+'px';
	text.style.marginRight=value*4+'px';
	text.style.marginTop=value*1.5+'px';
	btn.style.marginTop=value*1.5+'px';
	header.style=value*0.5+'px';
	text1.style.marginLeft=value*4+'px';
})
toggleMenu.onclick=function()
{
	toggleMenu.classList.toggle('active');
	navigation.classList.toggle('active');
}
