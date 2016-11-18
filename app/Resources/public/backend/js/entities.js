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
<<<<<<< HEAD
                    $('#navigation_item_modulePage').append($('<option>').text(value.title).attr('value', value.id).attr('data-routePath', value.routePath));
=======
                    $('#navigation_item_modulePage').append($('<option>').text(value.title).attr('value', value.id));
>>>>>>> cf05d614c7737a63ac291942cf0bb18588ee1dc1
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
<<<<<<< HEAD
        if('' !== $('#navigation_item_modulePage :selected').attr('data-routePath'))
        {
            $.ajax({
                url : Routing.generate('backend_api', { entityCode: 'route', format: 'json' }) + 
                        '?param[entityCode]=' + $('#navigation_item_module :selected').val()+
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
            url : Routing.generate('backend_core_route_module_entries', { entityCode: 'route', format: 'json' }) + 
                    '?param[entityCode]=' + $('#navigation_item_module :selected').val()+
                    '&param[actionType]=show',
=======
        $.ajax({
            url : Routing.generate('backend_api', { entityCode: 'route', format: 'json' }) + 
                    '?param[modulePageId]=' + $('#navigation_item_modulePage :selected').val(),
>>>>>>> cf05d614c7737a63ac291942cf0bb18588ee1dc1
            type: 'json',
            success: function(json) {
                $('#navigation_item_route').empty();
                $.each(json, function(i, value) {
                    $('#navigation_item_route').append($('<option>').text(value.path).attr('value', value.id));
                });
            }
        });

        return;
        

        $('#navigation_item_route').attr('disabled', false);

//        $.ajax({
//            url : Routing.generate('backend_core_route_module_entries', { entityCode: 'route', format: 'json' }) + 
//                    '?param[entityCode]=' + $('#navigation_item_module :selected').val()+
//                    '&param[actionType]=show',
//            type: 'json',
//            success: function(json) {
//                $('#navigation_item_route').empty();
//                $.each(json, function(i, value) {
//                    $('#navigation_item_route').append($('<option>').text(value.title).attr('value', value.id));
//                });
//            }
//        });
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