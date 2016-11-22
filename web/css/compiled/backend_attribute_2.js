var $collectionHolder;
        
// setup an "add a value" link
var $addValueLink = $('<a href="#" class="add_value_link">Add a value</a>');
var $newLinkLi = $('<li></li>').append($addValueLink);

jQuery(document).ready(function() {
    // Get the ul that holds the collection of values
    $collectionHolder = $('ul.values');

    // add a delete link to all of the existing value form li elements
    $collectionHolder.find('li').each(function() {
        addValueFormDeleteLink($(this));
    });

    // add the "add a value" anchor and li to the values ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addValueLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new value form (see next code block)
        addValueForm($collectionHolder, $newLinkLi);
    });


});

function addValueForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a value" link li
    var $newFormLi = $('<li></li>').append(newForm);

    // add a delete link to the new form
    addValueFormDeleteLink($newFormLi);

    $newLinkLi.before($newFormLi);

}

function addValueFormDeleteLink($valueFormLi) {
    var $removeFormA = $('<a href="#">delete this value</a>');
    $valueFormLi.append($removeFormA);

    $removeFormA.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // remove the li for the value form
        $valueFormLi.remove();
    });
}