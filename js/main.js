

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

function book_table() {
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
}
/* document.getElementById("save").addEventListener('click', function() {
    //var str = seatbox.value + ' '
    
}) */

/* document.getElementById("see").addEventListener('click', function() {
    
    var see_date = document.getElementById('date').value;
    var see_time = document.getElementById('time').value;
    seatbox.value = see_date + ' ' + see_time
}) */

function change_color(seat_taken) {
    console.log(seat_taken);
    for (var i = 0; i < allSeats.length; i++) {
        seat = allSeats[i];
        var x = seat.getAttribute('value')
        console.log("x value: " + x);
        console.log("seat_taken value: " + seat_taken); 
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

/** get last input after refresh */

/* document.getElementById("txt_1").value = getSavedValue("txt_1");    // set the value to this input
document.getElementById("txt_2").value = getSavedValue("txt_2");   // set the value to this input
/* Here you can add more inputs to set value. if it's saved */
/*
//Save the value function - save it to localStorage as (ID, VALUE)
function saveValue(e){
    var id = e.id;  // get the sender's id to save it . 
    var val = e.value; // get the value. 
    localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override . 
}

//get the saved value function - return the value of "v" from localStorage. 
function getSavedValue  (v){
    if (!localStorage.getItem(v)) {
        return "";// You can change this to your defualt value. 
    }
    return localStorage.getItem(v);
} */

/** BUTTONS FOR RESERVATIONS */

//see available dates trigger book table
/* function show_btn_book() {
    document.getElementById("see").addEventListener("click", function() {
        document.getElementById("save").style.display = "block";
    }) 
} */



/** FORM CHANGE */

/* var form = document.getElementById("see-tables");

form.addEventListener("input", function () {
    console.log("Form has changed!");
    document.getElementById("save").style.display = "none";
});

$("#date").changedTouches({
    onSelect: function(dateText) {
        document.getElementById("save").style.display = "none";
    }
}); */

$('#date').change(function() {
    var date = $(this).val();
    console.log(date, 'change')
    document.getElementById("save").style.display = "none";
});

$('#time').change(function() {
    //var date = $(this).val();
    //console.log(date, 'change')
    document.getElementById("save").style.display = "none";
});