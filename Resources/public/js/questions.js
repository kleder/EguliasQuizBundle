$(function(){

  $('.question_type').live('change',function(e){
    e.stopPropagation();
    element = $('.add_options:not(:visible)');
    option = $(this).val();
    if(element && option == 'choice') {
      element.show();
    }
    else {
      element = $('.add_options:visible');
      element.hide();
    }
  });
  $('a','.add_options').live('click', function(e){
    e.stopPropagation();
    option = $('.question_options:not(:visible)');
    cloned = option.clone();
    n = $('.question_options').length;
    $('input',cloned).attr('name', 'question[choices][' + n  + ']');
    cloned.show();
    $(this).parent('div').append(cloned);
  });
});
