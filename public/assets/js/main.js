function btnAttendance(attendance){
    for(var i=0;i<$(attendance).length;i++) {
        $(attendance)[i].checked = true
    }

   
}

function showTime(key) {
    $('.radio-lists'+key).removeClass('d-none');
}
function hideTime(key) {
    $('.radio-lists'+key).addClass('d-none');
}

function showTimeB() {
    $('.all').removeClass('d-none');
}
function hideTimeB() {
    $('.all').addClass('d-none');
}