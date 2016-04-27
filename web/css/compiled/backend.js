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
    $('#navigation_item_content').change(function() {
        $.ajax({
            url : Routing.generate('backend_api', { entityCode: 'content_page', format: 'json' }) + '?param[entityCode]=' + $('#navigation_item_content :selected').val(),
            type: 'json',
            success: function(json) {
                $('#navigation_item_contentPage').empty();
                $.each(json, function(i, value) {
                    $('#navigation_item_contentPage').append($('<option>').text(value.title).attr('value', value.id).attr('data-routePath', value.routePath));
                });
                // получаем дефолтные маршруты
                $('#navigation_item_contentPage').change();
            }
        });
    });
    // получаем дефолтные страницы модуля
    $('#navigation_item_content').change();

    // получаем маршруты, если выбран просмотр
    $('#navigation_item_contentPage').change(function() 
    {
        if('' !== $('#navigation_item_contentPage :selected').attr('data-routePath'))
        {
            $.ajax({
                url : Routing.generate('backend_api', { entityCode: 'route', format: 'json' }) + 
                        '?param[entityCode]=' + $('#navigation_item_content :selected').val()+
                        '&param[actionType]=index',
                type: 'json',
                success: function(json) {
                    $('#navigation_item_route').empty();
                    $.each(json, function(i, value) {
                        $('#navigation_item_route').append($('<option>').text(value.routePath).attr('value', value.id));
                    });
                }
            });

            return;
        }

        $('#navigation_item_route').attr('disabled', false);

        $.ajax({
            url : Routing.generate('backend_core_route_content_entries', { entityCode: 'route', format: 'json' }) + 
                    '?param[entityCode]=' + $('#navigation_item_content :selected').val()+
                    '&param[actionType]=show',
            type: 'json',
            success: function(json) {
                $('#navigation_item_route').empty();
                $.each(json, function(i, value) {
                    $('#navigation_item_route').append($('<option>').text(value.title).attr('value', value.id));
                });
            }
        });
    });
   
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