$(".messages").animate({ scrollTop: $(document).height() }, "fast");

$("#profile-img").click(function() {
    $("#status-options").toggleClass("active");
});

$(".expand-button").click(function() {
    $("#profile").toggleClass("expanded");
    $("#contacts").toggleClass("expanded");
});

$("#status-options ul li").click(function() {
    $("#profile-img").removeClass();
    $("#status-online").removeClass("active");
    $("#status-away").removeClass("active");
    $("#status-busy").removeClass("active");
    $("#status-offline").removeClass("active");
    $(this).addClass("active");

    if ($("#status-online").hasClass("active")) {
        $("#profile-img").addClass("online");
    } else if ($("#status-away").hasClass("active")) {
        $("#profile-img").addClass("away");
    } else if ($("#status-busy").hasClass("active")) {
        $("#profile-img").addClass("busy");
    } else if ($("#status-offline").hasClass("active")) {
        $("#profile-img").addClass("offline");
    } else {
        $("#profile-img").removeClass();
    };

    $("#status-options").removeClass("active");
});


// history back
function goBack() {
    window.history.back();
}

function refresher(seller_email) {
    setInterval(refresh_recent_area_f, 500);
    setInterval(refresh_msg_area_f(seller_email), 100);
    setInterval(function() { refresh_msg_area_f(seller_email); }, 100);
}


function refresh_recent_area_f() {

    var rcv = document.getElementById("rcv");
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            rcv.innerHTML = t;
            // alert(t);
        }
    }

    r.open("POST", "refresh_recent_area.php", true);
    r.send();

}

// seller_email
function sse(seller_email) {
    window.location = "message.php?seller_email=" + seller_email;
}

// refresh_msg_area_function
function refresh_msg_area_f(seller_email) {
    var chat_area = document.getElementById("chat_area");
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            chat_area.innerHTML = t;
        }
    }
    r.open("GET", "message_area.php?e=" + seller_email, true);
    r.send();
}

// sendmessage

function sendmessage(seller_email) {
    var email = seller_email;
    var msgtxt = document.getElementById("msgtxt").value;

    var f = new FormData();
    f.append("e", email);
    f.append("t", msgtxt);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == 0) {

                Snackbar.show({
                    pos: 'top-right',
                    text: "Please enter a message",
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'
                });

            } else if (t == 1) {

                // alert("Message Sent Successfully");
                document.getElementById("msgtxt").value = "";
                var scroll1 = document.getElementById("message_box");
                scroll1.scrollTop = scroll1.scrollHeight;

            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "msg_send_process.php", true);
    r.send(f);

}