const
title = $('#title'),
slug = $('#slug'),
button = $('button.btn-getslug');

title.on('change', function() {
    console.log(title.val());
if (title.val().length > 0) {
    $.ajax({
        type: "GET",
        url: "/utilities/getslug?title=" + title.val(),
        success: function(response) {
            slug.val(response.slug)
        }
    });
} else {
    slug.val('');
}
});

button.on('click', function() {
if (title.val().length > 0) {
    $.ajax({
        type: "GET",
        url: "/utilities/getslug?title=" + title.val(),
        success: function(response) {
            slug.val(response.slug)
        }
    });
} else {
    slug.val('');
}
});
