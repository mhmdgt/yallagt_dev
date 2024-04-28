$(function () {
    'use strict';

    // Product EN Dis
    if ($("#tinymceExample").length) {
        tinymce.init({
            selector: '#tinymceExample',
            height: 400,
            theme: 'silver',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'table' // Added table plugin
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            min_height: 100,
            max_height: 500,
            image_advtab: true,
            templates: [
                { title: 'Test template 1', content: 'Test 1' },
                { title: 'Test template 2', content: 'Test 2' }
            ],
            content_css: []
        });
    }
    // Product AR Dis
    if ($("#tinymceExample2").length) {
        tinymce.init({
            selector: '#tinymceExample2',
            height: 400,
            theme: 'silver',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'table' // Added table plugin
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            min_height: 100,
            max_height: 500,
            image_advtab: true,
            templates: [
                { title: 'Test template 1', content: 'Test 1' },
                { title: 'Test template 2', content: 'Test 2' }
            ],
            content_css: []
        });
    }
});
