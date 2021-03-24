

/**RESERVATION FUNCTIONS */

var allSeats = document.querySelectorAll('.seat');
for (var i = 0; i < allSeats.length; i++) {
    var seat = allSeats[i]
    seat.addEventListener('click', function () {
        var bgclr = this.style.backgroundColor;
        if(bgclr =='red')
            this.style.backgroundColor = 'white'
        else if (bgclr == 'gray')
            this.style.backgroundColor = 'gray'
        else
            this.style.backgroundColor = 'red'
        debugger
    }, false);
}
//joke only
var seatbox = document.getElementById('seats');
document.getElementById("save").addEventListener('click', function() {
    var str = ''
    for (var i = 0; i < allSeats.length; i++) {
        seat = allSeats[i]
        if (seat.style.backgroundColor == 'red') {
            console.log('a seat was chosen')
            var x = seat.getAttribute('value')
            console.log(x)
            console.log(seat.getAttribute('class'))
            str += x + ' '
        }
    }
    seatbox.value = str
})

function change_color(seat_taken) {
    console.log(seat_taken);
    for (var i = 0; i < allSeats.length; i++) {
        seat = allSeats[i];
        var x = seat.getAttribute('value')
        /* console.log("x value: " + x);
        console.log("seat_taken value: " + seat_taken); */
        if (x == seat_taken) {
            seat.style.backgroundColor = 'gray'
        }
    }
}

function reload_page() {
    //location.reload();
    window.location.assign(document.URL);
}


function show_warning() {
    document.querySelector(".popup.warning").style.display = "block";
    console.log('js found');
}