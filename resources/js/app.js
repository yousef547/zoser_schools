require('./bootstrap');

window.Echo.channel("not-msg")
.listen("MassageEvent",(e)=>{
    alert(e.massage);
})