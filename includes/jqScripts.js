var deleter = function (buttonHandler) {
    let data = {id: (($(buttonHandler).parent()).parent().attr('id')).split('-')[1]};

    $.ajax({
        type: "POST",
        url: "jqOperates/delete.php",
        data: data,
        success: function () {
            alert("Deleted!");
            window.location.href = "index.php"; //TODO DOM operate
        },

        beforeSend: function () {
            return confirm('Are you sure you want to delete?');
        },
        error: function () {
            alert("Querry error!");
        }
    });
};




var editor = function (buttonHandler)
 {
    let currow =($(buttonHandler).parent()).parent();
    let rownum = (currow.attr('id')).split('-')[1];
    let oldrow={
        id:rownum,
        name:currow.children("#c2").text(),
        age:currow.children("#c3").text(),
        email:currow.children("#c4").text()
    };

    currow.load("includes/rowForm.html", function () {
        currow.children("#c1").text(oldrow.id);
        currow.children("#c2").children().val(oldrow.name);
        currow.children("#c3").children().val(oldrow.age);
        currow.children("#c4").children().val(oldrow.email);

        currow.children("#c5").children("#cancel").bind("click", function () {
            currow.children("#c2").text(oldrow.name);
            currow.children("#c3").text(oldrow.age);
            currow.children("#c4").text(oldrow.email);
            currow.children("#c5").children("#save").unbind();
            currow.children("#c5").children("#save").val("Edit").attr("id","edit").bind("click", function(){editor(this)});
            currow.children("#c5").children("#cancel").unbind();
            currow.children("#c5").children("#cancel").val("Delete").attr("id","delete").bind("click", function(){deleter(this)});
        });

        currow.children("#c5").children("#save").bind("click", function () {
            let data={
                id:rownum,
                name:currow.children("#c2").children().val(),
                age:currow.children("#c3").children().val(),
                email:currow.children("#c4").children().val()
            };
            $.ajax({
                url:"jqOperates/edit.php",
                type:"post",
                data: data,
                beforeSend: function () {
                    return notEmpty(currow);
                },
                success: function () {
                    alert("Updated!");
                    window.location.href = "index.php";     //TODO DOM operate
                },
                error: function () {
                    alert("Querry error!");
                }
            })
        })
    });
};





var notEmpty = function(row){
    let errText = '';
    if (row.children("#c2").children().val() == "") {
        errText += "Name\n";
    }
    if (row.children("#c3").children().val() == "") {
        errText += "Age\n";
    }
    if (row.children("#c4").children().val() == "") {
        errText += "Email\n";
    }
    if (errText == '')
        return true;
    else {
        alert("Next fields must be no empty:\n\n" + errText);
        return false;
    }
};





$("#add").click(function () {
    $("#adder :input").slideDown(500);
    $(this).attr("disabled", "disabled");
});




$("#save").click(function () {
    let data = {
        name: $("#adder div #name").val(),
        age: $("#adder div #age").val(),
        email: $("#adder div #email").val()
    };
    $.ajax({
        type: "POST",
        url: "jqOperates/add.php",
        data: data,

        beforeSend: function () {
            return notEmpty($("#adder"));
        },
        success: function () {
            alert("Saved!");
            $("#cancel").click();
            window.location.href = "index.php";     //TODO DOM operate
        },
        error: function () {
            alert("Querry error!");
        }
    });
});




$("#cancel").click(function () {
    $("#adder :input").slideUp(500);
    $("#adder div #name, #adder div #age, #adder div #email").val('');
    $("#add").removeAttr("disabled");
});





$("[id='edit']").bind("click", function (){
    editor(this);
});


$("[id='delete']").bind("click", function (){
    deleter(this);
});