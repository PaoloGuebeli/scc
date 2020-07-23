
function toggleNew(){
    $('.add-form').toggle();
    if($('.add-form').is(':visible')){
        $('.add-container').find('h2').find('i').removeClass('fa-arrow-down').addClass('fa-arrow-up');
    }else{
        $('.add-container').find('h2').find('i').removeClass('fa-arrow-up').addClass('fa-arrow-down');
    }
}

function toggleList(){
    $('.list').toggle();
    if($('.list').is(':visible')){
        $('.list-container').find('h2').find('i').removeClass('fa-arrow-down').addClass('fa-arrow-up');
    }else{
        $('.list-container').find('h2').find('i').removeClass('fa-arrow-up').addClass('fa-arrow-down');
    }
}

function toggleUpdate(){
    $('.update-form').toggle();
    if($('.update-form').is(':visible')){
        $('.update-container').find('h2').find('i').removeClass('fa-arrow-down').addClass('fa-arrow-up');
    }else{
        $('.update-container').find('h2').find('i').removeClass('fa-arrow-up').addClass('fa-arrow-down');
    }
}

function toggleDelete(){
    $('.delete-form').toggle();
    if($('.delete-form').is(':visible')){
        $('.delete-container').find('h2').find('i').removeClass('fa-arrow-down').addClass('fa-arrow-up');
    }else{
        $('.delete-container').find('h2').find('i').removeClass('fa-arrow-up').addClass('fa-arrow-down');
    }
}