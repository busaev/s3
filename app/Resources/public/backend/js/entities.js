$('document').ready(function(){   
   
   $('.property-title').keypress(function()
   {
       titleToRoutePath();
   });
   
   $('.property-title').blur(function()
   {
       titleToRoutePath();
   });
   
   // получаем страницы модуля
    $('#navigation_item_module').change(function() {
        $.ajax({
            url : Routing.generate('backend_api', { entityCode: 'module_page', format: 'json' }) + '?param[entityCode]=' + $('#navigation_item_module :selected').val(),
            type: 'json',
            success: function(json) {
                $('#navigation_item_modulePage').empty();
                $.each(json, function(i, value) {
                    $('#navigation_item_modulePage').append($('<option>').text(value.title).attr('value', value.id));
                });
                // получаем дефолтные маршруты
                $('#navigation_item_modulePage').change();
            }
        });
    });
    // получаем дефолтные страницы модуля
    $('#navigation_item_module').change();

    // получаем маршруты, если выбран просмотр
    $('#navigation_item_modulePage').change(function() 
    {
        $.ajax({
            url : Routing.generate('backend_api', { entityCode: 'route', format: 'json' }) + 
                    '?param[modulePageId]=' + $('#navigation_item_modulePage :selected').val(),
            type: 'json',
            success: function(json) {
                $('#navigation_item_route').empty();
                $.each(json, function(i, value) {
                    $('#navigation_item_route').append($('<option>').text(value.path).attr('value', value.id));
                });
            }
        });
        return;
    });
});

$(document).ready(function() {
    $(".wysiwyg").summernote();
});
$(".save-form").click(function() {
    $('.entity-form').submit();
});

function titleToRoutePath()
{
    var title = $('.property-title');       
    var path  = $('.property-routePath');

    if(path.length == 0)
        return;

     var original_path = path.attr('data-original_path');

     if (typeof original_path == typeof undefined)
     {
         original_path = path.val();
         path.attr('data-original_path', original_path);
     }
     
     var lastChar = original_path.substr(original_path.length - 1);

     if(lastChar == '/')
         compilledPath = original_path + translit(title.val());
     else
         compilledPath = original_path + '/' + translit(title.val());

     path.val(compilledPath);  
}