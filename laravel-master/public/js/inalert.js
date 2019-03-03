function makeAlert(msg, duration) {
    var el = document.createElement("div");
    el.setAttribute("style", "position:fixed;bottom:2%;left:2%; width:20%;z-index:999999");
    el.innerHTML = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">Ä‚â€”</button><h4><i class="icon fa fa-check"></i> ThÄ‚ nh CÄ‚Â´ng!</h4>' + msg + '.</div>';
    setTimeout(function () {
        el.parentNode.removeChild(el);
    }, duration);
    document.body.appendChild(el);
}

function makeSAlert(msg, duration) {
    var el = document.createElement("div");
    el.setAttribute("style", "position:fixed;bottom:20%;left:2%; width:30%;z-index:999999");
    el.innerHTML = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">Ä‚â€”</button><i class="fa fa-times"></i> <strong>Error!! </strong>' + msg + ' .</div>';
    setTimeout(function () {
        el.parentNode.removeChild(el);
    }, duration);
    document.body.appendChild(el);
}

function makeSAlertright(msg, duration) {
    var el = document.createElement("div");
    el.setAttribute("style", "position:fixed;bottom:2%;right:2%; width:20%;z-index:999999");
    el.innerHTML = '<div class="alert alert-success" style=" z-index: 1;"><i class="fa fa-check" aria-hidden="true"></i>' + msg + ' .</div>';
    setTimeout(function () {
        el.parentNode.removeChild(el);
    }, duration);
    document.body.appendChild(el);
}

function makeAlertright(msg, duration) {
    var el = document.createElement("div");
    el.setAttribute("style", "position:fixed;bottom:2%;right:2%; width:25%;z-index:999999");
    el.innerHTML = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">Ä‚â€”</button><i class="fa fa-times"></i> <strong>Error!! </strong>' + msg + '</div>';
    setTimeout(function () {
        el.parentNode.removeChild(el);
    }, duration);
    document.body.appendChild(el);
}

function rmcomma(x) {
    if (x != null && x != '')
        return x.toString().replace(/,/g, "");
    else
        return null;
}

function addcomma(x) {
    if (x != null && x != '') {
        var a = rmcomma(x);
        return a.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    } else return null;

}


function addcomma1(ele) {

    var x = rmcomma(ele.value);
    console.log(x);
    if (x != null && x != '')
        ele.value = x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    //var a = rmcomma(x);
    //return a.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function aftersubmit(id='', cname = '') {
    $('input[type=button], input[type=submit]').attr('disabled', 'disabled');
    if (id != '' && id != null) $('#' + id).attr('disabled', 'disabled');
    if (cname != '' && cname != null) $('.' + cname).attr('disabled', 'disabled');
}