import * as Popper from '@popperjs/core'
window.Popper = Popper

import 'bootstrap'
import './sb-admin-2';

import $ from 'jquery';
window.$ = window.jQuery = $;

import 'select2';

tinymce.init({
    selector: '.textarea-content',
    plugins: 'code anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'code undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    menubar: 'tools',
    height : "543"
});

$(document).ready(function() {
    $('.multiple-select').select2({
        theme: "classic",
        multiple: true,
        placeholder: 'Select options'
    });
});

$(document).ready(function() {
    $('.select').select2({
        // theme: "classic",
        multiple: false,
        placeholder: 'Select options'
    });
});
