function contact() {
    window.location = "contact.php";
}

function goToSell() {
    window.location = "add_product.php";
}

function adminsignin() {
    window.location = "adminSignin.php";
}

function goToSigninSignup() {
    window.location = "signinSignUp.php";
}

function account() {
    window.location = "account.php";
}

function goToProduct() {
    window.location = "product.php";
}

function searchAlert() {
    Snackbar.show({
        pos: 'bottom-right',
        text: "Search Your Favour In This Page..",
        actionTextColor: '#F35545',
        customClass: 'snack',

        secondButtonText: "hel"

    });
}

// preloader

// preloader

// preloader

$(document).ready(function() {
    setTimeout(function() {
        $('.wrapper').addClass('loaded');

    }, 2000);
});


jQuery(function() {

    $(window).load(function() {

        $('.wrapper').removeClass('preload');

    });

});

jQuery(document).ready(function($) {

    // jQuery sticky Menu

    $(".mainmenu-area").sticky({ topSpacing: 0 });


    $('.product-carousel').owlCarousel({
        loop: true,
        nav: true,
        margin: 20,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 5,
            }
        }
    });

    $('.related-products-carousel').owlCarousel({
        loop: true,
        nav: true,
        margin: 20,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    });

    $('.brand-list').owlCarousel({
        loop: true,
        nav: true,
        margin: 20,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 4,
            }
        }
    });


    // Bootstrap Mobile Menu fix
    $(".navbar-nav li a").click(function() {
        $(".navbar-collapse").removeClass('in');
    });

    // jQuery Scroll effect
    $('.navbar-nav li a, .scroll-to-up').bind('click', function(event) {
        var $anchor = $(this);
        var headerH = $('.header-area').outerHeight();
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - headerH + "px"
        }, 1200, 'easeInOutExpo');

        event.preventDefault();
    });

    // Bootstrap ScrollPSY
    $('body').scrollspy({
        target: '.navbar-collapse',
        offset: 95
    })
});

(function(i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

ga('create', 'UA-10146041-21', 'auto');
ga('send', 'pageview');

$(document).ready(function(e) {
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
        e.preventDefault();
        var param = $(this).attr("href").replace("#", "");
        var concept = $(this).text();
        $('.search-panel span#search_concept').text(concept);
        $('.input-group #search_param').val(param);
    });
});

// 00000000000000000000000000000000000000000
k;



/* sign up  */
function signUp() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");
    var seller = document.getElementById("register_as_seller").checked;


    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("mobile", mobile.value);
    form.append("gender", gender.value);
    form.append("seller", seller);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == 1) {

                Snackbar.show({
                    pos: 'top-right',
                    text: 'Successfully Registered Please Sign in',
                    actionTextColor: '#37FF09',
                    customClass: 'snack'
                });


                fname.value = "";
                lname.value = "";
                email.value = "";
                password.value = "";
                mobile.value = "";
                document.getElementById("register_as_seller").checked = false;
                document.getElementById("msg").innerHTML = "";

                // changeView();

            } else {
                // document.getElementById("msg").innerHTML = text;
                Snackbar.show({
                    pos: 'top-right',
                    text: text,
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'
                });
            }

        }
    };

    r.open("POST", "signUpProcess.php", true);
    r.send(form);
}

// seller alert
function seller_or_not() {
    if (document.getElementById("register_as_seller").checked == true) {
        Snackbar.show({
            pos: 'bottom-right',
            text: "Seller",
            actionTextColor: '#17D1EE',
            customClass: 'snack'
        });
    } else {
        Snackbar.show({
            pos: 'bottom-right',
            text: "Customer",
            actionTextColor: '#17D1EE',
            customClass: 'snack'
        });
    }
}

// sign in

function signIn() {
    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var remember = document.getElementById("remember");

    var formData = new FormData();
    formData.append("email", email.value);
    formData.append("password", password.value);
    formData.append("remember", remember.checked);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == 1) {
                window.location = "index.php";
            } else {
                Snackbar.show({
                    pos: 'top-right',
                    text: t,
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'
                });
            }
        }
    };
    r.open("POST", "signInProcess.php", true);
    r.send(formData);
}

// signin model
// sign in
function signInModel() {
    var email = document.getElementById("email3");
    var password = document.getElementById("password3");
    var remember = document.getElementById("remember3");

    var formData = new FormData();
    formData.append("email", email.value);
    formData.append("password", password.value);
    formData.append("remember", remember.checked);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == 1) {
                window.location = "index.php";
            } else if (t == 2) {
                Snackbar.show({
                    pos: 'top-right',
                    text: 'Sorry you are blocked',
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'
                });
            } else {
                Snackbar.show({
                    pos: 'top-right',
                    text: t,
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'
                });
            }
        }
    };
    r.open("POST", "signInProcess.php", true);
    r.send(formData);
}

// sign out
function signOut() {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == 555) {
                window.location = "index.php";
            }
        }
    };
    r.open("GET", "signout.php", true);
    r.send();
}

// forgot pwd
var bm;
var bs;

function forgotPassword() {

    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == 1) {

                Snackbar.show({
                    pos: 'top-right',
                    text: "Verification email sent. Please check your inbox.",
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'
                });

                // $('#forgetPasswordModal').modal({
                //     show: true
                // })


            } else {

                Snackbar.show({
                    pos: 'top-right',
                    text: text,
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'
                });

                // $('#forgetPasswordModal').on('shown.bs.modal', function() {
                //     $('#forgetPasswordModal').trigger('focus')
                // })

            }
        }
    };
    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();
}

// show pwd  signin signUp
function showPassword1() {
    var np = document.getElementById("np");
    var npb = document.getElementById("npb");

    if (npb.innerHTML == "Show") {
        np.type = "text";
        npb.innerHTML = "Hide"
    } else {
        np.type = "password";
        npb.innerHTML = "Show"
    }

}

function showPassword2() {
    var rnp = document.getElementById("rnp");
    var rnpb = document.getElementById("rnpb");

    if (rnpb.innerHTML == "Show") {
        rnp.type = "text";
        rnpb.innerHTML = "Hide"
    } else {
        rnp.type = "password";
        rnpb.innerHTML = "Show"
    }

}

// reset pwd
function resetPassword() {
    var e = document.getElementById("email2");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("vc");

    var form = new FormData();
    form.append("e", e.value);
    form.append("np", np.value);
    form.append("rnp", rnp.value);
    form.append("vc", vc.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text = "1") {

                // alert("Password Reset Successful");
                Snackbar.show({
                    pos: 'top-right',
                    text: "Password Reset Successful",
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'
                });

                $('#forgetPasswordModal').modal('hide');

            } else {
                Snackbar.show({
                    pos: 'top-right',
                    text: text,
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'
                });
            }
        }
    };
    r.open("POST", "resetPassword.php", true);
    r.send(form);
}





// main input eke type karaama product page ekta redirect weemata
function searchRedirect() {
    var sPath = window.location.pathname;
    var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
    if (sPage == "sellerProductView1.php") {

    } else if (sPage !== "product.php") {
        window.location = "product.php";
    }
}

// customer Product search
function productSearch(x) {

    var sPath = window.location.pathname;
    var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
    if (sPage == "sellerProductView1.php") {

    } else if (sPage !== "product.php") {
        window.location = "product.php";
    }


    var search = document.getElementById("s").value;
    var category = document.getElementById("category").value;
    var color = document.getElementById("color").value;
    var priceFrom = document.getElementById("from1").value;
    var priceTo = document.getElementById("to1").value;
    var page = x;

    // alert(category);

    var activetime;
    if (document.getElementById("n").checked) {
        activetime = 1;
    } else if (document.getElementById("o").checked) {
        activetime = 2;
    } else {
        activetime = 0;
    }

    var quantity;
    if (document.getElementById("l").checked) {
        quantity = 2;
    } else if (document.getElementById("h").checked) {
        quantity = 1;
    } else {
        quantity = 0;
    }

    var condition;
    if (document.getElementById("b").checked) {
        condition = 1;
    } else if (document.getElementById("u").checked) {
        condition = 2;
    } else {
        condition = 0;
    }

    var price;
    if (document.getElementById("pl").checked) {
        price = 1;
    } else if (document.getElementById("ph").checked) {
        price = 2;
    } else {
        price = 0;
    }


    // alert(activetime);
    // alert(quantity);
    // alert(condition);

    var form = new FormData();
    form.append("search", search);
    form.append("category", category);
    form.append("color", color);
    form.append("activetime", activetime);
    form.append("quantity", quantity);
    form.append("condition", condition);
    form.append("price", price);
    form.append("pf", priceFrom);
    form.append("pt", priceTo);
    form.append("page", page);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            // alert(text);
            if (text == 1) {
                // alert("Select at least One filter option");
                Snackbar.show({
                    pos: 'bottom-right',
                    text: "Select at least One filter option",
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'
                });
            } else if (text == 2) {
                alert("ko");
            } else {
                var filterproducts = document.getElementById("filterproducs");
                filterproducts.innerHTML = "";
                filterproducts.innerHTML = text;
                // document.getElementById("sp").style.display = "none";
            }
        }
    }
    r.open("POST", "productSearchProcess.php", true);
    r.send(form);


}

// contact form

function contactForm() {
    var name = document.getElementById("contactName").value;
    var email = document.getElementById("contactEmail").value;
    var subject = document.getElementById("contactSubject").value;
    var company = document.getElementById("contactCompany").value;
    var msg = document.getElementById("contactMessage").value;

    var f = new FormData();
    f.append("n", name);
    f.append("e", email);
    f.append("s", subject);
    f.append("c", company);
    f.append("m", msg);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == 1) {
                window.location = "contact.php";
            } else {
                Snackbar.show({
                    pos: 'bottom-right',
                    text: t,
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'
                });
            }
        }
    }
    r.open("POST", "contactProcess.php", true);
    r.send(f);
}

// clearFilters
function clearFilters() {
    document.getElementById("n").checked = false;
    document.getElementById("o").checked = false;
    document.getElementById("l").checked = false;
    document.getElementById("h").checked = false;
    document.getElementById("b").checked = false;
    document.getElementById("u").checked = false;
    document.getElementById("pl").checked = false;
    document.getElementById("ph").checked = false;
    var category = document.getElementById("category").value = "1";
    var color = document.getElementById("color").value = "0";
}

// clearRadioFilters
function clearRadioFilters() {
    document.getElementById("n").checked = false;
    document.getElementById("o").checked = false;
    document.getElementById("l").checked = false;
    document.getElementById("h").checked = false;
    document.getElementById("b").checked = false;
    document.getElementById("u").checked = false;
    document.getElementById("pl").checked = false;
    document.getElementById("ph").checked = false;
    document.getElementById("from1").value = 0;
    document.getElementById("to1").value = 300000;

}

// clear Other
function clearOther() {
    var category = document.getElementById("category").value = "1";
    var color = document.getElementById("color").value = "0";
}

// remove from wishlist
function deleteFromWatchlist(id) {
    var wid = id;

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var t = request.responseText;
            if (t == 1) {
                window.location = "wishlist.php";
            }

        }
    };
    request.open("GET", "removeWatchlistItemProcess.php?id=" + wid, true);
    request.send();
}



// add to wishlist

function addToWishList(id) {

    var pid = id;
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == 1) {


                Snackbar.show({
                    pos: 'bottom-right',
                    text: "Added To Wishlist",
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'
                });

            } else if (t == 5) {
                // alert("Please Sign in");
                window.location = "signinSignUp.php";
            } else {
                // alert(t);
                Snackbar.show({
                    pos: 'bottom-right',
                    text: t,
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'
                });

            }

        }
    };
    r.open("GET", "addToWatchlistProcess.php?id=" + pid, true);
    r.send();
}

// remove from cart
function deleteFromCart(id) {

    var cid = id;
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == 1) {
                window.location = "cart.php";
            }

        }
    }

    r.open("GET", "deleteFromCartProcess.php?id=" + cid, true);
    r.send();
}



// add product
function addToCart(id) {
    // alert("ok");
    var qtytxt = document.getElementById("qtytxt" + id).value;
    var pid = id;


    // alert(qtytxt);
    // alert(pid);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == 1) {
                // window.location = "cart.php";

                Snackbar.show({
                    pos: 'bottom-right',
                    text: "Product Added To Cart",
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'

                });

            } else if (t == 2) {

                window.location = "signinSignUp.php";

            } else {
                // alert(t);
                Snackbar.show({
                    pos: 'bottom-right',
                    text: t,
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'

                });
            }
        }
    };
    r.open("GET", "addToCartProcess.php?id=" + pid + "&txt=" + qtytxt, true);
    r.send();
}



// add to cat single product
function addToCartSignleProductView(id) {
    var qtytxt = document.getElementById("qtyinput" + id).value;
    var pid = id;

    // alert(qtytxt);
    // alert(pid);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == 1) {
                window.location = "cart.php";
            } else if (t == 2) {
                // alert("Please Sign in");
                window.location = "signinSignUp.php";
            } else {
                // alert(t);
                Snackbar.show({
                    pos: 'bottom-right',
                    text: t,
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'

                });
            }
        }
    };
    r.open("GET", "addToCartProcess.php?id=" + pid + "&txt=" + qtytxt, true);
    r.send();
}

// qty increase
function qty_inc(qty) {
    var input = document.getElementById("qtyinput");

    var pqty = qty;

    if (input.value < pqty) {
        var newValue = parseInt(input.value) + 1;
        input.value = newValue.toString();
    } else {
        // alert("Maximum quantity count has been achieved");
        Snackbar.show({
            pos: 'bottom-right',
            text: 'Maximum quantity count has been achieved',
            actionTextColor: '#17D1EE',
            customClass: 'snack'
        });
    }

}
/* Qty Decrease */

function qty_dec() {
    var input = document.getElementById("qtyinput");

    if (input.value > 1) {
        var newValue = parseInt(input.value) - 1;
        input.value = newValue.toString();
    } else {
        // alert("Minimum quantity count has been achieved");
        Snackbar.show({
            pos: 'bottom-right',
            text: 'Minimum quantity count has been achieved',
            actionTextColor: '#17D1EE',
            customClass: 'snack'
        });

    }


}

// buy now
function paynow(id) {

    var qty = document.getElementById("qtyinput").value;

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            var obj = JSON.parse(t);

            var mail = obj["email"];
            var amount = obj["amount"];

            if (t == 1) {

                // alert("Please Sign in First");
                window.location = "signinSignUp.php";

            } else if (t == 2) {

                // alert("Please Update Your Profile First");
                window.location = "account.php";
            } else {

                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);

                    saveInvoice(orderId, id, mail, amount, qty);

                };

                payhere.onDismissed = function onDismissed() {

                    console.log("Payment dismissed");
                };

                payhere.onError = function onError(error) {

                    console.log("Error:" + error);
                };

                var payment = {
                    "sandbox": true,
                    "merchant_id": "1219159", // Replace your Merchant ID
                    "return_url": "http://localhost/My_PROJECTS/eshop/singleProductView.php?id=" + id, // Important
                    "cancel_url": "http://localhost/My_PROJECTS/eshop/singleProductView.php?id=" + id, // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj["id"],
                    "items": obj["item"],
                    "amount": amount + ".00",
                    "currency": "LKR",
                    "first_name": obj["fname"],
                    "last_name": obj["lname"],
                    "email": mail,
                    "phone": obj["mobile"],
                    "address": obj["address"],
                    "city": obj["city"],
                    "country": "Sri Lanka",
                    "delivery_address": "No. 46, Galle road, Kalutara South",
                    "delivery_city": "Kalutara",
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                };
                // alert(payment);

                payhere.startPayment(payment);

            }
        }
    };
    r.open("GET", "buyNowProcess.php?id=" + id + "&qty=" + qty, true);
    r.send();
}

// save invoice
// saveInvoice(orderId,id,mail,amount)
function saveInvoice(orderId, id, mail, amount, qty) {

    var orderid = orderId;
    var pid = id;
    var email = mail;
    var total = amount;
    var pqty = qty;

    var f = new FormData();
    f.append("oid", orderid);
    f.append("pid", pid);
    f.append("email", email);
    f.append("total", total);
    f.append("pqty", pqty);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == 1) {
                window.location = "invoice.php?id=" + orderId;
            }
            // alert(t);
        }
    };
    r.open("POST", "saveInvoice.php", true);
    r.send(f);
}

// print invoice
function printDiv() {
    var restorepage = document.body.innerHTML;
    var page = document.getElementById("GFG").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = restorepage;
}

// Update Profile img
function profileImgUpdate() {
    var imgUpdate = document.getElementById("profileimg");
    var imgprev = document.getElementById("proImgPrev");

    imgUpdate.onchange = function() {
        var imgfile = this.files[0];
        var imgurl = window.URL.createObjectURL(imgfile);

        imgprev.src = imgurl;
    }
}

// update profile 

function updateProfile() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var province = document.getElementById("provinceid");
    var district = document.getElementById("districtid");
    var city = document.getElementById("cityid");
    var postalcode = document.getElementById("postalcodeid");
    var img = document.getElementById("profileimg");


    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("m", mobile.value);
    f.append("a1", line1.value);
    f.append("a2", line2.value);
    f.append("p", province.value);
    f.append("d", district.value);
    f.append("c", city.value);
    f.append("pcode", postalcode.value);
    f.append("i", img.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == 1) {
                // alert("New Details Added..");
                Snackbar.show({
                    pos: 'top-right',
                    text: "New Details Added..",
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'
                });
                window.location = "account.php";
            } else if (t == 2) {
                // alert("User Profile Updated");

                window.location = "account.php";
                Snackbar.show({
                    pos: 'top-right',
                    text: "User Profile Updated",
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'
                });
            } else {
                // alert(t);
                Snackbar.show({
                    pos: 'top-right',
                    text: t,
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'
                });
            }

        }
    }

    r.open("POST", "UpdateProfileProcess.php", true);
    r.send(f);

}



// disable_brand_model 
// function disable_brand_model() {
//     document.getElementById("br").setAttribute("disabled", "disabled");
//     document.getElementById("mo").setAttribute("disabled", "disabled");
//     document.getElementById("brand_div").innerHTML = "Select Brand";
//     document.getElementById("model_div").innerHTML = "Select Model";
// }

// disble_select_tags
function disble_select_tags() {

    document.getElementById("br").setAttribute("disabled", "disabled");
    document.getElementById("mo").setAttribute("disabled", "disabled");

}


// auto_category
function auto_category() {
    var id = document.getElementById("ca").value;
    // alert(id);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            document.getElementById("br").removeAttribute("disabled");
            document.getElementById("br").selectedIndex = text;

            var old_brand = document.getElementById("br");
            old_brand.style.display = "none";
            document.getElementById("brand_div").innerHTML = text;

        }
    };

    r.open("GET", "brand_set_auto.php?id=" + id, true);
    r.send();
}



// auto brand set
function brand_set() {
    document.getElementById("mo").removeAttribute("disabled");
    var id = document.getElementById("br").value;
    var cid = document.getElementById("ca").value;
    // alert(id);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            document.getElementById("mo").selectedIndex = text;

            var old_model = document.getElementById("mo");
            old_model.style.display = "none";
            document.getElementById("model_div").innerHTML = text;

        }
    };

    r.open("GET", "model_set_auto.php?id=" + id + "&cid=" + cid, true);
    r.send();
}


// add product
function addProduct() {

    var category = document.getElementById("ca");
    var brand = document.getElementById("br");
    var model = document.getElementById("mo");
    var title = document.getElementById("ti");

    var condition;
    if (document.getElementById("bn").checked) {
        condition = "1";
    } else if (document.getElementById("us").checked) {
        condition = "2";
    }

    // var colour;
    // if (document.getElementById("clr1").checked) {
    //     colour = "1";
    // } else if (document.getElementById("clr2").checked) {
    //     colour = "2";
    // } else if (document.getElementById("clr3").checked) {
    //     colour = "3";
    // } else if (document.getElementById("clr4").checked) {
    //     colour = "4";
    // } else if (document.getElementById("clr5").checked) {
    //     colour = "5";
    // } else if (document.getElementById("clr6").checked) {
    //     colour = "6";
    // }



    var clr = document.getElementById("clr").value;
    var qty = document.getElementById("qty");
    var price = document.getElementById("cost");
    var delevery_within_colombo = document.getElementById("dwc");
    var delevery_outof_colombo = document.getElementById("doc");
    var description = document.getElementById("desc");
    var image = document.getElementById("imguploader");
    var image1 = document.getElementById("imguploader1");
    var image2 = document.getElementById("imguploader2");

    var form = new FormData();
    form.append("c", category.value);
    form.append("b", brand.value);
    form.append("m", model.value);
    form.append("t", title.value);
    form.append("co", condition);
    form.append("col", clr);
    form.append("qty", qty.value);
    form.append("p", price.value);
    form.append("dwc", delevery_within_colombo.value);
    form.append("doc", delevery_outof_colombo.value);
    form.append("desc", description.value);
    form.append("img", image.files[0]);
    form.append("img1", image1.files[0]);
    form.append("img2", image2.files[0]);



    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == 1) {
                // alert("Success");
                window.location = "index.php";
            } else {
                // alert(text);
                Snackbar.show({
                    pos: 'top-right',
                    text: text,
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'
                });
            }


        }
    }

    r.open("POST", "addProductProcess.php", true);
    r.send(form);


}

// update Product : change img

function u_changeImg() {
    var image = document.getElementById("img1"); // img chooser eka
    var view = document.getElementById("u_prev"); // view karana div eka

    image.onchange = function() { // img eka change wena welawedi - Annonymus function ek call wenw
        var file = this.files[0]; // array ekk widihta ena hinda "1" weni file eka thooragannawa
        var url = window.URL.createObjectURL(file); // img eka url ekk widihata hadagannwa

        view.src = url; // view karana thanata img url eka set karnwa
    }
}

function u_changeImg1() {
    var image = document.getElementById("img2"); // img chooser eka
    var view = document.getElementById("u_prev1"); // view karana div eka

    image.onchange = function() { // img eka change wena welawedi - Annonymus function ek call wenw
        var file = this.files[0]; // array ekk widihta ena hinda "1" weni file eka thooragannawa
        var url = window.URL.createObjectURL(file); // img eka url ekk widihata hadagannwa

        view.src = url; // view karana thanata img url eka set karnwa
    }
}

function u_changeImg2() {
    var image = document.getElementById("img3"); // img chooser eka
    var view = document.getElementById("u_prev2"); // view karana div eka

    image.onchange = function() { // img eka change wena welawedi - Annonymus function ek call wenw
        var file = this.files[0]; // array ekk widihta ena hinda "1" weni file eka thooragannawa
        var url = window.URL.createObjectURL(file); // img eka url ekk widihata hadagannwa

        view.src = url; // view karana thanata img url eka set karnwa
    }
} // Add Product img

function changeImg() {
    var image = document.getElementById("imguploader"); // img chooser eka
    var view = document.getElementById("prev"); // view karana div eka

    image.onchange = function() { // img eka change wena welawedi - Annonymus function ek call wenw
        var file = this.files[0]; // array ekk widihta ena hinda "1" weni file eka thooragannawa
        var url = window.URL.createObjectURL(file); // img eka url ekk widihata hadagannwa

        view.src = url; // view karana thanata img url eka set karnwa
    }
}

function changeImg1() {
    var image = document.getElementById("imguploader1"); // img chooser eka
    var view = document.getElementById("prev1"); // view karana div eka

    image.onchange = function() { // img eka change wena welawedi - Annonymus function ek call wenw
        var file = this.files[0]; // array ekk widihta ena hinda "1" weni file eka thooragannawa
        var url = window.URL.createObjectURL(file); // img eka url ekk widihata hadagannwa

        view.src = url; // view karana thanata img url eka set karnwa
    }
}

function changeImg2() {
    var image = document.getElementById("imguploader2"); // img chooser eka
    var view = document.getElementById("prev2"); // view karana div eka

    image.onchange = function() { // img eka change wena welawedi - Annonymus function ek call wenw
        var file = this.files[0]; // array ekk widihta ena hinda "1" weni file eka thooragannawa
        var url = window.URL.createObjectURL(file); // img eka url ekk widihata hadagannwa

        view.src = url; // view karana thanata img url eka set karnwa
    }
}

// update Product

function updateProduct(id) {
    // alert("ok");

    var id = id;
    // alert(id);

    var title = document.getElementById("u_title");
    var qty = document.getElementById("u_qty");
    var dwc = document.getElementById("u_dwc");
    var doc = document.getElementById("u_doc");
    var desc = document.getElementById("u_desc");
    var img1 = document.getElementById("img1");
    var img2 = document.getElementById("img2");
    var img3 = document.getElementById("img3");


    var u_form = new FormData();
    u_form.append("title", title.value);
    u_form.append("qty", qty.value);
    u_form.append("dwc", dwc.value);
    u_form.append("doc", doc.value);
    u_form.append("desc", desc.value);
    u_form.append("img1", img1.files[0]);
    u_form.append("img2", img2.files[0]);
    u_form.append("img3", img3.files[0]);
    u_form.append("id", id);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == 1) {
                // alert("Your Product Updated Successfully..");
                window.location = "updateProduct.php";
            } else {
                alert(text);
            }
        }
    };
    r.open("POST", "updateProductProcess.php", true);
    r.send(u_form);
}

// checkout
function checkout() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            // alert(text);

            var obj = JSON.parse(text);

            var mail = obj["email"];

            if (text == 1) {
                alert("Please Sign In First");
                window.location = "signinSignUp.php";
            } else if (text == "2") {
                alert("Please Update your Profile First");
                window.location = "account.php";
            } else {

                // alert(text);
                // Called when user completed the payment. It can be a successful payment or failure
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);

                    savefullInvoice(orderId);
                    //Note: validate the payment and show success or failure page to the customer
                };

                // Called when user closes the payment without completing
                payhere.onDismissed = function onDismissed() {
                    //Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                };

                // Called when error happens when initializing payment such as invalid parameters
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                };

                var payment = {
                    sandbox: true,
                    merchant_id: "1219159",
                    return_url: "http://localhost/My_PROJECTS/LION%20HUB/checkout.php",
                    cancel_url: "http://localhost/My_PROJECTS/LION%20HUB/checkout.php",
                    notify_url: "http://sample.com/notify",
                    order_id: obj["id"],
                    items: obj["item"],
                    amount: obj["amount"] + ".00",
                    currency: "LKR",
                    first_name: obj["fname"],
                    last_name: obj["lname"],
                    email: mail,
                    phone: obj["mobile"],
                    address: obj["address"],
                    city: obj["city"],
                    country: "Sri Lanka",
                    delivery_address: obj["address"],
                    delivery_city: obj["city"],
                    delivery_country: "Sri Lanka",
                    custom_1: "",
                    custom_2: ""
                };

                payhere.startPayment(payment);

            }
        }
    };
    r.open("GET", "checkoutProcess.php", true);
    r.send();
}

// checkout invoice
function savefullInvoice(orderId) {
    var orderid = orderId;

    var f = new FormData();
    f.append("oid", orderid);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            // if (t == 1) {
            //     window.location = "invoice.php?id=" + orderid;
            // } else {
            //     alert(t);
            window.location = "invoice.php?id=" + orderid;
            // }
        }
    };

    r.open("POST", "checkoutinvoiceprocess.php", true);
    r.send(f);
}

// auto price id
function autoprice(id) {
    var price = document.getElementById("price" + id);

    var f = new FormData();
    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            price.innerHTML = t;

        }
    };

    r.open("POST", "autocartpriceupdate.php", true);
    r.send(f);
}

function cartupdate(id) {
    var qty = document.getElementById("qtyup" + id).value;

    var f = new FormData();
    f.append("id", id);
    f.append("qty", qty);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

        }
    };

    r.open("POST", "cartqtyupdate.php", true);
    r.send(f);


}

function autoprice(id) {
    var price = document.getElementById("price" + id);

    var f = new FormData();
    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            price.innerHTML = t;

        }
    };

    r.open("POST", "autocartpriceupdate.php", true);
    r.send(f);
}

function autosubtotal() {
    var tag = document.getElementById("sub");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            tag.innerHTML = t;

        }
    };

    r.open("GET", "autosubtotalload.php", true);
    r.send();
}

function autototal() {
    var tag = document.getElementById("tot");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            tag.innerHTML = t;

        }
    };

    r.open("GET", "carttotalupdate.php", true);
    r.send();
}



// *********************************************************************

// google signin
function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    $("#google_name").text(profile.getName());
    $("#google_email").text(profile.getEmail());

    var name = document.getElementById("google_name").innerHTML;
    var email = document.getElementById("google_email").innerHTML;

    var stringArray = name.split(/(\s+)/);
    var fname = stringArray[0];
    var lname = stringArray[2];

    // alert(fname);
    // alert(lname);

    var f = new FormData();
    f.append("fn", fname);
    f.append("ln", lname);
    f.append("e", email);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == 1) {
                Snackbar.show({
                    pos: 'bottom-right',
                    text: "You are Bloked.",
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'
                });
            } else if (t == 2) {

                window.location = "index.php";
                // alert("kalin register wela tiyenw.");

            } else {
                window.location = "index.php";
                // alert("alithin register une.");
            }


        }
    };

    r.open("POST", "google_signin.php", true);
    r.send(f);

}

// *********************************************************************

function sse(seller_email) {
    window.location = "message.php?seller_email=" + seller_email;
}

function goToMessags() {
    window.location = "message.php";
}

function goTomanageOrders() {
    window.location = "order_status_update.php";
}

function banner_update() {
    window.location = "banner_update.php";
}

function history_back1() {
    window.history.back();
}

// banner update
function update_banner(x) {
    var banner_type = x;

    var slider1 = document.getElementById("hs1");
    var slider2 = document.getElementById("hs2");
    var slider3 = document.getElementById("hs3");
    var slider4 = document.getElementById("hs4");
    var slider5 = document.getElementById("hs5");

    var f = new FormData();
    f.append("banner_type", banner_type);
    f.append("slider1", slider1.files[0]);
    f.append("slider2", slider2.files[0]);
    f.append("slider3", slider3.files[0]);
    f.append("slider4", slider4.files[0]);
    f.append("slider5", slider5.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == 1) {

                window.location = "banner_update.php";

            } else {
                Snackbar.show({
                    pos: 'bottom-right',
                    text: text,
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'
                });
            }

        }
    }

    r.open("POST", "banner_update_process.php", true);
    r.send(f);
}

//order track
function changetc(id) {

    var tag = document.getElementById("tc").value;


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Done");
            } else {
                alert(t);
            }
        }
    };
    r.open("GET", "trackidchange.php?tag=" + tag + "&tid=" + id, true);
    r.send();
}

function order_status_change() {

    var id = document.getElementById("id");

    // alert(id);
}