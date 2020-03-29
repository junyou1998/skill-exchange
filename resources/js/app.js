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


document.addLike = function(id){
    let result = confirm('do you want to like me?');
    if(result){
        let actionUrl = `/like/post/${id}`;
        console.log(actionUrl)
        $.post(actionUrl,{_method: 'post'}).done(function(){
            location.href='/';
            console.log(actionUrl)
        })
    }
}


document.removeLike = function(id){
    let result = confirm('do you want to unlike me?');
    if(result){
        let actionUrl = `/unlike/post/${id}`;
        console.log(actionUrl)
        $.post(actionUrl,{_method: 'delete'}).done(function(){

            console.log('worked')
            location.href='/';
            console.log(actionUrl)
        })
    }
}