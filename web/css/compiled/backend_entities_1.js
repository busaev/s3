$('document').ready(function(){   
   
   $('.property-title').keypress(function()
   {
       titleToRoutePath();
   });
   
   $('.property-title').blur(function()
   {
       titleToRoutePath();
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