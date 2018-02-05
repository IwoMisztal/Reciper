$(document).ready( function() {

var StepInput =
    "<div class='recipeInput'><input name='ingredients' type='textarea' placeholder='Ingredients'>" +
    "<input name='method' type='textarea' placeholder='Method'>" +
    "<button id='subIng' name='submitIngredient'>+</button></div>";
var fields = $('#fields');
var table = $('#table');
AddInput();

var elEdit = $('#edit');
var elDelete = $('#delete');

console.log(elDelete);
elDelete.click(function() { deleteStep()});
elEdit.click(function() {editRows()});

function editRows() {
    var rows = $('tr');
    for(i=1;i<rows.length; i++) {
        if($(rows[i]).hasClass('blue'))
        {
            var buttons = $(rows[i]).children()[3];
            var ingredients = $(rows[i]).children()[1];
            var method = $(rows[i]).children()[2];
            var ingVal = $(ingredients).text();
            var metVal = $(method).text();
        }

        $(ingredients).html("<input type='text' value='" + ingVal + "'/>");
        $(method).html("<input type='text' value='" + metVal + "'/>");
        $(buttons).html("<button name='enter'>Submit</button><button name='cancel'>Cancel</button>");
        var submit = $('button[name=enter]');
        var cancel = $('button[name=cancel]');
        $(submit).click(function() {
                var ingredientsNew = $(ingredients);
                var methodNew = $(method);
                console.log($(ingredientsNew));
                $(ingredients).html("<p>" +  ingredientsNew.children()[0].value + "</p>");
                $(method).html("<p>" +  methodNew.children()[0].value + "</p>");
                $(buttons).html('');
        });
        $(cancel).click(function() {
            $(ingredients).html("<p>" +  ingVal + "</p>");
            $(method).html("<p>" +  metVal + "</p>");
            $(buttons).html('');
        });
    }
}

//$('#edit').addEventListener('click', function() {editRows()})

function deleteStep()
{
    var rows=$('tr');
    for(i=1;i<rows.length;i++) {
        if ($(rows[i]).hasClass('blue')) {
            $(rows[i]).remove();
        }
    }
    actualizeId();
}


function actualizeId()
{
    var rows = $('tr');
    for (i=1; i< rows.length; i++) {
        rows[i].firstChild.innerHTML = i;
    }
}


function Activate (el)
{
   var rows = $('tr');
   for(i=1;i<rows.length;i++) {
       if ($(rows[i]).hasClass('blue')) {
           $(rows[i]).removeClass('blue');
       }
   }
       $(el).addClass('blue');
   }


function AddInput ()
{
    $(fields).append(StepInput);
    var submitIngredient = $('#subIng');
    submitIngredient.click(AddStep);
}

function AddStep ()
{
    var ingredientsField = document.getElementsByName('ingredients')[0];
    var methodField = document.getElementsByName('method')[0];
    if (methodField.value != '') {
        var StepIngredients = ingredientsField.value;
        var StepMethod = methodField.value;
        var Processed = "<tr><td></td><td>" + StepIngredients + "</td><td>" +
            StepMethod + "</td> <td>";
        $(table).append(Processed);
        ingredientsField.value = '';
        methodField.value = '';
        var rows = $('tr');
        console.log(rows.length);
        for (i=1; i< rows.length; i++) {
            rows[i].addEventListener('click', function () {
                Activate($(this))
            });
        }
        actualizeId();
    }
}





console.log($('#btn'));


//AJAX

    $('#btn').on('click', function() {
        var ingredients = [];
        var methods = [];
        var rows = $('tr');
        
        for (i = 1; i < rows.length; i++) {
            ingredients.push($(rows[i]).children()[1].innerHTML);
            methods.push($(rows[i]).children()[2].innerHTML);
        }

        var recipe = {};

        var ingData = JSON.stringify(ingredients);
        var metData = JSON.stringify(methods);
        var title = $('#title').val();

        var title = {title: title};
        console.log(title.title);
        var titleData = JSON.stringify(title);
        console.log(titleData);

        $.post("postRecipe.php", {ingData, metData, titleData}, function (data) {
            $('#btn').after(data);
        });

    });

});