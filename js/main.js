
var path="../php/action.php";
var conarr=[];
var listname="";
/////////////creat new table
$("#nl").click( function(){
    
        $.post({
         
            url: path,
            data: { nl: "",
            listname: $("#listname").val()                               
            }
         
        }).done(function(msg) {
            alert(msg);
              
        });
      
        location.reload()
})
/////////////////////////////////delete table

$("#dl").click( function(){
   
    $.post({
         
        url: path,
        data: { dl: "",
        listname: $("#listname").val()
                           
        }
     
    }).done(function(msg) {
        alert(msg);
          
    });
    location.reload()

})


/////////////////////add now contact
$("#addnowcont").click( function(){
    
   

    $.post({
         
        url: path,
        data: { addnowcont: "",
        
        conname:$('#name').val(),
        phone:$('#phone').val(),
        email:$('#conemail').val(),
        gender:$('#gender').val(),
        dob:$('#dob').val(),
        address:$('#address').val(),
        company:$('#company').val(),
        fb:$('#fb').val(),
        insta:$('#insta').val(),
        lnk:$('#lnk').val(),
        extra:$('#extra').val()
                           
        }
     
    }).done(function(msg) {
        alert(msg);
          
    });
    
    $( "#cen1" ).load(" #cen1 > *");
    $("#listbar").load(" #listbar > *");
    location.reload()
})
///////////////////////////////update contact
$("#updatecont").click( function(){
    


    $.post({
         
        url: path,
        data: { updatecont: "",
        
        conname:$('#name').val(),
        phone:$('#phone').val(),
        email:$('#conemail').val(),
        gender:$('#gender').val(),
        dob:$('#dob').val(),
        address:$('#address').val(),
        company:$('#company').val(),
        fb:$('#fb').val(),
        insta:$('#insta').val(),
        lnk:$('#lnk').val(),
        extra:$('#extra').val()
                           
        }
     
    }).done(function(msg) {
        alert(msg);
          
    });
    
    $( "#cen1" ).load(" #cen1 > *");
    $("#listbar").load(" #listbar > *");
    location.reload()
})
//////////////////////////////////// delete contacts

$("#delcon").click(function() {
    if (conarr.length==0){alert('please select contact to delete')}
    else{
     
     var arr = JSON.stringify(conarr);
     $.post({
  
       url: path,
       data: { delcon: "",
           dt: arr
       }
    
        }).done(function(msg) {
            alert(msg);
        }); 
    }
  
    location.reload();  
})
/////////////////////////////////////////////////////////move contacts
$("#movecon").click(function() {
    if (conarr.length==0){alert('please select contact to move')}
    else{
     var secondtable=  prompt("enter table name to move")
     var arr = JSON.stringify(conarr);
     $.post({
  
       url: path,
         data: {
             movecon: "",
           secondtable:secondtable,
           dt: arr
       }
    
        }).done(function(msg) {
            alert(msg);
  
  
        }); 
    }

    location.reload();  
})
//////////////////////////list table row selecter
$("#listtable tr").click(function () {
    $(this).addClass('selected');
        listname = $("td:eq(0)", this).text();
      
       
       $.post({
            url: path,
            data: {
                listselect: "",
                listname: listname
            }
    
   })
 location.reload()
   
});
$("input:checkbox").click(function () { return false; });//checkbox unclickable
$("th").click(function () { return false; });//unclickable

//////////////////////////////////////////on category table selection
$("#catetable tr").click(function () {
    $(this).addClass('selected');
        catename = $("td:eq(0)", this).text();
      
       
       $.post({
            url: path,
            data: {
                cateselect: "",
                catename: catename
            }
    
   })
 location.reload()
   
});
$("input:checkbox").click(function () { return false; });//checkbox unclickable
$("th").click(function () { return false; });//unclickable

////////////////////////////////search
$("#find").click(function () {

        str = $("#ser1").val();
       
       
       $.post({
            url: path,
            data: {
                find: "",
                str: str
            }
    
       })
   
 location.reload()
    
});

////////////////////////////////contact table selection



$("#contable tr").click(function () {
    
    var conid=$("td:eq(1)", this).text()
    
    if ($(':checkbox', this).is(':checked')) {// un selecting
        $(this).removeClass('selected');
        $(':checkbox', this).prop("checked", false)
        for( var i = 0; i < conarr.length; i++){ 
         
            if (conarr[i] ===conid) { 
           
              conarr.splice(i, 1); 
            }
         
           }

    }
    else {
        $(this).addClass('selected');
        $(':checkbox', this).prop("checked", true)
        conarr.push( conid);

            $.post({
                 
                url: path,
                data: { conselect: "",
                conid: conid
                                  
                }
            
            }).done(function (msg) {
                var msg = JSON.parse(msg);
               
                $('#img').css('background-image','url(../contactimages/'+msg[0][1]+')');
                $('#name').val(msg[0][2]);
                $('#phone').val(msg[0][3]);
                $('#conemail').val(msg[0][4]);
                $('#gender').val(msg[0][5]);
                $('#dob').val(msg[0][6]);
                $('#address').val(msg[0][7]);
                $('#company').val(msg[0][8]);
                $('#fb').val(msg[0][9]);
                $('#insta').val(msg[0][10]);
                $('#lnk').val(msg[0][11]);
                $('#extra').val(msg[0][12]);
            }); 
        
    }
   
//$("input:checkbox").click(function() { return false; });//checkbox unclickable
//$("th").click(function() { return false; });//unclickable
});
/////////////////////////////////////select all contact
$("#selectall").click(function() {
   
    var table= $('#contable').closest('table');
    $('td input:checkbox',table).prop('checked',this.checked);
    ///////////
     // $(this).addClass('selected');
        //$(':checkbox', this).prop("checked", true)
        //conarr.push( conid);
})


///////////////////////////////////////////////new category
$("#newcate").click( function(){
    if ($("#catname").val() == "") { alert("plese enter category name") }
    else {
        $.post({
     
            url: path,
            data: {
                newcate: "",
                catename: $("#catname").val()
            }
     
        }).done(function (msg) {
            alert(msg);
          
        });
  
        location.reload()
    }
})
///////////////////////////////////////////////delete category
$("#delcate").click( function(){
    if ($("#catname").val() == "") { alert("plese enter category name") }
    else {
        $.post({
     
            url: path,
            data: {
                delcate: "",
                catename: $("#catname").val()
            }
     
        }).done(function (msg) {
            alert(msg);
          
        });
  
        location.reload()
    }
})

//////////////////////////////////////////////export
$("#expo").click( function(){

    $.post({
     
        url: '../php/export.php',
        data: { expo: "" }
    }).done(function (msg) {
        alert(msg);
      
    });
})
////////////////////////////////////////////import
$("#impo").change( function(){
    var fname = $('#impo')[0].files[0]


})
////////////////////////////////////////////change account type
$("#changaccount").click(function () {
    console.log ('change account')
     $.post({
   
         url: path,
           data: {
             changaccount: ""
             }
      
          }).done(function(msg) {
              alert(msg);
          }); 
         location.reload();  
 
 })
////////////////////////////logout
$('#logout').click(function () {
    $.post({
     
        url: '../php/action.php',
        data: { logout: "" }
    })
    location.reload()
})
//////////////////////////