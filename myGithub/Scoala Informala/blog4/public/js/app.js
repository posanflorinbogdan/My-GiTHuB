$(function() {
    // $.ajax("index.php?page=play&action=users").done(function(response) {
    //     //console.log("response ", response);
    //     $('.list').html(response); 
    // }); 
    
    function getUsers(index) {
        $.ajax("index.php?page=play&action=users&p="+index, {dataType: 'json'}).done(function(response) {
            console.log("response ", response);
            var tpl = '';
            for(var i in response) {
                tpl += '<div>' + response[0].first_name + ' - ' +response[i].last_name + '</div>';  
            } 
            $('.list').html(tpl);
        });
    }
    
    getUsers(1);
    
    $('[data-page]').on('click', function() {
        getUsers($(this).data("page"));
    })
});


// $(function() {
    
//     $('.list').on('click', '.update', function() {
//         var form = $(this).parent('form'),
//             // form.serialize - recovers form data from inputs
//             data = $(form).serialize();
            
//         $.post('index.php?page=admin&action=update', data, function(){
            
//         });
//     });
    
//     // ajax call to get articles
//     $.getJSON('index.php?page=admin&action=articles', function(response){
        
//         var table = '<table>';
//         for(var i in response) {
//             table += '<tr><td><form onsubmit="return false"><input name="title" value="' + response[i].title  + '" /> <textarea name="content">' + response[i].content  + '</textarea><input name="id" type="hidden" value="' + response[i].id + '" /><input type="submit" value="Update" class="update" /></form></td></tr>';        
//         }
//         table += '</table>';
        
//         $('.list').html(table);
//     });
// });