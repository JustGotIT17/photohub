$(document).ready(function(){
    var page = $('#page').val();
    if(page == "items") {
        $('#addItemForm').hide();
    } else if (page == "users") {
        $('#addItemForm').hide();
        $('#btnAddUser').on('click', function(e) {
            if(checkInput.isEmpty($('#txtPassword')) || ! checkInput.isValid($('#txtPassword'), /^(?=.*[a-zA-Z])(?=.*[0-9])/))
                notifier('Password  must be composed both number and letter', e);
        });
    } else if (page == "users.edit") {
        $('#btnEditUser').on('click', function(e) {
            if(checkInput.isEmpty($('#txtCurPassword')) || ! checkInput.isValid($('#txtCurPassword'), /^(?=.*[a-zA-Z])(?=.*[0-9])/)
                || checkInput.isEmpty($('#txtPassword')) || ! checkInput.isValid($('#txtPassword'), /^(?=.*[a-zA-Z])(?=.*[0-9])/)) {
                notifier('Current Password or Password  must be composed both number and letter', e);
            }
        });
    }else if(page == "salesAdd") {
        $('#showItemsByID').hide();
        $('#btnCheckout').hide();
        var cashReceived = $('#cashReceived');
        $('#findProductByID').on('keyup', function(e) {
            if (e.keyCode === 13) {
               addItemToCart($(this).val());
            } else {
                showItemsByID($(this).val());
            }
        });
        $('#findProductByID').on('dblclick', function(e) {
            $.ajax({
                type: "GET",
                url: "/search/all",
                cache: false,
                success: function(html)
                {
                    $("#showItemsByID").html(html).slideDown(200);
                }
            });
        });
        $('#btnCheckout').on('click', function(e) {
            if(parseFloat(cashReceived.val()) >= parseFloat($('span#pTotal').text())) {
                if (confirm('Are you sure you want to checkout this transaction?')) {

                } else
                    e.preventDefault();
            } else {
                alert('Insufficient cash.');
                e.preventDefault();
            }
        });
        $(function(){
            //acknowledgement message
            $("td[contenteditable=true]").keyup(function(e){
                var val = $(this).text();

                if(isNaN(val)) {
                    val = val.replace(/[^0-9\.]/g,'');

                    alert("Only numbers and dot are allowed");
                    $(this).text(val);
                    return false;
                }
                    e.keyCode === 13 ? ($(this).length < 1 || $(this).text() == 0) ? run.editqty(1) : run.editqty(this) : '';


            });
            $("td[contenteditable=true]").blur(function(e){
                ($(this).length < 1 || $(this).text() == 0) ? run.editqty(1) : run.editqty(this);
            });
        });
        cashReceived.on('keyup', function() {
            var cashVal = $('#cashReceived').val();
            var pTotal = $('span#pTotal').text();

            $('#pChange').val(compute(parseFloat(pTotal), parseFloat(cashVal), '-'));
            if(parseFloat(cashVal) >= parseFloat(pTotal)) {
                $('#btnCheckout').show();
            } else {
                $('#btnCheckout').hide();
                $('#pChange').val('0.00');
            }

        });
    } else if(page == "checkout") {
        window.print();
    } else if(page == "branch") {
        $('#addItemForm').hide();
    } else if(page == "reports.sales") {
      run.reportSales('option=1', 1);
      $('select').on('change', function() {
            var dataString = 'option='+ this.value;
            run.reportSales(dataString, this.value);
        });

        $ ( "#datepicker1" ).datepicker({
            dateFormat:'yy-mm-dd',
            showButtonPanel: true,
            maxDate: "+0M +0D"
        });
        $( "#datepicker2" ).datepicker({
            dateFormat:'yy-mm-dd',
            showButtonPanel: true,
            maxDate: "+0M 0D"
        });
    } else if(page == "dashboard.home") {
        setInterval(function() {
           $.ajax({
                type: "GET",
                url: "/dashboard/home",
                cache: false
            }).done(function(html) {
               $('#MainWrapper').html(html);
           });
        }, 2000);
    } else if(page == "users.online") {

    }
    $ ( "#eventDate" ).datepicker({
        dateFormat:'yy-mm-dd',
        showButtonPanel: true,
        maxDate: "+12M +0D",
        minDate: "+0M +2D"
    });
    $("div#gallery-img a").live('click', function() {
       id = $(this).attr('id');
        if(confirm("Are you sure you want to delete this photo?")) {
            run.gotToURLByGET('/gallery/delete/'+id);
        }
    });

    /* swap open/close side menu icons */
    $('[data-toggle=collapse]').click(function(){
        // toggle icon
        $(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
    });

    (function($){
        $.fn.setCursorToTextEnd = function() {
            this.focus();
            var $initialVal = this.val();
            this.val('').val($initialVal);
            return this;
        };
    })(jQuery);;
});

var run = {
  reportSales : function(dataString, val) {
    $.ajax({
      type: "POST",
      url: "/reports/sales/"+ val,
      data: dataString,
      cache: false,
      success: function(html) {
        $("#basicReport").html(html);
      }
    });
  },
    editqty : function (element) {
        var field_userid = $(element).attr("id") ;
        var value = $(element).text() ;
        $.post('/cart/edit/'+field_userid , field_userid + "=" + value, function(data){
            location.reload();
        });
    },
    gotToURLByGET : function(url) {
        setTimeout(function() {
            $.ajax({
                type: "GET",
                url: url,
                cache: false
            }).done(function(html) {
                location.reload();
            });
        }, 500);
    }
};
var notifier = function(message, e) {
    alert(message);
    e.preventDefault();
}
var checkInput = {

    isEmpty : function(element) {
        if(element.val().trim().length < 1)
            return true;
        return false;
    },
    isNonZero: function(element) {
        element.val() > 1 ? true : false;

    },
    isValid : function(element, regex) {
        var x = element.val().trim();
        if(x.match(regex) && x.length > 0)
            return true;
        return false;
    }


};

function btnAddItem() {
    $("#addItemForm").fadeIn(500);
}

function btnCloseAddItem() {
    $("#addItemForm").fadeOut(200);
}

function showItemsByID(id) {
    id = id.trim();
    if(id.length > 0) {
        //$('#showItemsByID').slideDown(200);
        var dataString = 'itemID='+ id;
        if(id!='')
        {
            $.ajax({
                type: "POST",
                url: "/search",
                data: dataString,
                cache: false,
                success: function(html)
                {
                    $("#showItemsByID").html(html).slideDown(200);
                }
            });
        }return false;
    } else
        $('#showItemsByID').slideUp(200);

}

function addItemToCart(id) {
    //alert(id);
    id = id.trim();
    if(id.length > 0) {
        //$('#showItemsByID').slideDown(200);
        //var dataString = 'id=' + id;
        if (id != '') {
            $.ajax({
                type: "GET",
                url: "/cart/add/" + id,
                //data: dataString,
                cache: false,
                success: function (html) {
                    location.reload();
                },
                error: function() {
                    alert('Item ID not found.');
                }
            });
        }
        return false;
    }
}

function compute(amt, cash, op) {
    switch (op) {
        case "-":
            return parseFloat(cash - amt);
            //alert(cash);
    }

}