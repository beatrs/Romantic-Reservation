

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

function change_color(seat_taken, color) {
    console.log(seat_taken);
    for (var i = 0; i < allSeats.length; i++) {
        seat = allSeats[i];
        var x = seat.getAttribute('value')
        console.log("x value: " + x);
        console.log("seat_taken value: " + seat_taken); 
        if (x == seat_taken) {
            seat.style.backgroundColor = color
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

/** BUTTONS FOR RESERVATIONS */

//see available dates trigger book table
/* function show_btn_book() {
    document.getElementById("see").addEventListener("click", function() {
        document.getElementById("save").style.display = "block";
    }) 
} */



/** FORM CHANGE */

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

/** hide display */

function toggleDiv(id) {
    var x = document.getElementById(id);
    if (x.style.display == "block") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }
  } 

/** my account buttons */

function showVerifyPword() {
    document.querySelector(".popup.password").style.display = "block";
    console.log('verify block');
}

function showVerifyDel() {
    document.querySelector(".popup.delete").style.display = "block";
    console.log('verify block');
}

function showCancelConfirm(msg) {
    document.getElementById('cancel-confirm-msg').innerHTML = msg + ". Are you sure?";
    document.getElementById('cancel-confirm').style.display = "block";
    console.log('verify block');
}

document.getElementById("btn_close").addEventListener("click", function() {
    document.querySelector(".popup.password").style.display = "none";
    document.querySelector(".popup.delete").style.display = "none";
    console.log("x clicked")
})

document.getElementById("btn_close_del").addEventListener("click", function() {
    document.querySelector(".popup.delete").style.display = "none";
    console.log("x clicked")
})

function closeCancelConfirm() {
    document.getElementById('cancel-confirm').style.display = "none";
}
/** alert function */

function showAlert(id, err) {
    //var alert_box = document.querySelector(".alert-danger");
    var alert_box = document.getElementById(id);
    var msg = "<strong>Oh snap!</strong> " + err;
    alert_box.innerHTML = msg;
    alert_box.style.display = "block";
}

function showSuccess() {
    var alert_box = document.querySelector(".alert-success");
    //var alert_box = document.getElementById("#form-alert");
    alert_box.style.display = "block";
    console.log('js found');
}

/* function showSuccessMsg(id, msg) {
    //var alert_box = document.querySelector(".alert-danger");
    var alert_box = document.getElementById(id);
    alert_box.innerHTML = msg;
    alert_box.style.display = "block";
    //console.log(document.querySelector(".alert-danger").innerHTML)
    //console.log(document.querySelector(".alert-danger").style.display)
    console.log('js found');
} */

function showSuccessMsg(msg) {
    document.getElementById('sMsg').innerHTML = msg;
    document.getElementById('success-dialog').style.display = "block";
    console.log('verify block');
}

function closeSuccessMsg() {
    document.getElementById('success-dialog').style.display = "none"
    reload_page()
}


function showMsg() {
    //document.getElementById('sMsg').innerHTML = msg;
    document.getElementById('login-prompt').style.display = "block";
    console.log('show block');
}

function closeMsg() {
    document.getElementById('login-prompt').style.display = "none";
    window.location.href='my_acc.php'
    console.log('close block');
}

function showUpdateMsg() {
    //document.getElementById('sMsg').innerHTML = msg;
    document.getElementById('update-smsg').style.display = "block";
    console.log('show block');
}

function closeUpdateMsg() {
    document.getElementById('update-smsg').style.display = "none";
    reload_page();
    console.log('close block');
}


/** filter */

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    console.log(value)
    $("#allRes-table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

/** toggle password visibility */

function togglePword(id) {
    var x = document.getElementById(id);
    if (x.type === "password") {
    x.type = "text";
    } else {
    x.type = "password";
    }
    document.querySelector('#togglePassword').classList.toggle('fa-eye-slash')
}