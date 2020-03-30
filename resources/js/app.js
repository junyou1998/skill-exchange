require('./bootstrap');


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


document.deletePost = function(id){
    let result = confirm('do you want to delete me?');
    if(result){
        let actionUrl = `/posts/${id}`;
        console.log(actionUrl)
        $.post(actionUrl,{_method: 'delete'}).done(function(){
            location.href='/posts';
        })
    }
}

document.deletePostByAdmin = function(id){
    let result = confirm('do you want to delete me?');
    if(result){
        let actionUrl = `/admin/posts/${id}`;
        console.log(actionUrl)
        $.post(actionUrl,{_method: 'delete'}).done(function(){
            location.href='/admin/posts';
        })
    }
}

document.deleteCategory = function(id){
    let result = confirm('do you want to delete me?');
    if(result){
        let actionUrl = `/admin/categories/${id}`;
        console.log(actionUrl)
        $.post(actionUrl,{_method: 'delete'}).done(function(){
            location.href='/admin/categories';
        })
    }
}

document.deleteTag = function(id){
    let result = confirm('do you want to delete me?');
    if(result){
        let actionUrl = `/admin/tags/${id}`;
        console.log(actionUrl)
        $.post(actionUrl,{_method: 'delete'}).done(function(){
            location.href='/admin/tags';
        })
    }
}


document.Like = function(id){
    if($(`#love_${id}`).hasClass('loved')){
        let actionUrl = `/unlike/post/${id}`;
        $.post(actionUrl,{_method: 'delete'}).done(function(e){
            $(`#like_${e.post_id}`).text(e.likes)
        })
    }
    else{
        let actionUrl = `/like/post/${id}`;
        $.post(actionUrl,{_method: 'post'}).done(function(e){
            $(`#like_${e.post_id}`).text(e.likes)
        })
    }
}