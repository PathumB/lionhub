document.querySelectorAll('.dropdown-toggle').forEach(item => {
    item.addEventListener('click', event => {

        if (event.target.classList.contains('dropdown-toggle')) {
            event.target.classList.toggle('toggle-change');
        } else if (event.target.parentElement.classList.contains('dropdown-toggle')) {
            event.target.parentElement.classList.toggle('toggle-change');
        }
    })
});








function changeView() {
    var signInBox = document.getElementById("signInBox");
    var signUpBox = document.getElementById("signUpBox");

    signInBox.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");
}

function signUp() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("mobile", mobile.value);
    form.append("gender", gender.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == 1) {

                fname.value = "";
                lname.value = "";
                email.value = "";
                password.value = "";
                mobile.value = "";
                document.getElementById("msg").innerHTML = "";
                Snackbar.show({
                    pos: 'top-right',
                    text: 'Success..',
                    actionTextColor: '#17D1EE',
                    customClass: 'snack'
                });

                changeView();

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
                window.location = "home.php";
            } else {
                document.getElementById("msg2").innerHTML = t;
            }
        }
    };
    r.open("POST", "signInProcess.php", true);
    r.send(formData);
}

var bm;

// function forgotPassword() {

//     var email = document.getElementById("email2");

//     var r = new XMLHttpRequest();
//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var text = r.responseText;

//             if (text == 1) {

//                 alert("Verification email sent. Please check your inbox.");
//                 var m = document.getElementById("forgetPasswordModal");
//                 bm = new bootstrap.Modal(m);
//                 bm.show();

//             } else {
//                 alert(text);
//             }
//         }
//     };
//     r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
//     r.send();
// }

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


// function resetPassword() {
//     var e = document.getElementById("email2");
//     var np = document.getElementById("np");
//     var rnp = document.getElementById("rnp");
//     var vc = document.getElementById("vc");

//     var form = new FormData();
//     form.append("e", e.value);
//     form.append("np", np.value);
//     form.append("rnp", rnp.value);
//     form.append("vc", vc.value);

//     var r = new XMLHttpRequest();
//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var text = r.responseText;
//             if (text = "1") {

//                 alert("Password Reset Successful");
//                 bm.hide();

//             } else {
//                 alert(text);
//             }
//         }
//     };
//     r.open("POST", "resetPassword.php", true);
//     r.send(form);
// }


function gotoaddProduct() {
    window.location = "add_product.php";
}


// Add Product img

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


// auto brand set

function brand_set() {
    alert("o");
}



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

    var colour;
    if (document.getElementById("clr1").checked) {
        colour = "1";
    } else if (document.getElementById("clr2").checked) {
        colour = "2";
    } else if (document.getElementById("clr3").checked) {
        colour = "3";
    } else if (document.getElementById("clr4").checked) {
        colour = "4";
    } else if (document.getElementById("clr5").checked) {
        colour = "5";
    } else if (document.getElementById("clr6").checked) {
        colour = "6";
    }


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
    form.append("col", colour);
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
                alert("Success");
                window.location = "home.php";
            } else {
                alert(text);
            }


        }
    }

    r.open("POST", "addProductProcess.php", true);
    r.send(form);


}

function signOut() {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == 555) {
                window.location = "home.php";
            }
        }
    };
    r.open("GET", "signout.php", true);
    r.send();
}



function changeProductView() {
    var add = document.getElementById("addproductbox");
    var update = document.getElementById("updateproductbox");

    add.classList.toggle("d-none");
    update.classList.toggle("d-none");

}



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
                alert("New Details Added..");
                window.location = "userProfile.php";
            } else if (t == 2) {
                alert("User Profile Updated");
                window.location = "userProfile.php";
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "UpdateProfileProcess.php", true);
    r.send(f);

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

// Basic search
function basicSearch(page) {
    // alert("aawooo");
    var basictext = document.getElementById("basic_search_text").value;
    var basicselect = document.getElementById("basic_search_select").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            var caro = document.getElementById("carosel");
            caro.innerHTML = "";
            var main = document.getElementById("basicsearchproducts");
            main.innerHTML = "";

            if (t == 1) {

                var notcol = document.createElement("div");
                notcol.className = "col-12 col-md-10 offset-md-1 border border-1 border-primary";
                var notrow = document.createElement("div");
                notrow.className = "row row-cols-2 row-cols-lg-5 g-4 g-lg-1 mt-1 mb-1";
                var notcol1 = document.createElement("div");
                notcol1.className = "col-12 col-lg-6 offset-lg-3";
                var notimg = document.createElement("div");
                notimg.className = "noproducts";

                notcol1.appendChild(notimg);
                notrow.appendChild(notcol1);
                notcol.appendChild(notrow);
                main.appendChild(notcol);

            } else if (t == 5) {
                main.innerHTML = "<h3 class = 'text-center text-black-50 fw-bold'>Enter Keyword to Search..</h3>";
            } else {

                var obj = JSON.parse(t);
                /* document.getElementById("basicsearchproducts").innerHTML = "";
                document.getElementById("basicsearchproducts").innerHTML = name; */

                var maincol = document.createElement("div");
                maincol.className = "col-12 col-md-10 offset-md-1";
                var mainrow = document.createElement("div");
                mainrow.className = "row row-cols-2 row-cols-lg-5 g-4 g-lg-1 mt-1 mb-1"
                maincol.appendChild(mainrow);
                main.appendChild(maincol);
                for (var k = 0; k < obj.length; k++) {

                    var col = document.createElement("div");
                    col.className = "col";
                    var div = document.createElement("div");
                    div.className = "card";
                    var img = document.createElement("img");
                    img.className = "card-img-top cardtopimg";
                    img.src = obj[k].code;
                    var div1 = document.createElement("div");
                    div1.className = "card-body text-center";
                    var h6 = document.createElement("h6");
                    h6.className = "card-title fw-bolder";
                    h6.innerHTML = obj[k].title;
                    var span1 = document.createElement("span");
                    span1.className = "ms-1 badge bg-dark";
                    span1.innerHTML = "New";
                    var span2 = document.createElement("span");
                    span2.className = "card-text text-primary";
                    span2.innerHTML = "Rs " + obj[k].price + " .00";
                    var br = document.createElement("br");
                    var span3 = document.createElement("span");
                    span3.className = "card-text text-success fs-5";
                    span3.innerHTML = "In Stock";

                    var a4 = document.createElement("a");
                    a4.className = "btn";
                    var i1 = document.createElement("i");
                    i1.className = "bi bi-heart-fill ";
                    i1.style.color = "red";

                    var input = document.createElement("input");
                    input.type = "number";
                    input.value = "1";
                    input.className = "form-control mb-1";
                    var a1 = document.createElement("button");
                    a1.className = "btn btn-info btn-size ";
                    a1.innerHTML = "Buy Now";
                    var a2 = document.createElement("button");
                    a2.className = "btn btn-warning btn-size-cart ms-1";
                    a2.innerHTML = "Add To Cart";
                    var a3 = document.createElement("button");
                    a3.className = "btn btn-light";

                    // var heart = document.createElement("img");
                    // heart.className = "heart";
                    // heart.src = "resources/heat";
                    div.appendChild(img);
                    div.appendChild(div1);
                    div1.appendChild(h6);
                    h6.appendChild(span1);
                    div1.appendChild(span2);
                    div1.appendChild(br);
                    div1.appendChild(span3);
                    div1.appendChild(input);
                    div1.appendChild(a1);
                    div1.appendChild(a2);
                    span3.appendChild(a4);
                    span3.appendChild(i1);
                    // a3.appendChild(heart);
                    div1.appendChild(a3);
                    col.appendChild(div);
                    mainrow.appendChild(col);
                }

                /* alert(obj[0].pages); */

                var buttondiv = document.createElement("div");
                buttondiv.className = "col-12 col-lg-10 offset-lg-1 text-center mt-3";

                var prebutton = document.createElement("button");
                prebutton.className = "btn btn-light hov";
                var preicon = document.createElement("i");
                preicon.className = "fas fa-angle-double-left";
                prebutton.appendChild(preicon);
                buttondiv.appendChild(prebutton);

                if (page != 1) {
                    prebutton.onclick = function() {
                        basicSearch(parseInt(page) - 1);
                    }
                } else {

                }

                for (var j = 1; j <= obj[0].pages; j++) {
                    var pagebutton = document.createElement("button");
                    pagebutton.innerHTML = j;

                    if (page == j) {
                        pagebutton.className = "btn btn-primary mx-1";
                    } else {
                        pagebutton.className = "btn btn-secondary mx-1";
                        pagebutton.onclick = function() {
                            basicSearch(this.innerHTML);
                        }
                    }

                    buttondiv.appendChild(pagebutton);
                }

                var nextbutton = document.createElement("button");
                nextbutton.className = "btn btn-light hov";
                var nexticon = document.createElement("i");
                nexticon.className = "fas fa-angle-double-right";
                nextbutton.appendChild(nexticon);
                buttondiv.appendChild(nextbutton);

                if (page != obj[0].pages) {
                    next = parseInt(page);
                    nextbutton.onclick = function() {
                        basicSearch(next + 1);
                    }
                } else {

                }

                main.appendChild(buttondiv);

            }

        }
    }

    r.open("GET", "basicSearch.php?text=" + basictext + "&select=" + basicselect + "&page=" + page, true);
    r.send();
}


//change status
function changeStatus(id) {

    var productid = id;
    var statuslabel = document.getElementById("checklabel" + productid);
    // var statustext = document.getElementById("statustext" + productid);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == 2) {
                statuslabel.innerHTML = "Make Your Product Active";
                // s = document.getElementById("check").checked = "checked";
                // alert(s);

                // statustext.innerHTML = "Make Your Product Active";
            } else if (t == 1) {
                statuslabel.innerHTML = "Make Your Product Deactive";
                // statustext.innerHTML = "Make Your Product Deactive";
            }

        }
    };
    r.open("GET", "statusChangeProcess.php?p=" + productid, true);
    r.send();
}

// Delte Model
function deleteModel(id) {
    var dm = document.getElementById("deleteModel" + id);
    k = new bootstrap.Modal(dm);
    k.show();

}

// Delte Modal
function deleteModal(id) {

    var deleteModal = document.getElementById("deleteModal" + id);

    k = new bootstrap.Modal(deleteModal);
    k.show();

}


// Delete Product

function deleteProduct(id) {

    var productid = id;
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var t = request.responseText;
            if (t = "success") {
                k.hide();
                window.location = "sellerProductView.php";

            } else {

            }
        }
    }
    request.open("GET", "deleteProductProcess.php?id=" + productid, true);
    request.send();
}


// Filters
function addfilters(x) {

    var search = document.getElementById("my_product_search");
    var page = x;
    // alert(search);

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


    var form = new FormData();
    form.append("search", search.value);
    form.append("activetime", activetime);
    form.append("quantity", quantity);
    form.append("condition", condition);
    form.append("page", page);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
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
                document.getElementById("sp").style.display = "none";
            }
        }
    }
    r.open("POST", "filterProcess.php", true);
    r.send(form);

}

function clearfilters() {
    document.getElementById("n").checked = false;
    document.getElementById("o").checked = false;
    document.getElementById("l").checked = false;
    document.getElementById("h").checked = false;
    document.getElementById("b").checked = false;
    document.getElementById("u").checked = false;

}


// update page
function updateProductPage() {
    window.location = "updateProduct.php";
}

//  search to update
function searchToUpdate() {
    var id = document.getElementById("searchid").value;
    var title = document.getElementById("title");

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            var object = JSON.parse(text);

            title.value = object["title"];
        }
    };
    request.open("GET", "searchToUpdate.php?id=" + id, true);
    request.send();
}



// send id to update

function sendid(id) {

    var id = id;
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t = 1) {
                window.location = "updateProduct.php";
            }
        }
    };
    r.open("GET", "sendProductProcess.php?id=" + id, true);
    r.send();
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
                alert("Your Product Updated Successfully..");
                window.location = "updateProduct.php";
            } else {
                alert(text);
            }
        }
    };
    r.open("POST", "updateProductProcess.php", true);
    r.send(u_form);
}


/*  Load Main Image  */

function loadMainImg(id) {

    var pid = id;

    var img = document.getElementById("pimg" + pid).src;
    var mainimg = document.getElementById("mainimg");

    mainimg.style.backgroundImage = "url(" + img + ")";

    // alert(img);
}


/* Qty Increase */

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


/* Basic Search */



// function basicSearch(page) {
//     var searchText = document.getElementById("basic_search_text").value;
//     var searchSelect = document.getElementById("basic_search_select").value;

//     var cardrow = document.getElementById("pdetails");
//     cardrow.className = 'd-none';

//     var cardcat = document.getElementById("pcat");
//     cardcat.className = 'd-none';

//     // alert(cardcat.innerHTML);
//     // alert(cardrow.innerHTML);
//     // alert(searchText);
//     // alert(searchSelect);

//     var r = new XMLHttpRequest();
//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {

//             var t = r.responseText;
//             alert(t);
//             var ar = JSON.parse(t);
//             // alert(ar);

//             for (var i = 0; i < ar.length; i++) {

//                 var divrowcol = document.createElement("div");
//                 divrowcol.className = "col-12";
//                 var divrow = document.createElement("div");
//                 divrow.className = "row";
//                 var div = document.createElement("div");
//                 div.className = "card col-6 col-lg-2  mt-1 mb-1 ms-1";
//                 div.style.width = "15rem";
//                 var img = document.createElement("img");
//                 img.src = "resources/products//" + ar[i]["img"];
//                 var div1 = document.createElement("div");
//                 div1.className = "card-body";
//                 var h5 = document.createElement("h5");
//                 h5.className = "card-title";
//                 h5.innerHTML = ar[i]["title"];
//                 var span1 = document.createElement("span");
//                 span1.innerHTML = "New";
//                 var span2 = document.createElement("span");
//                 span2.className = "card-text text-primary";
//                 span2.innerHTML = ar[i]["price"];
//                 var br = document.createElement("br");
//                 var span3 = document.createElement("span");
//                 span3.className = "card-text text-warning";
//                 span3.innerHTML = "In Stock";
//                 var input = document.createElement("input");
//                 input.type = "number";
//                 input.value = ar[i]["qty"];
//                 input.className = "form-control mb-1";
//                 var a1 = document.createElement("a");
//                 a1.className = "btn btn-success";
//                 a1.innerHTML = "Buy Now"
//                 var a2 = document.createElement("a");
//                 a2.className = "btn btn-danger";
//                 a2.innerHTML = "Add To Cart";


//                 divrowcol.appendChild(divrow);
//                 divrow.appendChild(div);
//                 div.appendChild(img);
//                 div.appendChild(div1);
//                 div1.appendChild(h5);
//                 h5.appendChild(span1);
//                 div1.appendChild(span2);
//                 div1.appendChild(br);
//                 div1.appendChild(span3);
//                 div1.appendChild(input);
//                 div1.appendChild(a1);
//                 div1.appendChild(a2);

//                 document.getElementById("pdiv").appendChild(divrow);

//                 alert(ar);
//             }

//         }
//     };
//     r.open("GET", "basicSearch.php?t=" + searchText + "&s=" + searchSelect, true);
//     r.send();
// }

// Add To WatchList

function addToWishList(id) {
    var pid = id;

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == 1) {
                window.location = "watchList.php";
            } else if (t == 5) {
                alert("Please Sign in");
                window.location = "index.php";
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

function deleteFromWatchlist(id) {
    var wid = id;

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var t = request.responseText;
            if (t == 1) {
                window.location = "watchList.php";
            }

        }
    };
    request.open("GET", "removeWatchlistItemProcess.php?id=" + wid, true);
    request.send();
}

// Add To Cart

function addToCart(id) {
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
                // document.getElementById("cart_num_rows").innerHTML = "0";
                // Snackbar.show({
                //     pos: 'bottom-right',
                //     text: "Added To Cart",
                //     actionTextColor: '#17D1EE',
                //     customClass: 'snack'

                // });
            } else if (t == 2) {
                alert("Please Sign in");
                window.location = "index.php";
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

// Paynow

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

                alert("Please Sign in First");
                window.location = "index.php";

            } else if (t == 2) {

                alert("Please Update Your Profile First");
                window.location = "userProfile.php";
            } else {


                // Called when user completed the payment. It can be a successful payment or failure
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);

                    saveInvoice(orderId, id, mail, amount, qty);

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

                // Put the payment variables here
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

                // Show the payhere.js popup, when "PayHere Pay" is clicked
                // document.getElementById('payhere-payment').onclick = function(e) {
                payhere.startPayment(payment);
                // };

            }
        }
    };
    r.open("GET", "buyNowProcess.php?id=" + id + "&qty=" + qty, true);
    r.send();
}

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


// model
function addFeedback(id) {
    // alert("ok");
    var feedmodel = document.getElementById("feedbackModel" + id);
    k = new bootstrap.Modal(feedmodel);
    k.show();
}

// deletePurchaseHistory
function deletePurchaseHistory(oid, pid) {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == 1) {
                window.location = "purchasehistory.php";
            }
        }
    };
    r.open("GET", "deletePurchaseHistory.php?oid=" + oid + "&pid=" + pid, true);
    r.send();
}
//clearAllPurchaseHistory
function clearAllPurchaseHistory() {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == 1) {
                window.location = "purchasehistory.php";
            }
        }
    };
    r.open("GET", "clearAllPurchaseHistory.php", true);
    r.send();
}

// Save Feedback
function saveFeedback(id) {

    // alert("id");
    var pid = id;
    var feedtxt = document.getElementById("feedtxt" + id).value;

    var f = new FormData;
    f.append("i", pid);
    f.append("ft", feedtxt);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == 1) {
                k.hide();
                window.location = "purchasehistory.php";
            }
        }
    };
    r.open("POST", "saveFeedbackProcess.php", true);
    r.send(f);
}

// sendverification

function sendverification() {
    var e = document.getElementById("e").value;

    var r = new XMLHttpRequest();


    var f = new FormData();
    f.append("e", e);


    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == 1) {

                var verificationModel = document.getElementById("verificationModel");
                k = new bootstrap.Modal(verificationModel);
                k.show();

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
    };
    r.open("POST", "adminVerificationProcess.php", true);
    r.send(f);
}

// verify
function verify() {

    var verificationCode = document.getElementById("v").value;
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == 1) {
                k.hide();
                window.location = "adminPannel.php";
            } else {
                alert(t);
            }
        }
    };
    r.open("GET", "verifyProcess.php?v=" + verificationCode, true);
    r.send();

}


// Block Users 

function blockUserreal(email) {

    var email = email;
    var blockbtn0 = document.getElementById("blockbtn0" + email);

    var f = new FormData();
    f.append("e", email);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == 1) {
                blockbtn0.className = "btn btn-warning";
                blockbtn0.innerHTML = "Unblock";

            } else if (t == 2) {
                blockbtn0.className = "btn btn-primary";
                blockbtn0.innerHTML = "Block";

            }
        }
    };

    r.open("POST", "blockUserProcess.php", true);
    r.send(f);

}

// Block product 

function blockUser(id) {
    // alert(email);
    var id = id;
    var blockbtn = document.getElementById("blockbtn1" + id);

    var f = new FormData();
    f.append("id", id);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == 1) {
                blockbtn.className = "btn btn-warning";
                blockbtn.innerHTML = "Unblock";

            } else if (t == 2) {
                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "Block";

            }
        }
    };

    r.open("POST", "blockProduct.php", true);
    r.send(f);

}

// Search Product History

function searchProductHistory(x) {
    var page = x;
    var search = document.getElementById("searchtxt").value;
    var product_div = document.getElementById("product_div");
    var data = document.getElementById("data");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == 1) {
                alert(t);
            } else {
                data.innerHTML = "";
                product_div.innerHTML = t;
            }

        }
    };

    r.open("GET", "productHistorySearchProcess.php?s=" + search + "&p=" + page, true);
    r.send();
}


// Search User

function searchUser(x) {
    var page = x;
    var search = document.getElementById("searchtxt1").value;
    var userdiv1 = document.getElementById("userdiv1");
    var userdata = document.getElementById("userdata");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == 1) {
                alert(t);
            } else {
                userdata.innerHTML = "";
                userdiv1.innerHTML = t;
            }

        }
    };

    r.open("GET", "searchUser.php?s=" + search + "&page=" + page, true);
    r.send();
}

// Search product by admin

function searchProduct(x) {
    var page = x;
    var search = document.getElementById("searchtxt2").value;
    var userdiv2 = document.getElementById("userdiv2");
    var productdata = document.getElementById("productdata");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == 1) {
                alert(t);
            } else {
                productdata.innerHTML = "";
                userdiv2.innerHTML = t;
            }

        }
    };

    r.open("GET", "searchProduct.php?s=" + search + "&page=" + page, true);
    r.send();
}

// advance Search

function advanceSearch(x) {

    var viewResults = document.getElementById("viewResults");
    var page = x;

    var keyword = document.getElementById("k").value;
    var category = document.getElementById("category").value;
    var brand = document.getElementById("brand").value;
    var model = document.getElementById("model").value;
    var condition = document.getElementById("condition").value;
    var color = document.getElementById("color").value;
    var priceFrom = document.getElementById("pf").value;
    var priceTo = document.getElementById("pt").value;

    var f = new FormData();
    f.append("k", keyword);
    f.append("c", category);
    f.append("b", brand);
    f.append("m", model);
    f.append("con", condition);
    f.append("clr", color);
    f.append("pf", priceFrom);
    f.append("pt", priceTo);
    f.append("page", page);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                alert("You must enter a keyword to search");
            } else {
                viewResults.innerHTML = t;
            }



        }
    };

    r.open("POST", "advanceSearchProcess.php", true);
    r.send(f);

}
// sendmessage

// sendmessage

function sendmessage(mail) {
    // alert("111");
    var email = mail;
    var msgtxt = document.getElementById("msgtxt").value;

    var f = new FormData();
    f.append("e", email);
    f.append("t", msgtxt);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == 1) {

                // alert("Message Sent Successfully");
                // location.reload()
                document.getElementById("msgtxt").value = "";
                refresher();

            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "sendmessageprocess.php", true);
    r.send(f);

}



// refresher

function refresher(email) {

    setInterval(refreshmsgare(email), 100);
    setInterval(refreshrecentarea, 500);

}

// refres msg view area

function refreshmsgare(mail) {
    // alert("aawa");
    var chatrow = document.getElementById("chatrow");

    var f = new FormData();
    f.append("e", mail);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            chatrow.innerHTML = t;



        }
    }

    r.open("POST", "refreshmsgareaprocess.php", true);
    r.send(f);

}

// refreshrecentarea

function refreshrecentarea() {

    var rcv = document.getElementById("rcv");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            rcv.innerHTML = t;
        }
    }

    r.open("POST", "refreshrecentareaprocess.php", true);
    r.send();

}

/* ... */

// refresher

// function refresher(email) {

//     setInterval(refreshmsgare(email), 500);
//     setInterval(refreshrecentarea, 500);
// }

// refres msg view area

// function refreshmsgare(mail) {

//     var chatrow = document.getElementById("chatrow");

//     var f = new FormData();
//     f.append("e", mail);

//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var t = r.responseText;

//             chatrow.innerHTML = t;

//         }
//     }

//     r.open("POST", "refreshmsgareaprocess.php", true);
//     r.send(f);

// }

// refreshrecentarea

// function refreshrecentarea() {

//     var rcv = document.getElementById("rcv");

//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var t = r.responseText;
//             rcv.innerHTML = t;
//         }
//     }

//     r.open("POST", "refreshrecentareaprocess.php", true);
//     r.send();

// }

// dailySellings

function dailySellings() {
    // alert("ok");
    var from = document.getElementById("fromDate").value;
    var to = document.getElementById("toDate").value;
    var link = document.getElementById("historylink");

    link.href = "productSellingHistory.php?f=" + from + "&t=" + to;

    // var f = new FormData();
    // f.append("from", from);
    // f.append("to", to);

    // var r = new XMLHttpRequest();

    // r.onreadystatechange = function() {
    //     if (r.readyState == 4) {
    //         var t = r.responseText;
    //         window.location = "productSellingHistory.php";
    //     }
    // }

    // r.open("POST", "productSellingHistory.php", true);
    // r.send(f);



}

// viewMsgModel
function viewMsgModel(x) {
    var pop = document.getElementById("msgModel");
    k = new bootstrap.Modal(pop);
    k.show();
}

// addNewModel
function addNewModel() {
    var pop = document.getElementById("addnewmodal");
    k = new bootstrap.Modal(pop);
    k.show();
}
// addNewModel1
function addNewModel1() {
    var pop = document.getElementById("addnewmodal1");
    k = new bootstrap.Modal(pop);
    k.show();
}
// saveCategory
function savecategory() {

    var txt = document.getElementById("categoryTxt").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == 1) {
                k.hide();
                // alert("Category Saved Succesfully");
                window.location = "manageProduct.php";
                addedCategoryAlert();

            } else {
                alert(t);
                // alert("awa");
            }
        }
    }

    r.open("GET", "addNewCategoryProcess.php?t=" + txt, true);
    r.send();

}

// saveColor
function saveColor() {

    var txt = document.getElementById("colorTxt").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == 1) {
                k.hide();
                // alert("Category Saved Succesfully");
                window.location = "manageProduct.php";
                addedColoAlert();

            } else {
                alert(t);
                // alert("awa");
            }
        }
    }

    r.open("GET", "addNewColorProcess.php?t=" + txt, true);
    r.send();

}



function addedCategoryAlert() {
    Snackbar.show({
        pos: 'top-right',
        text: "Category Saved Succesfully",
        actionTextColor: '#17D1EE',
        customClass: 'snack'
    });
}

function addedColoAlert() {
    Snackbar.show({
        pos: 'top-right',
        text: "Color Saved Succesfully",
        actionTextColor: '#17D1EE',
        customClass: 'snack'
    });
}

//singleViewModel
function singleviewmodal(x) {
    var pop = document.getElementById("singleproductview" + x);
    k = new bootstrap.Modal(pop);
    k.show();
}