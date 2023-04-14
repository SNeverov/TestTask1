$(document).ready(function() {
  

  // cache common values, so we can skip
  // querying the DOM for them on each event
  var $progress = $('#progress_bar');
    var $wrapper = $('#quiz__subwrapper');

    // reset the radios on load
    $wrapper.find('.choice').prop('checked', false);

    // how many questions
    var total = $wrapper.find('.quiz__radio').length;

    // add just one event handler on the wrapper div
    $wrapper.on('change', '.choice', function () {
        // only one radio is checked within a group
        var checked = $wrapper.find('.choice:checked').length;

        $progress.val(Number(checked * 400 / total));
        $('#percentvalue').text(Number(checked * 400 / total) + '%');
    });

});