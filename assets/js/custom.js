var action;
status_count();
get_all_todo();
function get_all_todo(){
    $.get('src/Main.php',{action:'get_all'}).done(function(data){
        if(data){
            status_count();
            $('.all').addClass('nav-active');
            $('.all-active').removeClass('nav-active');
            $('.all-completed').removeClass('nav-active');
            $('#add-icon').html('<i class="fa fa-angle-down angle"></i>')
            $('tbody').html(data);
            $('tfoot').css('visibility','visible');
            $('.pages').css('visibility','visible');
            $('.todo-title').one("click",function() { 
                var id= this.id;
                value=$('#'+id).attr('data-title');
                $('#'+id).html('<form method="post" id="form-edit" action="src/Main.php"><input type="text" value="'+value+'" id="edit-title"/><input type="hidden" id="todo-id"  value="'+id+'"/><input type="submit"  class="edit-todo-submit"/>');
                
             });
        }
        else{
            console.log('no data found');
            
        }
    });
}

$('#form-add').submit(function(event){
    event.preventDefault();
    var $form= $(this);
    url= $form.attr('action');
    action= 'insert';
    insert_todo(url,action);
});
function insert_todo(url,action){
    var post= $.post(url,{
       title: $('#title').val(),
       action: action
    });
    post.done(function(){
        $("#form-add")[0].reset();
        get_all_todo();
    });
}
$(document).on('submit','#form-edit',function(){
    event.preventDefault();
    var $form= $(this);
    url= $form.attr('action');
    action= 'edit';
    edit_todo(url,action);
});
function edit_todo(url,action){
    var post= $.post(url,{
        title: $('#edit-title').val(),
        id: $('#todo-id').val(),
        action: action
     });
     post.done(function(data){
        get_all_todo();
    });
}

$(document).on('click','.complete-icon',function(){
    var id= this.id;
    $('#'+id).html('<i class="fa fa-check"></i>');

    var title= id.slice(5,id.length);
    $('#'+title).addClass('line-trough');
     update_todo(title);
});
function update_todo(title){
    $.post('src/Main.php',{action:'update_todo',id:title}).done(function(data){
        status_count();
    });
}
function status_count(){
    $.get('src/Main.php',{action:'row_count'}).done(function(data){
        if(data){
            $('#status').html(data);
        }
        else{
            console.log('no data found');
        }
    });
}
$(document).on('click','.delete',function(){
    $.get('src/Main.php',{action:'delete_todo'}).done(function(data){
        status_count();
        get_all_todo();
        location.reload();
    });
});
$(document).on('click','.all',function(){
    
        status_count();
        get_all_todo();
    
});
$(document).on('click','.all-active',function(){
    get_active_todo();
    status_count();
   

});
function get_active_todo(){
    $.get('src/Main.php',{action:'get_acitve'}).done(function(data){
        if(data){
            status_count();
            $('.all-active').addClass('nav-active');
            $('.all').removeClass('nav-active');
            $('.all-completed').removeClass('nav-active');
            $('#add-icon').html('<i class="fa fa-angle-down angle"></i>')
            $('tbody').html(data);
            $('tfoot').css('visibility','visible');
            $('.pages').css('visibility','visible');
            $('.todo-title').one("click",function() { 
                var id= this.id;
                value=$('#'+id).attr('data-title');
                $('#'+id).html('<form method="post" id="form-edit" action="src/Main.php"><input type="text" value="'+value+'" id="edit-title"/><input type="hidden" id="todo-id"  value="'+id+'"/><input type="submit"  class="edit-todo-submit"/>');
                
             });
        }
        else{
            console.log('no data found');
        }
    });
}
$(document).on('click','.all-completed',function(){
    get_completed_todo();
    status_count();
   

});
function get_completed_todo(){
    $.get('src/Main.php',{action:'get_completed'}).done(function(data){
        if(data){
            status_count();
            $('.all-completed').addClass('nav-active');
            $('.all').removeClass('nav-active');
            $('.all-active').removeClass('nav-active');
            $('#add-icon').html('<i class="fa fa-angle-down angle"></i>')
            $('tbody').html(data);
            $('tfoot').css('visibility','visible');
            $('.pages').css('visibility','visible');
            $('.todo-title').one("click",function() { 
                var id= this.id;
                value=$('#'+id).attr('data-title');
                $('#'+id).html('<form method="post" id="form-edit" action="src/Main.php"><input type="text" value="'+value+'" id="edit-title"/><input type="hidden" id="todo-id"  value="'+id+'"/><input type="submit"  class="edit-todo-submit"/>');
                
             });
        }
        else{
            console.log('no data found');
        }
    });
}
