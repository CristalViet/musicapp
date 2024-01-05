//danh sách thêm vào
let list=[];
   
const Playlist=document.getElementById('Playlist');
const listsongs=document.getElementById('listsongs');
let listSongToAdd;



let selectedFile;
const fileInput=document.getElementById('inputFile');
const playlist_send=document.getElementById('playlist_send');
const playlistForm=document.getElementById('formPlaylist');

const divToShow=document.getElementById('divToShow');

//Nạp danh sách bài hát đã được thêm trước đó nếu là tính năng edit 


function clickItem(id,title){

    let song={id:id,title:title};


if(!list.some(s=>s.id ===id)){
    list.push(song);
    
 
}
console.log(list);
PrintList();

}



function deleteItem(id){

var BtnId=id;


console.log(id);

if(list.some(s=>s.id == id)){

    list = list.filter(item => item.id != id);
    console.log(list);    // deleteDiv(BtnId);
 

 
}
else console.log("That bai")
PrintList();


}




// function deleteDiv(id){
 
// var divToRemove=document.getElementById('playlist_'+id);

// if (divToRemove) {
//     console.log('batdau');
//     console.log(divToRemove +"đawaaw");
//     console.log(Playlist);
//     console.log('kethuc');

   


// }
// }
    


function renderList(list) {
        
        var html = '<ul class="list-unstyled">';
        for (var i = 0; i < list.length; i++) {
        
                html += '<li class="px-1 mb-1 mt-1 list-group-item d-flex justify-content-between align-items-center" style="width:100%">' + s[i].name + '<div id="playlist_'+ s[i].id +'"  class="btn btn-secondary ml-2">Bỏ</div></li>'
        }
        html += '</ul>';
        return html;

    }

function addDiv(song,count){
var BtnId=song['id'];
var htmlString = `
<div id="playlist_${BtnId}" class="list-group-item list-group-item-action d-flex justify-content-between" data-id="${BtnId}" >
  <p class="text-truncate">${count} <a href=""> bài hát ${song['title']}</a></p>
  <div  class="btn btn-primary">Bỏ</div>
</div>
`;        
    Playlist.innerHTML+=htmlString;

}
function PrintListSong(){
var count1=0;
listsongs.innerHTML='';
listSongToAdd.forEach(song => {
    console.log(song.id);
        if(!list.some(item=>item.id==song.id))
        {
           
 
            var htmlString=` <div id="${song.id}"  class="list-group-item list-group-item-action d-flex justify-content-between " data-id="${song.id}" data-title="${song.title}">
            <p class="text-truncate">${count1} <a href="/songs/{song}">${song.title} </a></p>
            <div  class="btn btn-primary" >chọn</div>
        </div>`;
            listsongs.innerHTML+=htmlString;
            count1++;
        }
        else {
            console.log(song.id+'NE')
            var htmlString=` <div id="${song.id}"  class="list-group-item list-group-item-action d-flex justify-content-between " data-id="${song.id}" data-title="${song.title}">
            <p class="text-truncate ">${count1} <a href="/songs/${song.id}" class="text-decoration-none" >${song.title} </a></p>
            <div  class="btn btn-primary disabled" >Chọn</div>
        </div>`;

            listsongs.innerHTML+=htmlString;
            count1++;
        }
        
   
        


   
});
}

function PrintList(){
Playlist.innerHTML='';
var count=-1;
list.forEach(song => {
    count++;
    addDiv(song,count);
});
}

Playlist.addEventListener('click',function(event){
var target = event.target;
console.log("Da click")


if (target.classList.contains('btn')) {
    var BtnId = target.parentNode.dataset.id; // Lấy data-id từ phần tử cha
    // target.classList.add('disabled')
 
    deleteItem(BtnId);
    var divSong= document.getElementById(BtnId);
    
    var btn=divSong.querySelector('.btn.btn-primary');

    btn.classList.remove('disabled');
}
}); 

listsongs.addEventListener('click',function(event){
var target = event.target;
console.log("Da click")

if (target.classList.contains('btn')) {
    var BtnId = Number(target.parentNode.dataset.id) // Lấy data-id từ phần tử cha
    var title = target.parentNode.dataset.title //lấy title
    target.classList.add('disabled')
    console.log(BtnId);
    clickItem(BtnId,title);
}
});

//Send form with listSong()
function sendFormPlaylist(){
if(list.length>0)
{   
    console.log('Bắt đầu test')
    console.log(playlist_send);
    playlist_send.value=JSON.stringify(list) ;  
    console.log(playlist_send.value);
    
    playlistForm.submit();
}
else alert('Vui lòng chọn bài hát')

}



function clickFile(){
    fileInput.click();
    fileInput.addEventListener('change',function(){
    selectedFile=fileInput.files[0];
    
    alert('Đã chọn tệp' + selectedFile.name);
    var contentDiv=`<p>Da chon ${selectedFile.name}</p>`;
    console.log(contentDiv);
    // divToShow.innerHTML=contentDiv;
    })
}

//ajax
$(document).ready(function() {
$("#search-input").on("input", function() {
        var query = $(this).val();

        if (query !== "") {
        $.ajax({
                type: "POST",
                headers: {
                 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                  },
                url: 'searchSong', // Đường dẫn tới file xử lý tìm kiếm phía server
                data: {query: query},
                success: function(response) {
                        // $("#search-results").html(renderResults(response.songs));
                        listSongToAdd=response.songs;
                        console.log(listSongToAdd);
                        PrintListSong();
                        
                }
              
        });
        } 
});
});
//check song ton tai

function checkExistSongs(song){
listSongs.forEach(s => {
 
        if(s.id==song.id){
          
                return true;
               
        }
});
return false;

}
